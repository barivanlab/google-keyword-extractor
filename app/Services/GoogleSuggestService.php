<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * پروکسی سمت سرور برای Google Suggest.
 *
 * - کش ۲۴ ساعته برای کاهش ریت‌لیمیت و سرعت
 * - نرمالایز زبان/کشور برای امنیت
 * - فیلتر URL از خروجی
 */
class GoogleSuggestService
{
    private const ENDPOINT = 'https://suggestqueries.google.com/complete/search';

    private const ALLOWED_LANGS = [
        'en', 'fa', 'ar', 'es', 'de', 'fr', 'ru', 'zh', 'ja',
        'tr', 'it', 'pt', 'hi', 'ur', 'ku', 'az', 'nl', 'sv',
        'no', 'da', 'fi', 'pl', 'uk', 'ko',
    ];

    public static function fetch(string $query, string $lang = 'en', string $country = 'us'): array
    {
        $query = trim(mb_substr($query, 0, 200));
        if ($query === '') {
            return [];
        }

        $lang = in_array(strtolower($lang), self::ALLOWED_LANGS, true) ? strtolower($lang) : 'en';
        $country = preg_match('/^[a-z]{2}$/i', $country ?? '') ? strtolower($country) : 'us';

        $cacheKey = 'suggest:'.md5("{$query}|{$lang}|{$country}");

        return Cache::remember($cacheKey, now()->addHours(24), function () use ($query, $lang, $country) {
            try {
                $response = Http::timeout(6)
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0'])
                    ->get(self::ENDPOINT, [
                        'client' => 'chrome',
                        'q' => $query,
                        'hl' => $lang,
                        'gl' => $country,
                    ]);

                if (! $response->successful()) {
                    return [];
                }

                $data = $response->json();
                if (! is_array($data) || ! isset($data[1]) || ! is_array($data[1])) {
                    return [];
                }

                return array_values(array_filter($data[1], function ($item) {
                    return is_string($item)
                        && $item !== ''
                        && ! str_starts_with($item, 'http://')
                        && ! str_starts_with($item, 'https://')
                        && ! str_contains($item, 'www.');
                }));
            } catch (\Throwable) {
                return [];
            }
        });
    }
}

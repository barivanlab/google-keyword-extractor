<?php

namespace App\Services;

/**
 * برچسب‌گذاری Intent برای سئو.
 *
 * Informational: دانستنی/آموزشی
 * Commercial: مقایسه/بررسی قبل از خرید
 * Transactional: خرید/قیمت/دانلود
 * Local: مکانی
 */
class IntentClassifier
{
    private const RULES = [
        'transactional' => [
            'fa' => ['قیمت', 'خرید', 'فروش', 'سفارش', 'تخفیف', 'ارزان', 'دانلود', 'اجاره', 'رزرو', 'ثبت نام', 'خریدن'],
            'en' => ['price', 'buy', 'cheap', 'discount', 'coupon', 'deal', 'order', 'download', 'for sale', 'cost', 'shop', 'store'],
        ],
        'commercial' => [
            'fa' => ['بهترین', 'مقایسه', 'بررسی', 'راهنما', 'راهنمای خرید', 'معایب', 'مزایا', 'کدام', 'نقد', 'نظرات', 'مشخصات'],
            'en' => ['best', 'vs', 'versus', 'review', 'compare', 'comparison', 'top', 'guide', 'pros', 'cons'],
        ],
        'local' => [
            'fa' => ['در تهران', 'در اصفهان', 'در شیراز', 'در مشهد', 'نزدیک من', 'نزدیکی', 'آدرس', 'تهران', 'کرج', 'مشهد'],
            'en' => ['near me', 'nearby', 'in tehran', 'location', 'address', 'open now'],
        ],
        'informational' => [
            'fa' => ['چیست', 'چطور', 'چگونه', 'چرا', 'آموزش', 'طرز', 'روش', 'علت', 'معنی', 'چی', 'کی', 'کجا', 'آیا'],
            'en' => ['how', 'what', 'why', 'when', 'tutorial', 'guide how', 'what is', 'meaning of', 'how to'],
        ],
    ];

    public static function classify(string $keyword): string
    {
        $normalized = KeywordNormalizer::normalize($keyword);

        foreach (['transactional', 'commercial', 'local', 'informational'] as $intent) {
            foreach (self::RULES[$intent] as $terms) {
                foreach ($terms as $term) {
                    if (mb_stripos($normalized, $term, 0, 'UTF-8') !== false) {
                        return $intent;
                    }
                }
            }
        }

        return 'informational';
    }
}

<?php

namespace App\Services;

/**
 * نرمالایزر کلمات کلیدی فارسی/عربی.
 *
 * - ي عربی → ی فارسی، ك عربی → ک فارسی
 * - ة → ه، ؤ → و، ئ → ی، ء حذف
 * - حذف اعراب و تشدید (ً ٌ ٍ َ ُ ِ ّ ْ)
 * - تبدیل نیم‌فاصله‌های اضافه و فاصله‌های چندتایی به یک فاصله
 * - lowercase + trim برای انگلیسی
 */
class KeywordNormalizer
{
    public static function normalize(string $keyword): string
    {
        $s = trim($keyword);

        // حروف عربی به فارسی
        $s = str_replace(
            ['ي', 'ك', 'ٸ', 'ؤ', 'إ', 'أ', 'آ', 'ة', 'ئ', 'ء'],
            ['ی', 'ک', 'ی', 'و', 'ا', 'ا', 'آ', 'ه', 'ی', ''],
            $s
        );

        // حذف اعراب
        $s = preg_replace('/[\x{064B}-\x{0652}\x{0670}]/u', '', $s ?? '');

        // نیم‌فاصله (ZWNJ) اطراف فاصله‌ها را تمیز کن
        $s = preg_replace('/\x{200C}+/u', "\x{200C}", $s ?? '');
        // فاصله‌های چندتایی (شامل نیم‌فاصله + فاصله) به یک فاصله
        $s = preg_replace('/[\s\x{200C}]+/u', ' ', $s ?? '');

        $s = mb_strtolower(trim($s ?? ''), 'UTF-8');

        return $s;
    }

    /**
     * کلید یکتا برای حذف تکراری‌ها (نرمالایز شده).
     */
    public static function dedupKey(string $keyword): string
    {
        return self::normalize($keyword);
    }
}

<?php

use App\Services\IntentClassifier;
use App\Services\KeywordNormalizer;

it('normalizes arabic chars to persian', function () {
    expect(KeywordNormalizer::normalize('گوشي موبايل'))->toBe('گوشی موبایل');
    expect(KeywordNormalizer::normalize('كتاب'))->toBe('کتاب');
});

it('removes diacritics and collapses whitespace', function () {
    expect(KeywordNormalizer::normalize('کتابِ خوب'))->toBe('کتاب خوب');
    expect(KeywordNormalizer::normalize('  گوشی    موبایل  '))->toBe('گوشی موبایل');
});

it('lowercases english', function () {
    expect(KeywordNormalizer::normalize('  iPhone PRICE '))->toBe('iphone price');
});

it('dedups variants to the same key', function () {
    expect(KeywordNormalizer::dedupKey('گوشي'))
        ->toBe(KeywordNormalizer::dedupKey('گوشی'));
});

it('classifies transactional intent', function () {
    expect(IntentClassifier::classify('قیمت گوشی سامسونگ'))->toBe('transactional');
    expect(IntentClassifier::classify('buy iphone cheap'))->toBe('transactional');
});

it('classifies commercial intent', function () {
    expect(IntentClassifier::classify('بهترین گوشی 2024'))->toBe('commercial');
    expect(IntentClassifier::classify('iphone vs samsung'))->toBe('commercial');
});

it('classifies local intent', function () {
    expect(IntentClassifier::classify('تعمیر موبایل نزدیک من'))->toBe('local');
});

it('defaults unknown to informational', function () {
    expect(IntentClassifier::classify('آموزش سئو'))->toBe('informational');
    expect(IntentClassifier::classify('some random phrase'))->toBe('informational');
});

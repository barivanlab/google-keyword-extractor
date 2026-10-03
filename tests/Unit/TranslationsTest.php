<?php

it('has consistent translation keys across locales', function () {
    $base = __DIR__.'/../../resources/lang';
    $en = require $base.'/en/messages.php';
    $fa = require $base.'/fa/messages.php';
    $ar = require $base.'/ar/messages.php';

    $missingFa = array_diff(array_keys($en), array_keys($fa));
    $missingAr = array_diff(array_keys($en), array_keys($ar));

    expect($missingFa)->toBe([], 'Missing FA keys: '.implode(', ', $missingFa));
    expect($missingAr)->toBe([], 'Missing AR keys: '.implode(', ', $missingAr));
});

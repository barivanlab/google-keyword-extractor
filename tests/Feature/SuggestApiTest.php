<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

it('returns suggestions through the proxy', function () {
    Http::fake([
        'suggestqueries.google.com/*' => Http::response(['laptop', ['laptop price', 'laptop buy']], 200),
    ]);

    $response = $this->getJson('/api/suggest?q=laptop&hl=en&gl=us');

    $response->assertOk()
        ->assertJson([
            'query' => 'laptop',
            'suggestions' => ['laptop price', 'laptop buy'],
        ]);
});

it('caches repeated queries', function () {
    Http::fake([
        'suggestqueries.google.com/*' => Http::response(['x', ['a', 'b']], 200),
    ]);
    Cache::flush();

    $this->getJson('/api/suggest?q=cached-term&hl=en&gl=us')->assertOk();
    $this->getJson('/api/suggest?q=cached-term&hl=en&gl=us')->assertOk();

    Http::assertSentCount(1);
});

it('filters urls from suggestions', function () {
    Http::fake([
        'suggestqueries.google.com/*' => Http::response(['x', ['good keyword', 'https://spam.com', 'www.example.com y']], 200),
    ]);

    $response = $this->getJson('/api/suggest?q=test&hl=en&gl=us');

    $response->assertOk()->assertJson(['suggestions' => ['good keyword']]);
});

it('rejects missing query', function () {
    $this->getJson('/api/suggest')->assertStatus(422);
});

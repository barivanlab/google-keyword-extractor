<?php

namespace App\Http\Controllers;

use App\Services\GoogleSuggestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function suggest(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'q' => 'required|string|max:200',
            'hl' => 'nullable|string|max:5',
            'gl' => 'nullable|string|max:5',
        ]);

        $suggestions = GoogleSuggestService::fetch(
            $validated['q'],
            $validated['hl'] ?? 'en',
            $validated['gl'] ?? 'us'
        );

        return response()->json([
            'query' => $validated['q'],
            'suggestions' => $suggestions,
        ]);
    }
}

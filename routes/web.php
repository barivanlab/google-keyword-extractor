<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KeywordController;
use App\Http\Controllers\SuggestController;

Route::get('/', [KeywordController::class, 'index']);

// پروکسی سمت سرور برای Google Suggest (کش ۲۴ ساعته + ریت‌لیمیت)
Route::get('/api/suggest', [SuggestController::class, 'suggest'])
    ->middleware('throttle:60,1');

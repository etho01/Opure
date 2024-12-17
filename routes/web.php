<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

Route::get('getText', [DataController::class, 'getText']);

Route::get('getData', [DataController::class, 'getData']);

Route::get('getHtml', [DataController::class, 'getHtml']);

Route::prefix('ks')->group(function() {
    Route::get('', [DataController::class, 'show'])->name('ks');

    Route::get('enable', [DataController::class, 'enable']);
    Route::get('disable', [DataController::class, 'disable']);
});
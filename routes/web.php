<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

Route::get('/', function () {
    return view('welcome');
});

Route::get('getText', [DataController::class, 'getText']);

Route::get('getData', [DataController::class, 'getData']);

Route::get('getHtml', [DataController::class, 'getHtml']);
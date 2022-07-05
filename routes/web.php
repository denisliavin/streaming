<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StreamController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'streams', 'as' => 'streams.', 'middleware' => ['auth']], function (){
    Route::get('/create', [StreamController::class, 'create'])->name('create');
    Route::post('/', [StreamController::class, 'store'])->name('store');
    Route::get('/{stream}', [StreamController::class, 'show'])->name('show');
});


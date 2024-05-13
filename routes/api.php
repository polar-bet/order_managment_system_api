<?php

use App\Enums\TokenAbility;
use App\Http\Controllers\Account\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

Route::group(['middleware' => ['auth:sanctum', 'ability:access-api']], function () {
    Route::get('/user', fn (Request $request) => $request->user());
});


Route::resource('product', ProductController::class);

Route::group(['controller' => AccountController::class], function () {
    Route::post('/login', 'login')->middleware('guest:sanctum');
    Route::post('/register', 'register')->middleware('guest:sanctum');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/refresh', 'refresh')->middleware('auth:sanctum', 'ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value);
});

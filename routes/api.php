<?php

use App\Enums\TokenAbility;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Order\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Role\RoleController;

Route::group(['middleware' => 'auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value], function () {
    Route::get('/user', fn (Request $request) => $request->user());
    Route::group(['controller' => OrderController::class], function () {
        Route::get('/order/request', 'requestOrderIndex');
        Route::put('/order/{order}/approve', 'approve');
        Route::put('/order/{order}/decline', 'decline');
        Route::put('/order/{order}/delivered', 'delivered');
        Route::put('/order/{order}/execute', 'execute');
    });
});

Route::apiResource('product', ProductController::class)->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('category', CategoryController::class)->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('role', RoleController::class)->only('index')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('order', OrderController::class)->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);

Route::group(['controller' => AccountController::class], function () {
    Route::post('/login', 'login')->middleware('guest:sanctum');
    Route::post('/register', 'register')->middleware('guest:sanctum');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/refresh', 'refresh')->middleware('auth:sanctum', 'ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value);
});

<?php

use App\Enums\TokenAbility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\User\UserController as AdminUserController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Admin\Order\OrderController as AdminOrderController;
use App\Http\Controllers\Trader\Order\OrderController as TraderOrderController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Trader\Product\ProductController as TraderProductController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductController as AdminProductController;
use App\Http\Controllers\Admin\Category\CategoryController as AdminCategoryController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Message\MessageController;

Route::group(['middleware' => 'auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value], function () {
    Route::get('/user/current', [AccountController::class, 'currentUser']);
    Route::put('/user/trader-account', [UserController::class, 'changeAccount']);
    Route::delete('trader/product', [TraderProductController::class, 'destroy']);
    Route::delete('admin/category', [AdminCategoryController::class, 'destroy']);
    Route::delete('admin/product', [AdminProductController::class, 'destroy']);
    Route::get('admin/stats', [AdminOrderController::class, 'stats']);
    Route::delete('order', [OrderController::class, 'destroy']);
    Route::get('stats', [OrderController::class, 'stats']);

    Route::group(['prefix' => '/order/{order}'], function () {
        Route::put('/approve', [TraderOrderController::class, 'approve']);
        Route::put('/decline', [OrderController::class, 'decline']);
        Route::put('/execute', [AdminOrderController::class, 'execute']);
        Route::put('/delivered', [AdminOrderController::class, 'delivered']);
    });
});

Route::apiResource('admin/user', AdminUserController::class)->only(['index', 'update'])->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('admin/order', AdminOrderController::class)->only('index')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('trader/order', TraderOrderController::class)->only('index')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('trader/product', TraderProductController::class)->except('destroy')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('admin/category', AdminCategoryController::class)->except('destroy')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('product', ProductController::class)->only(['index', 'show'])->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('category', CategoryController::class)->only('index')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('role', RoleController::class)->only('index')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('user', UserController::class)->only('update')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('order', OrderController::class)->except('destroy')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('chat', ChatController::class)->except(['store', 'update'])->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('chat.message', MessageController::class)->only(['store'])->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);
Route::apiResource('message', MessageController::class)->only(['update', 'destroy'])->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);

Route::group(['controller' => AccountController::class], function () {
    Route::post('/login', 'login')->middleware('guest:sanctum');
    Route::post('/register', 'register')->middleware('guest:sanctum');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/refresh', 'refresh')->middleware(['auth:sanctum', 'ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value]);
});

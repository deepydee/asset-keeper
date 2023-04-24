<?php

use App\Http\Controllers\API\AttributeProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductAttributeController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')
    ->name('v1')
    ->group(function() {
        Route::apiResource('products', ProductController::class);
        Route::apiResource('categories', CategoryController::class);

        Route::get('categories/{category}/products', [CategoryProductController::class, 'index']);
        Route::post('categories/{category}/products', [CategoryProductController::class, 'store']);

        Route::get('products/{product}/attributes', [ProductAttributeController::class, 'index']);
        Route::post('products/{product}/attributes', [ProductAttributeController::class, 'store']);

        Route::get('attributes/{attribute}/products', [AttributeProductController::class, 'index']);
    });

<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LiabilityController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function() {
//     Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('assets/create/{date}', [AssetController::class, 'create'])
        ->name('assets.create');
    Route::resource('assets', AssetController::class);
    Route::resource('liabilities', LiabilityController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sources', SourceController::class);

    Route::permanentRedirect('{any}', '/dashboard')
        ->where('any', '.*');
});

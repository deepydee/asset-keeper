<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LiabilityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware('auth')->group(function() {
//     Route::get('assets/create/{date}', [AssetController::class, 'create'])
//         ->name('assets.create');
//     Route::resource('assets', AssetController::class);
//     Route::resource('liabilities', LiabilityController::class);
//     Route::resource('clients', ClientController::class);
//     Route::resource('promotions', PromotionController::class);
//     Route::resource('categories', CategoryController::class);
//     Route::resource('sources', SourceController::class);

//     Route::view('/dashboard', 'dashboard')->middleware('verified')->name('dashboard');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     // Route::permanentRedirect('{any}', '/dashboard')
//     //     ->where('any', '.*');
// });


// require __DIR__.'/auth.php';

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

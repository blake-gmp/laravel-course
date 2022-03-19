<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [WelcomeController::class, "index"]);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::middleware(['can:isAdmin'])->group(function() {
        Route::get('products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        Route::resource('products', ProductController::class);

        Route::resource('users', UserListController::class)->only([
           'index', 'edit', 'update', 'destroy', 'PUT'
        ]);
    });

    Route::get('/quiz/play', [QuizController::class, 'play'])->name('quiz.play');
    Route::post('/quiz/play/{quiz}/{answer}', [QuizController::class, 'verification'])->name('quiz.verification');
    Route::resource('quiz', QuizController::class);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//Route::get("/users/list", [UserListController::class, "index"]);
//Route::delete("/users/{user}", [UserListController::class, "destroy"]);
//Route::delete("/products/{product}", [ProductController::class, "destroy"])->name('products.index')->middleware(['auth']);
//Route::get("/products", [ProductController::class, "index"])->name('products.index')->middleware(['auth']);
//Route::get("/products/create", [ProductController::class, "create"])->name('products.create')->middleware(['auth']);
//Route::get("/products/show/{product}", [ProductController::class, "show"])->name('products.show')->middleware(['auth']);
//Route::get("/products/edit/{product}", [ProductController::class, "edit"])->name('products.edit')->middleware(['auth']);
//Route::post("/products", [ProductController::class, "store"])->name('products.store')->middleware(['auth']);
//Route::post("/products/{product}", [ProductController::class, "update"])->name('products.update')->middleware(['auth']);
Auth::routes(['verify' => true]);

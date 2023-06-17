<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/register', function () {
   
    return Inertia::render('welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', [FrontController::class, 'index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/welcome', action:'HomeController@index');


//=============================Routes du panier============================

Route::post('/add-to-cart/{id}', [
    'uses'          => 'App\Http\Controllers\CartController@add',
    'as'            => 'cart.add'
]);

Route::get('/show-cart', [
    'uses'          => 'App\Http\Controllers\CartController@show',
    'as'            => 'cart.show'
]);

Route::get('/checkout', [
    'uses'          => 'App\Http\Controllers\CartController@checkout',
    'as'            => 'checkout'
]);

Route::post('/new-order', [
    'uses'          => 'App\Http\Controllers\CartController@newOrder',
    'as'            => 'order.new'
]);
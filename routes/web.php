<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/home', function () {
    return view('index');
})->name('home');

Route::get('/meals', function () {
    return view('meals');
})->name('meals');

Route::get('/catchus', function () {
    return view('catchus');
})->name('catchus');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

require __DIR__.'/auth.php';

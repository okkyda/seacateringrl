<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\AdminDashboardController;
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
     $reviews = \App\Models\Review::latest()->get();
    return view('index', compact('reviews'));
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard.user');
    Route::post('/dashboard/update', [DashboardUserController::class, 'update'])->name('dashboard.user.update');
});



// Route::get('/dashboard-adm', [AdminDashboardController::class, 'index'])->name('dashboard');
// Route::get('/home', function () {
//     return view('index');
// })->name('home');

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


// Dashboard Admin hanya untuk admin
Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])
    ->middleware('role:admin')
    ->name('dashboard-admin');



// Dashboard User hanya untuk user
Route::get('/dashboard', [DashboardUserController::class, 'index'])
    ->middleware('role:user')
    ->name('dashboard.user');


Route::get('/subscription', function () {
    return view('subscription');
})->middleware(['auth', 'role:user'])->name('subscription');

Route::post('/subscriptions', [SubscriptionController::class, 'store'])
    ->middleware(['auth', 'role:user'])
    ->name('subscriptions.store');


require __DIR__.'/auth.php';

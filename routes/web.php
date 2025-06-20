<?php

use App\Http\Controllers\{
    AIController,
    HomeController,
    PostController,
    UserController
};

use Illuminate\Support\Facades\Auth;
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

// Unused Routes
Auth::routes(['register' => true, 'reset' => false]);

// Users routes.
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Home Routes
Route::resource('/', HomeController::class)->name('index', 'home');
Route::resource('home', HomeController::class)->name('index', 'home');

// Post Routes
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::middleware('auth')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{posts}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/{posts}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/{posts}/update', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{posts}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
    });
});

// AI Chat Routes
Route::post('/rainy/chat', [AIController::class, 'chat']);

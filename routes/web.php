<?php

use App\Http\Controllers\{
    AIController,
    PostController
};

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

// Home Routes
Route::get('/', function () { return view('pages/home'); });
Route::get('/home', function () { return view('pages/home'); });

// Post Routes
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
});

// AI Chat Routes
Route::post('/rainy/chat', [AIController::class, 'chat']);

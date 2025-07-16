<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware(['auth'])->group(function () {
     Route::get('/blog/list', [PostController::class, 'list'])->name('posts.list');
     Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
     Route::post('/blog/store', [PostController::class, 'store'])->name('posts.store');
     Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
     Route::put('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
     Route::delete('/blog/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('{id}/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/blog', [PostController::class, 'listAll'])->name('blog.index');

Route::view('/contact', 'contact.index')->name('contact.index');

Route::get('/blog/buscar', [PostController::class, 'search'])->name('blog.search');

Route::get('/blog/categoria/{slug}', [PostController::class, 'byCategory'])->name('posts.byCategory');
Route::get('/blog/etiqueta/{slug}', [PostController::class, 'byTag'])->name('posts.byTag');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

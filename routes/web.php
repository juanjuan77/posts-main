<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'home']);

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get( '/crearPost', [PostController::class, 'create'])->middleware(['auth'])->name('crearPost');
Route::post('/storePost', [PostController::class, 'store'])->middleware(['auth'])->name('storePost');
Route::get('/obtenerPosts', [PostController::class, 'import'])->middleware(['auth'])->name('obtenerPosts');

require __DIR__.'/auth.php';

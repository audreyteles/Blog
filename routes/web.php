<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route("register");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Retorna a página com todos os posts
    Route::get("/posts", [PostController::class, 'index'])->name('posts.index');
    // Retorna a página de criação de um post
    Route::get("/posts/create", [PostController::class, 'create'])->name('posts.create');
    // Retorna a página de edição de um post
    Route::get("/posts/{posts}/edit", [PostController::class, 'edit'])->name('posts.edit');
    // Retorna a página com um post específico
    Route::get("/posts/{posts}", [PostController::class, 'show'])->name('posts.show');

    // Cria um post
    Route::post("/posts", [PostController::class, 'store'])->name('posts.store');
    // Atualiza um post
    Route::put("/posts/{posts}", [PostController::class, 'update'])->name('posts.update');
    // Apaga um post
    Route::delete("/posts/{posts}", [PostController::class, 'destroy'])->name('posts.destroy');

});

require __DIR__ . '/auth.php';

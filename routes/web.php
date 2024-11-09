<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/profile/search', [ProfileController::class, 'search'])->name('profile.search');


Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// Routes voor profielbewerking, alleen toegankelijk voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

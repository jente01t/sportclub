<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile/search', [ProfileController::class, 'search'])->name('profile.search');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::post('/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::get('/faq', [FaqController::class, 'indexUser'])->name('faq.indexUser');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/chats', [ChatController::class, 'index'])->name('chats.index');
    Route::get('/chats/create', [ChatController::class, 'create'])->name('chats.create');
    Route::post('/chats', [ChatController::class, 'store'])->name('chats.store');
    Route::get('/chats/{chat}', [ChatController::class, 'show'])->name('chats.show');
    Route::post('/chats/{chat}/messages', [MessageController::class, 'store'])->name('messages.store');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/promote/{id}', [AdminController::class, 'promoteToAdmin'])->name('admin.promote');
    Route::get('/demote/{id}', [AdminController::class, 'demoteToUser'])->name('admin.demote');
    Route::get('/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::post('/store-user', [AdminController::class, 'storeUser'])->name('admin.storeUser');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/news/{id}/comments', [AdminController::class, 'comments'])->name('admin.news.comments');
    Route::delete('/news/{newsId}/comments/{commentId}', [AdminController::class, 'commentsDestroy'])->name('admin.news.commentsDestroy');
    Route::get('/news', [AdminController::class, 'newsIndex'])->name('admin.news.index');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::resource('faqs', FaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);
    Route::resource('faq-categories', FaqCategoryController::class)->names([
        'index' => 'admin.faq-categories.index',
        'create' => 'admin.faq-categories.create',
        'store' => 'admin.faq-categories.store',
        'edit' => 'admin.faq-categories.edit',
        'update' => 'admin.faq-categories.update',
        'destroy' => 'admin.faq-categories.destroy',
    ]);
    Route::get('/contact', [AdminController::class, 'contactIndex'])->name('admin.contact.contactIndex');
    Route::get('/contact/{id}', [AdminController::class, 'contactShow'])->name('admin.contact.contactShow');
    Route::post('/contact/{id}/reply', [AdminController::class, 'contactReply'])->name('admin.contact.contactReply');
});

require __DIR__.'/auth.php';

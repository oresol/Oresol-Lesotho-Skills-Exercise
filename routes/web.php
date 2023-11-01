<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\StaticPageController;
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



    Route::view('/admin', 'welcome');

    Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/about', [StaticPageController::class, 'about'])->name('about');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
Route::get('/', [ArticleController::class, 'articles'])->name('GetArticles');
Route::get('/articles/{articleId}', [ArticleController::class, 'article'])->name('viewArticle');



// All routes that require Authentication

Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('tags', TagController::class);
});

require __DIR__.'/auth.php';

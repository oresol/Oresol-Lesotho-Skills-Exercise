<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/about-us', function () {return view('about');});
Route::get('/', [ArticleController::class, 'index'])->name('base');
Route::get('/home', [ArticleController::class, 'index'])->name('base');
Route::get('/get-create', [ArticleController::class, 'getCreate'])->name('getcreate');
Route::get('/list-articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/edit-article/{id}', [ArticleController::class, 'getEditArticle'])->name('geteditarticle');
Route::get('/manage-props', [ArticleTagsController::class, 'manageProps'])->name('manageprops');
Route::post('/home', [ArticleController::class, 'index'])->name('basepost');
Route::post('/add-article', [ArticleController::class, 'addArticle'])->name('addarticle');
Route::post('/edit-article/{id}', [ArticleController::class, 'editArticle'])->name('editarticle');
Route::post('/create-tag', [TagController::class, 'createTag'])->name('createtag');
Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('createcategory');
Route::post('/edit-category{id}', [CategoryController::class, 'editCategory'])->name('editcategory');
Route::post('/edit-tag/{id}', [TagController::class, 'editTag'])->name('edittag');
Route::delete('/delete-article/{id}', [ArticleController::class, 'deleteArticle'])->name('deletearticle');
Route::delete('/delete-tag/{id}', [TagController::class, 'deleteTag'])->name('deletetag');
Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('deletecategory');






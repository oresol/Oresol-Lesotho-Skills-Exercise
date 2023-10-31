<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoriesController;


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
    return view('welcome');
});

Auth::routes();

Route::resource('/articles', ArticlesController::class);
Route::resource('/tags', TagController::class);
Route::resource('/category', CategoriesController::class);

Route::prefix('dashboard')->group(function () {
   Route::get( '/catergories', [App\Http\Controllers\DashboardController::class, 'createCategory'] );
   Route::get( '/articles', [App\Http\Controllers\DashboardController::class, 'createPost'] ); 
   Route::get( '/tags', [App\Http\Controllers\DashboardController::class, 'createTags'] );  
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

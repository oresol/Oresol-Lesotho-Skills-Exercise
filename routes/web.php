<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Model\Post;

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

//authentication routes
Auth::routes();

//named route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//unnamed route
Route::get('/', [App\Http\Controllers\BlogController::class, 'welcome']);

Route::get('/about', [App\Http\Controllers\BlogController::class, 'aboutPage']);


//create post route
 Route::get('/create', [App\Http\Controllers\PostsController::class, 'createPage']);


//route to add posts to database
Route::POST('create', [PostsController::class, 'AddPosts']);


Route::get('/welcome', [PostsController::class, 'show']);






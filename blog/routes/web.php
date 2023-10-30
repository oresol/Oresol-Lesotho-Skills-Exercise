<?php

use App\Http\Controllers\ PublishArticlesController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('login', function () {
    return view('login');
});

Route::get('article_data', function () {
    return view('article_data');
});


Route::get('about_us', function () {
    return view('about_us');
});


Route::get('publish_article', function () {
    return view('publish_article');
});

Route::get('author_dashboard', function () {
    return view('author_dashboard');
});


Route::post('login','AuthorLoginController@LoginAuthor')->name('authorLogin');
Route::post('publishArticle','PublishArticlesController@AddArticle')->name('publishArticle');
Route::get('article_data', 'PublishArticlesController@retrieveArticles')->name('article_data');



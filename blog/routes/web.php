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



Route::get('author_login', function () {
    return view('author_login');
});

Route::get('article_data', function () {
    return view('article_data');
});


Route::get('about_us', function () {
    return view('about_us');
});

Route::get('full_story', function () {
    return view('full_story');
});

Route::get('publish_article', function () {
    return view('publish_article');
});


Route::get('author_dashboard', function () {
    return view('author_dashboard');
});

Route::get('published_articles', function () {
    return view('published_articles');
});

Route::get('author_articles', function () {
    return view('author_articles');
});

Route::get('add_categories', function () {
    return view('add_categories');
});

Route::get('manage_categories', function () {
    return view('manage_categories');
});



Route::post('author_login','AuthorLoginController@LoginAuthor')->name('author_login');
Route::post('publishArticle','PublishArticlesController@AddArticle')->name('publishArticle')->middleware('author');
Route::get('article_data', 'PublishArticlesController@retrieveArticles')->name('article_data');
Route::get('/articles/{id}', 'PublishArticlesController@displayFullStory')->name('full_story');


Route::get('published_articles', 'AuthorLoginController@AuthorArticles')->name('published_articles')->middleware('author');
Route::get('/author_articles/{id}', 'AuthorLoginController@displayEntireArticle')->name('author_articles')->middleware('author');
Route::delete('delete_article/{id}', 'AuthorLoginController@deleteArticle')->name('delete_article')->middleware('author');;
Route::get('edit_article/{id}', 'AuthorLoginController@editArticle')->name('edit_article')->middleware('author');
Route::put('update_article/{id}', 'AuthorLoginController@updateArticle')->name('update_article')->middleware('author');
Route::post('/add_category', 'AuthorLoginController@addCategory')->name('add_category')->middleware('author');
Route::post('/display_categories', 'AuthorLoginController@displayCategories')->name('display_categories')->middleware('author');
Route::get('/edit_categories/{id}', 'AuthorLoginController@editCategories')->name('edit_categories')->middleware('author');
Route::put('/update_categories/{id}', 'AuthorLoginController@updateCategories')->name('update_categories')->middleware('author');
Route::delete('/delete_categories/{id}', 'AuthorLoginController@deleteCategories')->name('delete_categories')->middleware('author');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

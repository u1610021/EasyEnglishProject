<?php

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

Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/details', 'PagesController@getDetails');
Route::get('/grammar', 'PagesController@getGrammar')->name('grammar');
Route::get('/books', 'PagesController@getBooks')->name('books');
Route::get('/videos', 'PagesController@getVideos')->name('videos');
Auth::routes();
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::post('/comments/{blog_id}', ['uses' => 'BlogCommentsController@store', 'as' => 'comments.store']);
Route::post('ielts/comments/{ielts_id}', ['uses' => 'IeltsCommentController@store', 'as' => 'ielts.comments.store']);
Route::get('/storage/{file}', 'PagesController@getDownload');

Route::prefix('ielts')->group(function(){
	Route::get('/speaking', 'IeltsPageController@getSpeaking')->name('speaking');
	Route::get('/listening', 'IeltsPageController@getListening')->name('listening');
	Route::get('/reading', 'IeltsPageController@getReading')->name('reading');
	Route::get('/writing', 'IeltsPageController@getWriting')->name('writing');
});

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@LoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/speaking', 'AdminController@speaking')->name('admin.speaking');
	Route::get('/listening', 'AdminController@listening')->name('admin.listening');
	Route::get('/reading', 'AdminController@reading')->name('admin.reading');
	Route::get('/writing', 'AdminController@writing')->name('admin.writing');	
	Route::get('/grammar', 'AdminController@grammar')->name('admin.grammar');
	Route::get('/video', 'AdminController@video')->name('admin.video');
	Route::get('/book', 'AdminController@book')->name('admin.book');
	Route::get('/comments/blog', 'AdminController@blogcomments')->name('admin.blogcomments');
	Route::get('/comments/ielts', 'AdminController@ieltscomments')->name('admin.ieltscomments');			
});

Route::resource('/blog', 'BlogsController');
Route::resource('/ielts', 'IeltsController');
Route::resource('/comments', 'BlogCommentsController');
Route::resource('ielts/comments', 'IeltsCommentController');
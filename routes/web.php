<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


// Basic pages
Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

// Blog routes
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

// Auth routes
Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/admin/profile', 'UserController@profile');
Route::post('/admin/profile', 'UserController@update');

// Posts
Route::resource('/admin/posts', 'PostController');

// Categories
Route::resource('/admin/categories', 'CategorieController', ['except' => ['create']]);

// Tags
Route::resource('/admin/tags', 'TagController', ['except' => ['create']]);

// Comments
Route::get('/admin/comments/', ['uses' => 'CommentsController@index', 'as' => 'comments.index']);
Route::post('/admin/comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('/admin/comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('/admin/comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::get('/admin/comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
Route::delete('/admin/comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

// Route::resource('comments', 'CommentsController', ['except' => ['']]);

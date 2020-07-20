<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}','PostController@show')->name('post');

Route::middleware('auth')->group(function(){

     //Admin
     Route::get('/admin','AdminsController@index')->name('admin.index');
     //Post
     Route::get('/admin/posts', 'PostController@index')->name('post.index');
     Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
     Route::post('/admin/posts', 'PostController@store')->name('post.store');
     Route::post('/admin/posts/{post}', 'PostController@destroy')->name('post.destroy');
     Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
     Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');

     Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
     Route::put('/admin/users/{user}/update', 'UserController@update')->name('user.profile.update');

     Route::get('/admin/users', 'UserController@index')->name('admin.users.index');
     Route::delete('/admin/{user}/users', 'UserController@destory')->name('admin.users.destroy');

});

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

    
     Route::put('/admin/users/{user}/update', 'UserController@update')->name('user.profile.update');
    
     Route::delete('/admin/{user}/users', 'UserController@destory')->name('admin.users.destroy');

});

Route::middleware(['role:admin','auth'])->group(function(){
     Route::get('/admin/users', 'UserController@index')->name('admin.users.index');
});

// Route::middleware(['can:view,user'])->group(function(){
//      Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
// });

 Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
 Route::put('/admin/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
 Route::put('/admin/users/{user}/detach', 'UserController@detach')->name('user.role.detach');

 Route::get('/admin/roles','RoleController@index')->name('admin.roles');
 Route::post('/admin/roles/create','RoleController@store')->name('admin.roles.store');
 Route::delete('/admin/roles/{role}/delete','RoleController@destory')->name('roles.destory');
 Route::get('/admin/roles/{role}/edit','RoleController@edit')->name('admin.roles.edit');
 Route::put('/admin/roles/{role}/update','RoleController@update')->name('admin.roles.update');
 Route::put('/admin/roles/{role}/attach','RoleController@attach')->name('admin.roles.attach');
 Route::put('/admin/roles/{role}/detach','RoleController@detach')->name('admin.roles.detach');


 Route::get('/admin/permissions','PermissionController@index')->name('admin.permissions');
 Route::post('/admin/permissions','PermissionController@store')->name('admin.permission.store');
 Route::get('/admin/permissions/{permission}/edit','PermissionController@edit')->name('admin.permission.edit');
 Route::put('/admin/permission/{permission}/update','PermissionController@update')->name('admin.permission.update');
 Route::delete('/admin/permissions/{permission}/delete','PermissionController@destroy')->name('permission.destroy');
 

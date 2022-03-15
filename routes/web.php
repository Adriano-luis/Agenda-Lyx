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

Route::get('/',function(){
   return redirect()->route('contacts.index');
});

Route::get('/login','LoginController@index')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('post.login');

Route::get('/cadastar', 'UserController@new')->name('new-user');
Route::post('/cadastar', 'UserController@save')->name('new-user');

Route::middleware('login')->prefix('in')->group(function (){
    Route::resource('/contacts', 'ContactController');
    Route::get('/profile', 'UserController@edit')->name('user.edit');
    Route::post('/profile', 'UserController@update')->name('user.update');
    Route::get('/logout','LoginController@sair')->name('logout');
});

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ArticleController@index')->name('home');
Route::get('/create-article', 'ArticleController@create')->name('create-article');
Route::post('/submit-article', 'ArticleController@store')->name('submit-article');
Route::get('/edit-article/{id}', 'ArticleController@edit')->name('edit-article');
Route::put('/update-article/{id}', 'ArticleController@update')->name('update-article');
Route::delete('/delete-article/{id}', 'ArticleController@destroy')->name('delete-article');

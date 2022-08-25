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

Route::get('/', 'App\Http\Controllers\FormController@index')->name('index');
Route::get('/form', 'App\Http\Controllers\FormController@form')->name('form');
Route::post('/form', 'App\Http\Controllers\FormController@create')->name('create');
Route::get('/detail/{id}', 'App\Http\Controllers\FormController@detail')->name('detail');
Route::get('/list', 'App\Http\Controllers\FormController@list')->name('list');

Route::get('/reply/{id}', 'App\Http\Controllers\MailingController@reply')->name('reply');
Route::post('/sendmail', 'App\Http\Controllers\MailingController@sendMail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

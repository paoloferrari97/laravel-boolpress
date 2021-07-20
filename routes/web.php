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
/* GUESTS */

Route::get('/', function () {
    return view('welcome');
});
Route::resource('articles', ArticleController::class)->only('index', 'show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

/* ADMIN */
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {
    //Route::get('/', 'HomeController@index')->name('home');
    Route::resource('articles', HomeController::class);
});
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

/* ADMIN */
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::post('api-token', 'ApiTokenController@update')->name('api-token');
});

/* GUESTS */
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

Route::get('/', 'PageController@index')->name('home');
Route::get('about', 'PageController@about')->name('about');

/* OPZIONE 1 */
/* Route::get('contacts', 'PageController@contacts')->name('contacts');
Route::post('contacts', 'PageController@sendForm')->name('contacts.send'); */

/* OPZIONE 2 */
Route::get('contacts', 'ContactController@form')->name('contacts');
Route::post('contacts', 'ContactController@storeAndSend')->name('contacts.send');

/* VUE-POSTS */
Route::get('blog', function () {
    return view('blog');
});
<?php

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* Senza controller */
//1
/* Route::get('posts', function () {
    $posts = Post::all();
    return response()->json([
        'response' => $posts,
        'total_results' => count($posts)
    ]);
}); */

//2 - scorciatoia non personalizzabile
/* Route::get('posts', function () {
    $posts = Post::all();
    return $posts;
}); */

//3 - con paginazione
Route::get('posts', function () {
    $posts = Post::paginate(); //di default è 15, se voglio cambio scrivendo tra parentesi
    return $posts;
});
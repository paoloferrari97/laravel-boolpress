<?php

use App\Category;
use App\Http\Resources\PostResource;
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

/* per vedere le api l'url è .... /api/posts <-- ottengo il risultato dell'api (json)*/

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
/* Route::get('posts', function () {
    $posts = Post::paginate(); //di default è 15, se voglio cambio scrivendo tra parentesi
    return $posts;
}); */

//4 - con relazioni
/* Route::get('posts', function () {
    $posts = Post::with(['tags'])->get(); //in with invoco il metodo definito in modello Post
    return $posts;
}); */

//5 - con relazioni e paginazione
/* Route::get('posts', function () {
    $posts = Post::with(['tags'])->paginate();
    return $posts;
}); */

/* Con controller */
//1
/* Route::get('posts', 'API\PostController@index'); */

/* Risorsa API Eloquent */
//Per risorsa singola
/* Route::get('posts/{post}', function (Post $post) {
    return new PostResource(Post::find($post));
}); */

//Per risorse multiple
Route::get('posts', 'API\PostController@index');

/* API protette */
Route::middleware('auth:api')->group(function () {
    Route::get('categories', function () {
        /* return Category::all(); */
        return response()->json([
            'success' => true,
            'data' => Post::with('category')->get()
        ], 200);
    });
});
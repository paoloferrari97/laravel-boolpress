<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('id');

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required | max:255 | min:5',
            'body' => 'required',
            /* 'image' => 'nullable | max:255' */
            'image' => 'nullable | max:50 | mimes:jpg,png' // or image //per img caricata
        ]);

        if ($request->hasFile('image')) {
            $file_path = Storage::put('post_img', $validateData['image']); //mettiamo il file in Storage, posts_img
            $validateData['image'] = $file_path; //salviamo il link all'immagine in colonna 'image' per ogni nuovo elemento
        }
        //ddd($file_path);
        //ddd($validatedData);
        Post::create($validateData);

        return redirect()->route('admin.posts.index');
        //return redirect()->route('admin.posts.show', $post->id); oppure questo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validateData = $request->validate([
            'title' => 'required | max:255 | min:5',
            'body' => 'required',
            /* 'image' => 'nullable' */
            'image' => 'nullable | mimes:jpg,png | max:50', // or image
        ]);

        if (array_key_exists('image', $validateData)) {
            $file_path = Storage::put('post_img', $validateData['image']);
            $validateData['image'] = $file_path;
            //per eliminare file vecchio
            //Storage::delete('post_img/' . $post->image);
            Storage::delete($post->image);
        }

        $post->update($validateData);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
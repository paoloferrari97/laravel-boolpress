@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)

                <div class="post col-md-4">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <img src="{{ $post->image }}" class="img-fluid" alt="" />
                    </a>
                    <h1>{{ $post->title }}</h1>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>

@endsection

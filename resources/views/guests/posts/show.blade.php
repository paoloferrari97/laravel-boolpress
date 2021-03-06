@extends('layouts.app') @section('content')

    <div class="container">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />

        <h1>{{ $post->title }}</h1>

        <div class="tags">
            Tags:
            @forelse($post->tags as $tag)
                <span>{{ $tag->name }}</span>
            @empty
                <span>Non ci sono tag associati a questo post!</span>
            @endforelse
        </div>

        <a href="{{ route('posts.index') }}"><i class="fas fa-arrow-left fa-sm fa-fw"></i> Back</a>
    </div>

@endsection

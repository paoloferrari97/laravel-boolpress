@extends('layouts.admin') @section('content')

    {{-- <img src="{{ $post->image }}" alt="" /> --}}

    <img width="100" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <h5>Categoria: {{ $post->category ? $post->category->name : 'Non ancora categorizzato' }}</h5>
    {{-- per mostrare a schermo la categoria (faccio controllo con un operatore ternario, se categoria esiste la mostro, in caso mostro la stringa non ancora categorizzato) --}}

    <a href="{{ route('admin.posts.index') }}"><i class="fas fa-arrow-left fa-sm fa-fw"></i> Back</a>
    <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" @click="cancel($event)" class="btn btn-danger">Delete</button>
    </form>

@endsection

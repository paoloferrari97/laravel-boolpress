@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="text-center">Sezione amministratori</h1>

        <h2>Modifica articolo:</h2>

        <form action="{{ route('admin.articles.update', $article->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text" rows="3">{{ $article->text }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $article->date }}">
            </div>
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $article->author }}">
            </div>

            <button type="submit" class="btn btn-primary">Modifica!</button>

        </form>

    </div>

@endsection

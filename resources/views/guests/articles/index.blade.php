@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Articoli:</h1>

            <div class="cards">

                @foreach ($articles as $article)

                    <div class="card">
                        <a href="{{ route('articles.show', $article->id) }}">

                            <h5>{{ $article->title }}</h5>
                            <span>{{ $article->text }}</span>
                            <span>Scritto da: {{ $article->author }}</span>
                            <span>Pubblicato il: {{ $article->date }}</span>

                        </a>
                    </div>

                @endforeach

            </div>

    </div>

@endsection

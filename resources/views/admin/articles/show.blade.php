@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="text-center">Sezione amministratori</h1>

        <div class="cards">

            <div class="card">
                <h5>Titolo: {{ $article->title }}</h5>
                <span>Testo: {{ $article->text }}</span>
                <span>Scritto da: {{ $article->author }}</span>
                <span>Pubblicato il: {{ $article->date }}</span>
            </div>
        </div>
    </div>

@endsection

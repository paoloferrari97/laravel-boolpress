@extends('layouts.app')

@section('content')

    <div class="container pagina_show">

        <h5>{{ $article->title }}</h5>
        <span>{{ $article->text }}</span>
        <span>Scritto da: {{ $article->author }}</span>
        <span>Pubblicato il: {{ $article->date }}</span>

    </div>

@endsection

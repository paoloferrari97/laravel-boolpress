@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="text-center">Sezione amministratori</h1>

        <h2>Crea nuovo articolo:</h2>

        <form action="{{ route('admin.articles.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo!">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text" rows="3" placeholder="Inserisci il testo!"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Inserisci la data!">
            </div>
            <div class="form-group">
                <label for="author">Autore</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Inserisci l'autore!">
            </div>

            <button type="submit" class="btn btn-primary">Crea!</button>

        </form>

    </div>

@endsection

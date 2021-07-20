@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="text-center">Sezione amministratori</h1>

        <h2>Articoli:</h2>
        {{-- <div class="cards">
            @foreach ($articles as $article)

                <div class="card">
                    <a href="{{ route('admin.articles.show', $article->id) }}">

                        <h5>{{ $article->title }}</h5>
                        <span>{{ $article->text }}</span>
                        <span>Scritto da: {{ $article->author }}</span>
                        <span>Pubblicato il: {{ $article->date }}</span>

                    </a>
                </div>

            @endforeach
        </div> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->text }}</td>
                        <td>{{ $article->date }}</td>
                        <td>{{ $article->author }}</td>
                        <td><a href="{{ route('admin.articles.show', $article->id) }}">View</a> | <a
                                href="{{ route('admin.articles.edit', $article->id) }}">Edit</a> | Delete</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2><a href="{{ route('admin.articles.create') }}">Crea nuovo articolo!</a></h2>
    </div>

@endsection

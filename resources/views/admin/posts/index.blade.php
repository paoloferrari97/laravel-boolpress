@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between">
        <h1>Tutti i posts!</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-info d-flex align-items-center">
            <span><i class="fas fa-plus"></i> Crea nuovo post !</span>
        </a>
    </div>

    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td>
                        {{-- <img width="100" src="{{ $post->image }}" alt="{{ $post->title }}" /> --}}
                        @if ($post->cover)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye fa-sm fa-fw"></i>
                        </a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary">
                            <i class="fas fa-pencil-alt fa-sm fa-fw"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" @click="cancel($event)" class="btn btn-danger"><i
                                    class="fas fa-trash fa-xs fa-fw"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.admin') @section('content')

    <h1>All posts</h1>
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
                    <td><img width="100" src="{{ $post->image }}" alt="{{ $post->title }}" /></td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}">
                            <i class="fas fa-eye fa-sm fa-fw"></i> View
                        </a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}">
                            <i class="fas fa-pencil-alt fa-sm fa-fw"></i> Edit
                        </a>
                        <a href="#"> <i class="fas fa-trash fa-sm fa-fw"></i> Delete </a>
                        // Delete sarà dentro un form (serve per il metodo 'DELETE')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

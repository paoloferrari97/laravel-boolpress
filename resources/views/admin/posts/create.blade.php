@extends('layouts.admin') @section('content')

    <h1>Crea un nuovo post!</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                aria-describedby="titleHelperr" placeholder="Aggiungi un titolo" value="{{ old('title') }}" required
                minlength="5" maxlength="255" />
            <small id="titleHelperr" class="form-text text-muted">Inserisci il titolo del post! (max 255 caratteri)</small>
        </div>

        {{-- <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                aria-describedby="imageHelperr" placeholder="Aggiungi l'url di un'immagine" value="{{ old('image') }}" />
            <small id="imageHelperr" class="form-text text-muted">Inserisci l'url di un'immagine! (max 255
                caratteri)</small>
        </div> --}}

        {{-- PER CARICARE UN FILE (IN QUESTI CASO UN IMG) --}}
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                aria-describedby="imageHelperr" placeholder="Aggiungi un'immagine" {{-- value="{{ old('image') }}" --}} />
            <small id="imageHelperr" class="form-text text-muted">Inserisci un'immagine! (max 50 KB)</small>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea required class="form-control @error('body') is-invalid @enderror" name="body" id="body"
                rows="5">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>
    </form>

@endsection

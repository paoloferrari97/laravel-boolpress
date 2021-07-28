@extends('layouts.admin') @section('content')

    <h1>Modifica post!</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                aria-describedby="titleHelperr" placeholder="Aggiungi un titolo" value="{{ $post->title }}" required
                minlength="5" maxlength="255" />
            <small id="titleHelperr" class="form-text text-muted">Inserisci il titolo del post! (max 255 caratteri)</small>
        </div>

        {{-- <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                aria-describedby="imageHelperr" placeholder="Aggiungi l'url di un'immagine" value="{{ $post->image }}" />
            <small id="imageHelperr" class="form-text text-muted">Inserisci l'url di un'immagine! (max 255
                caratteri)</small>
        </div> --}}

        {{-- PER CARICARE UN FILE (IN QUESTI CASO UN IMG) --}}
        <img src="{{ asset('storage/' . $post->image) }}" alt="">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                aria-describedby="imageHelperr" placeholder="Aggiungi un'immagine" {{-- value="{{ $post->image }}" --}} />
            <small id="imageHelperr" class="form-text text-muted">Inserisci un'immagine se vuoi cambiarla! (max 50
                KB)</small>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea required class="form-control @error('body') is-invalid @enderror" name="body" id="body"
                rows="5">{{ $post->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name=" category_id" id="category_id">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control" name="tags[]" id="tags" multiple>
                <option value="" disabled>Seleziona un tag</option>
                @if ($tags)
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'select' : '' }}>
                            {{ $tag->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>

@endsection

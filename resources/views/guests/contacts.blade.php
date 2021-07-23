@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contattami</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('message') }}</strong>
            </div>

            <script>
                $(".alert").alert();
            </script>
        @endif
        <form action="{{ route('contacts.send') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Nome Cognome" aria-describedby="FullNamehelper" minlength="5" maxlength="255" required
                    value="{{ old('full_name') }}">
                <small id="FullNamehelper" class="text-muted">Scrivi qui il tuo nome completo!</small>
            </div>
            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <input type="email" class="form-control @error('title') is-invalid @enderror" name="email" id="email"
                    aria-describedby="emailHelpId" placeholder="esempio@esempio.com" required value="{{ old('email') }}">
                <small id="emailHelpId" class="form-text text-muted">Scrivi qui la tua email!</small>
            </div>
            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea class="form-control @error('title') is-invalid @enderror" name="message" id="message" rows="5"
                    request>{{ old('message') }}</textarea>
            </div>
            <button type="submit" name="" id="" class="btn btn-primary btn-block"><i
                    class="fas fa-envelope-open fa-lg fa-fw"></i> Invia!</button>
        </form>
    </div>
@endsection

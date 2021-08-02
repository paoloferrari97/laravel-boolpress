@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">API Token:</div>

                    <div class="card-body">
                        @if (Auth::user()->api_token)
                            <dt>API Token</dt>
                            <div class="form-group">
                                <input class="form-control" type="password" value="{{ Auth::user()->api_token }}">
                                <small>Il token è oscurato per ragioni di sicurezza. Se non te lo ricordi,
                                    rigeneralo!</small>
                            </div>
                        @endif
                        <form action="{{ route('admin.api-token') }}" method="post">
                            @csrf
                            <button class="btn btn-outline-primary" type="submit">
                            @if (!Auth::user()->api_token) Generate @else Re-generate
                                @endif Token
                            </button>
                        </form>
                    </div>
                    @if (session('api_token'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Token generato! Salvalo in un posto sicuro!
                            <strong>{{ session('api_token') }}</strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

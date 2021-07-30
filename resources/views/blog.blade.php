@extends('layouts.app')

@section('content')

    <h1 class="text-center">Blog</h1>

    <div class="container d-flex flex-wrap">
        <div class="card" v-for="post in posts">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">@{{ post . title }}</h4>
                <p class="card-text">@{{ post . body }}</p>
            </div>
        </div>
    </div>

@endsection

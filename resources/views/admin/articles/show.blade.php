@extends('layouts.admin')

@section('title' , $article->title )
@section('content')

<div class="container">
    <img src="{{ $article->image_url }}" class="img-fluid"  alt="{{ $article->title }}">

    <h3 >{{ $article->title }}</h3>


    <p>{{ $article->body }}</p>

    <span>{{ $articleTags }}</span>

</div>

@endsection

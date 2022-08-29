@extends('layouts.admin')

@section('title' , $category->name )
@section('content')

<div class="container">


    <h3 >{{ $category->name }}</h3>


    @forelse($category->articles as $article)

    <span>Article Title : </span> <a href="{{ route('articles.show' , $article->id) }}">{{ $article->title }}</a>

    @empty
    <p>This Category has not Articles </p>
    @endforelse

</div>

@endsection

@extends('layouts.admin')

@section('title' , $category->name )
@section('content')

<div class="container">


    <h3 >Category Name : {{ $category->name }}</h3>

    @php $i=1 @endphp
    @forelse($category->articles as $article)

    <span>Article Number {{ $i++ }} : </span> <a href="{{ route('articles.show' , $article->id) }}">{{ $article->title }}</a><br>

    @empty
    <p>This Category has not Articles </p>
    @endforelse

</div>

@endsection

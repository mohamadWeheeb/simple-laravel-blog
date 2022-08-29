@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')


	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h3>You Have {{ $articles }} Article</h3>
                <a class="btn btn-outline-primary" href="{{ route('articles.index') }}">Manage Articles</a>
			</div>
			<div class="col-sm">
				<h3>You Have {{ $categories }} Category</h3>
                <a class="btn btn-outline-primary" href="{{ route('categories.index') }}">Manage Categories</a>
			</div>
			<div class="col-sm">
				<h3>You Have {{ $tags }} Tags</h3>
                <a class="btn btn-outline-primary" href="{{ route('tags.index') }}">Manage Tags</a>
			</div>
		</div>
	</div>

@endsection

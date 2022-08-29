@extends('layouts.front')
@include('front.includes._FrontHeader')

@section('content')
	<!-- Main Content-->
	<div class="px-lg-5 container px-4">
		<div class="row gx-4 gx-lg-5 justify-content-center">
			<div class="col-md-10 col-lg-8 col-xl-7">
				<!-- Post preview-->
				@foreach ($articles as $article)
					<div class="post-preview">
						<a href="{{ route('front.show', $article->title) }}">
							<h2 class="post-title">{{ $article->title }}</h2>
							<h3 class="post-subtitle hi">{{ $article->body }}</h3>
						</a>
						<p class="post-meta">
							*
							<a href="#!">{{ $article->category->name }}</a>
							Publish At : {{ $article->article_date }}
						</p>
					</div>
					<div class="container">
						<div class="row">
                            @foreach( $article->tags->pluck('tag')->toArray() as $tag)
							<div class="col-sm">
                                <a href="{{ route('articlesByTags' , $tag) }}"> #{{ $tag }}</a>
                            </div>
                            @endforeach
						</div>
					</div>
					<!-- Divider-->
					<hr class="my-4" />
				@endforeach

				{{ $articles->links() }}
				<!-- Pager-->
				<div class="d-flex justify-content-end mb-4"></div>
			</div>
		</div>
	</div>
@endsection

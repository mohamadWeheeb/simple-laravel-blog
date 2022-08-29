@extends('layouts.front')

@section('content')

{{-- @include('front.includes._ArticlesHeader') --}}
<!-- Post Content-->
  <article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ $tag->tag }}<p>
                    {{-- <a href="#!"><img class="img-fluid" src="{{ $article->image_url }}" alt="{{ $article->title }}" /></a> --}}
                    Category :
                    {{-- <a href="http://spaceipsum.com/">@ {{ $tag->articles->title }} --}}
                    </a>
                </p>
                <div class="container">

                    <div class="row">
                        #tags =====>
                        @foreach( $tag->articles as $article)
                        <div class="col-sm">
                            <a href="">#{{ $article->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

@endsection

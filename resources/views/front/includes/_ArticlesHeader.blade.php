<header class="masthead" style="background-image: url({{ $article->image_url }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $article->title }}</h1>
                    <span class="meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on {{$article->article_date}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

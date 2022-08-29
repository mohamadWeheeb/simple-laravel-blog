<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::with(['tags' , 'category'])->latest()->paginate(4);
        return view('front.home', [
            'articles'  =>  $articles ,
        ]);
    }

    public function show($title)
    {
        $article = Article::where('title' , '=' , $title)->with(['tags' , 'category'])->firstOrfail();
        return view('front.show' , [
            'article'   =>  $article ,
        ]);
    }

    public function articlesByTags($tag)
    {

        $tag = Tag::where('tag' , $tag)->with('articles')->first();
        return view('front.showArticlesByTag' , [
            'tag'   =>  $tag ,
        ]);
    }
}

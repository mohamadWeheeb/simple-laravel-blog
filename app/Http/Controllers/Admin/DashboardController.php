<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class DashboardController extends Controller
{

    public function index()
    {
        $articles = Article::count();
        $categories = Category::count();
        $tags = Tag::count();
        return view('admin.dashboard' , [
            'articles' => $articles ,
            'categories'=> $categories ,
            'tags'  =>  $tags ,
        ]);
    }
}

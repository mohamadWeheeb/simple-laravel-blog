<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Str;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Search
        $request = request();
        // $query = Article::query();
        // if($title = $request->query('title'))
        // {
        //     $query->where('title' , 'LIKE' , "%{$title}%");
        // }
        // if($category = $request->query('category'))
        // {
        //     $query->where('category_id' , '=' , $category);
        // }
        // $articles = $query->latest()->paginate(10);

        $articles = Article::when($request->title , function($query , $value){
            $query->where('title' , 'LIKE' , "%{$value}%");
        })
        ->when($request->category , function($query , $value){
            $query->where('category_id' , '=' , $value);
        })->paginate();
        $categories = Category::latest()->get();
        return view('admin.articles.index' , [
            'articles'    =>  $articles ,
            'categories'    =>  $categories ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.articles.create' , [
            'categories'    =>  $categories ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug'  =>  Str::slug($request->title) ,
        ]);
        $data = $request->except('tags');
        $tags = explode(',' , $request->tags);
        $request->validate(Article::rules());


        try{
            DB::beginTransaction();
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $data['image'] = 'ArticleImage_' . rand(100 , 1000000) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('articles' , $data['image'] , 'public');
            }
            $article = Article::create($data);
            if($tags)
            {
                $savedTags = Tag::all();
                $tagIds=[];
                foreach($tags as $t_name)
                {
                    $slug = Str::slug($t_name);
                    $tag = $savedTags->where('slug' , $slug)->first();
                    if(!$tag){
                        $tag = Tag::create([
                            'tag'   =>  $t_name ,
                            'slug'  =>  $slug ,
                        ]);
                    }
                    $tagIds[]= $tag->id;
                }
                $article->tags()->sync($tagIds);
            }
            DB::commit();
            return redirect()->route('articles.index')->with("success" , "Article {$article->title} Created !");
        } catch(Throwable $e)
        {

            DB::rollBack();
            return $e->getMessage();
            return redirect()->route('articles.create')->with('errorMessage' , "Error ! " .$e->getMessage() );
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article =  Article::with(['tags' , 'category'])->findOrfail($id);
        $tags = $article->tags;
        $articleTags = '';
        foreach($tags as $tag)
        {
            $articleTags .= $tag->tag;
        }

        return view('admin.articles.show' , [
            'article'   => $article ,
            'articleTags'=> $articleTags ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::with('tags')->findOrfail($id);
        $categories = Category::all();
        $tags = $article->tags()->pluck('tag')->toArray();
        $tags = implode(',' , $tags);
        return view('admin.articles.edit' , [
            'article'   =>  $article ,
            'categories'    =>  $categories ,
            'tags'=>   $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->merge([
        'slug'  =>  Str::slug($request->title) ,
        ]);
        $article = Article::findOrfail($id);
        $request->validate(Article::rules());
        $newTags = explode(',' , $request->tags);
        // remove spaces on the end if found
        if($newTags[count($newTags) -1 ] == '')
        {
            unset($newTags[count($newTags) -1 ]);
        }
        $data= $request->all();
        $oldImage = $article->image;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $data['image'] = 'ArticleImage_' . rand(100 , 1000000) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('articles' , $data['image'] , 'public');
            if(Storage::disk('public')->exists("articles/".$oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        if($newTags)
        {
            $savedTags = Tag::all();
            $tagIds =[];
            foreach($newTags as $tagName)
            {
                $slug =Str::slug($tagName);
                $tag = $savedTags->where('slug' , $slug)->first();
                if(!$tag){
                    $tag = Tag::create([
                        'tag'   => $tagName ,
                        'slug'  =>  Str::slug($tagName) ,
                    ]);
                }
                $tagIds[] = $tag->id;
            }
            $article->tags()->sync($tagIds);
        }
        $article->update($data);
        return redirect()->route('articles.index')->with("success" , "Article {$article->title} Created !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrfail($id);

        $article->delete();

        if($article->imgae)
        {
            Storage::disk('public')->delete($article->image);
        }
        return redirect()->route('articles.index')->with("success" , "Article {$article->title} Deleted !");
    }
}

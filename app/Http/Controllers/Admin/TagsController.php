<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::with('articles')->withCount('articles')->get();
        // // return $sumArticles = $tags->articles()->sum();
        // dd($tags->articles);
        return view('admin.tags.index' , [
            'tags'    =>  $tags ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Tag::rules());
        $request->merge([
            'slug'  =>  Str::slug($request->tag),
        ]);
        $tag = Tag::create($request->all());
        return redirect()->route('tags.index')->with("success" , "tag {$tag->tag} Created !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::with('articles')->findOrfail($id);
        return view('admin.tags.show' , [
            'tag'    =>  $tag ,
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
        $tag = Tag::with('articles')->findOrfail($id);
        return view('admin.tags.edit' , [
            'tag'    =>  $tag ,
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
        $tag = Tag::findOrfail($id);

        $request->validate(Tag::rules($tag->id));

        $tag->update($request->all());
        return redirect()->route('tags.index')->with("success" , "tag {$tag->name} Updated !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrfail($id);
        $tag->delete();
        return redirect()->route('tags.index')->with("success" , "tag {$tag->name} Deleted !");

    }
}

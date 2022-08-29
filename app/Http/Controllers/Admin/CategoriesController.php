<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $query = Category::query();
        if($request->name)
        {
            $query->where('name' , "LIKE" , "%{$request->name}%");
        }
        $categories = $query->select('categories.*')
            // ->selectRaw('(SELECT COUNT(*) FROM articles WHERE category_id = categories.id) as articles_count')
            ->withCount('articles')
            ->latest()
            ->paginate(5);
        // $categories = Category::latest()->get();

        return view('admin.categories.index' , [
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
        return view('admin.categories.create');
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
            'slug'  => Str::slug($request->name) ,
        ]);
        $request->validate(Category::rules());
        $category = Category::create($request->all());
        return redirect()->route('categories.index')->with("success" , "Category {$category->name} Created !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('articles')->findOrfail($id);
        return view('admin.categories.show' , [
            'category'    =>  $category ,
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
        $category = Category::findOrfail($id);
        return view('admin.categories.edit' , [
            'category'    =>  $category ,
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
        $category = Category::findOrfail($id);

        $request->validate(Category::rules($category->id));
        $request->merge([
            'slug'  => Str::slug($request->name) ,
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with("success" , "Category {$category->name} Updated !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);


        return redirect()->route('categories.index')->with("success" , "Category {$category->name} Deleted !");
    }
}

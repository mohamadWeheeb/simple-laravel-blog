<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'body' , 'category_id' ,'image' , 'slug'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class , 'article_tag' , 'article_id' , 'tag_id');
    }

    public static function rules()
    {
        return [
            "title" =>  'required|string|max:255' ,
            'body'  =>  'required|string' ,
            'image' =>  'nullable|image' ,
            'category_id'   =>  'required|exists:categories,id' ,
            'tags'      =>  "nullable|string" ,
        ];
    }



    public function getImageUrlAttribute()
    {
        if($this->image)
        {
            return asset('storage/articles/' . $this->image);
        }
        return asset('storage/articles/defualt.jpg');
    }


    public function getArticleDateAttribute()
    {
        // return "hii";
        return $this->created_at->toFormattedDateString();
        //return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at->toDateTimeString())->format('d/m/y H:i a'); ;
    }
}

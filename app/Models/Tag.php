<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    protected $fillable = ['tag' , 'slug'];

    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany(Article::class , 'article_tag' , 'tag_id' , 'article_id');
    }

    public static function rules($id = null)
    {
        return [
            'tag'   =>  'required|string|max:200|unique:tags,tag,' . $id
        ];
    }


}

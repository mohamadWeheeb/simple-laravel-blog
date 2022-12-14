<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name' , 'slug'];


    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public static function rules($id = null)
    {
        return [
            "name" =>  'required|string|max:255|unique:categories,name,' . $id ,
        ];
    }
}

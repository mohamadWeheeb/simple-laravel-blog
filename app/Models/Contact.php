<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'email' , 'phone' , 'message' ,
    ];


    public static function rules()
    {
        return [
            'name'  =>  'required|string|max:255' ,
            'email' =>  'required|email' ,
            'phone' =>  'nullable|string' ,
            'message'   =>  'required|string' ,
        ];
    }
}

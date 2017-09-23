<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = ["title", "body", "approved"];


    public static function approved()
    {
        return Post::where('approved', 1)->paginate(5);
    }
}

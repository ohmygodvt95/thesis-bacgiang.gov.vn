<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}

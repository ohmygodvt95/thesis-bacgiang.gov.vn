<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function scopeGetCategory($query){
        return Category::find($this->category_id);
    }
}

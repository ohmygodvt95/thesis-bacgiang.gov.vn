<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    function category()
    {
        return $this->belongsTo(Category::class);
    }
}

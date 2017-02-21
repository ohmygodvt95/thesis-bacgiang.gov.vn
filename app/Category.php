<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id', 'id');
    }

    function posts()
    {
        return $this->hasMany(Post::class,'category_id', 'id');
    }

    function files()
    {
        return $this->hasMany(File::class,'category_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id', 'id');
    }
}

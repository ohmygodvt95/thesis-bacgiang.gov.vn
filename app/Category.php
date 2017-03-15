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

    function videos()
    {
        return $this->hasMany(Video::class,'category_id', 'id');
    }

    function files()
    {
        return $this->hasMany(File::class,'category_id', 'id');
    }

    function scopeGetSubCategories($query){
        return Category::where('parent_id', $this->id)->get();
    }

    function scopeGetFatherCategory($query){
        return Category::find($this->parent_id);
    }

    function scopeGetFiles($query, $limit = 5, $offset = 0){
        if($this->type == 'file'){
            return self::files()->orderBy('id', 'desc')
                ->offset($offset)->limit($limit)->get(
                    [
                        'id',
                        'title',
                        'slug',
                        'created_at',
                        'description'
                    ]);
        }
        else if($this->type == 'null' && count(self::subCategories()) > 0){
            $list = self::subCategories()->get(['id'])->toArray();
            return File::whereIn('category_id', $list)->orderBy('id', 'DESC')
                ->offset($offset)->limit($limit)->get(
                    [
                        'id',
                        'title',
                        'slug',
                        'created_at',
                        'description'
                    ]
                );
        }
        else{
            return null;
        }
    }

    function scopeGetPosts($query, $limit = 5, $offset = 0){
        if($this->type == 'text'){
            return self::posts()->orderBy('id', 'desc')
                ->offset($offset)->limit($limit)->get(
                [
                    'id',
                    'title',
                    'slug',
                    'created_at',
                    'description',
                    'thumb'
                ]);
        }
        else if($this->type == 'null' && count(self::subCategories()) > 0){
            $list = self::subCategories()->get(['id'])->toArray();
            return Post::whereIn('category_id', $list)->orderBy('id', 'DESC')
                ->offset($offset)->limit($limit)->get();
        }
        else{
            return null;
        }
    }

    function scopeGetVideos($query, $limit = 5, $offset = 0){
        if($this->type == 'text'){
            return self::videos()->orderBy('id', 'desc')
                ->offset($offset)->limit($limit)->get();
        }
        else if($this->type == 'null' && count(self::subCategories()) > 0){
            $list = self::subCategories()->get(['id'])->toArray();
            return Video::whereIn('category_id', $list)->orderBy('id', 'DESC')
                ->offset($offset)->limit($limit)->get();
        }
        else{
            return null;
        }
    }
}

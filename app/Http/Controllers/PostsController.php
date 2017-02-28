<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $perPage = 10;

    public function show($id)
    {
        $post = Post::find($id);
        if(empty($post)){
            return redirect('/');
        }
        else{
            $post->views++;
            $post->save();
            return view('posts.show', [
                'pageTitle' => $post->title,
                'post' => $post,
                'relatedPosts' => $post->getCategory()->getPosts($this->perPage)
            ]);
        }
    }
}

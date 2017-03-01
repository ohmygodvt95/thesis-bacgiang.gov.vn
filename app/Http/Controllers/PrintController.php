<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        if(empty($post)){
            return redirect('/');
        }
        else{
            return view('print.show', [
                'pageTitle' => $post->title,
                'post' => $post
            ]);
        }
    }
}

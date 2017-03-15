<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class RssController extends Controller
{
    public function index()
    {
        $categories = Category::where('type', 'text')->where('parent_id', '!=', 55)->get();
        return view('rss.index', [
            'pageTitle' => 'RSS',
            'categories' =>$categories
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return response()
            ->view('rss.show', ['category' => $category], 200)
            ->header('Content-Type', 'text/xml');
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return view('sitemap.index',[
            'pageTitle' => 'Sitemap',
            'categories' => Category::where('parent_id', 0)->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    private $menu = null;
    private $perPage = 12;

    public function __construct()
    {
        $this->menu = Category::where('parent_id', 55)->get();
    }

    public function index()
    {

        return view('videos.index', [
            'pageTitle' => 'Videos',
            'menu' => $this->menu,
            'bgNew' => Category::find(55),
            'bgNews' => Category::find(56),
            'bgFilms' => Category::find(58),
            'bgKySu' => Category::find(57)
        ]);
    }

    public function show(Video $video)
    {
        return view('videos.show', [
            'pageTitle' => "Video: $video->title",
            'video' => $video,
            'menu' => $this->menu
        ]);
    }

    public function categories(Request $request)
    {
        $category = Category::find($request->id);
        $videos = $category->videos()->orderBy('id', 'DESC')->paginate($this->perPage);
        return view('videos.categories', [
            'pageTitle' => 'List video: '.$category->title,
            'menu' => $this->menu,
            'videos' => $videos,
            'category' => $category
        ]);
    }
}

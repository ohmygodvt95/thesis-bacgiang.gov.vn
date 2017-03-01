<?php

namespace App\Http\Controllers;

use App\File;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $perPage = 15;

    public function index(Request $request)
    {
        $posts = null;
        $files = null;
        if($request->input('query')){
            $posts = Post::where('title', 'like', "%".$request->input('query')."%")
                ->orWhere('slug', 'like', "%".$request->input('query')."%")
                ->orWhere('description', 'like', "%".$request->input('query')."%")
                ->orWhere('body', 'like', "%".$request->input('query')."%")
                ->orWhere('created_at', 'like', "%".$request->input('query')."%")
                ->orderBy('id', 'DESC')->limit(15)->get();
            $files = File::where('title', 'like', "%".$request->input('query')."%")
                ->orWhere('slug', 'like', "%".$request->input('query')."%")
                ->orWhere('description', 'like', "%".$request->input('query')."%")
                ->orWhere('code', 'like', "%".$request->input('query')."%")
                ->orWhere('organization', 'like', "%".$request->input('query')."%")
                ->orWhere('type_document', 'like', "%".$request->input('query')."%")
                ->orWhere('attach', 'like', "%".$request->input('query')."%")
                ->orWhere('publish_date', 'like', "%".$request->input('query')."%")
                ->orderBy('id', 'DESC')->limit(15)->get();
        }
        return view('search.index',[
            'pageTitle' => 'Tìm kiếm',
            'posts' => $posts,
            'files' => $files
        ]);
    }
}

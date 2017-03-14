<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class ServiceDocumentController extends Controller
{
    private $perPage = 15;
    public function index(Request $request)
    {

        $docs = null;
        $category = Category::find(53);
        if($request->input('query')){
            $docs = Post::whereIn('category_id', $category->subCategories()->get(['id']))
                ->where('title', 'like', "%".$request->input('query')."%")
                ->orWhere('slug', 'like', "%".$request->input('query')."%")
                ->orWhere('description', 'like', "%".$request->input('query')."%")
                ->orWhere('body', 'like', "%".$request->input('query')."%")
                ->orWhere('created_at', 'like', "%".$request->input('query')."%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage);
            $docs->withPath('/service/document?query='.$request->input('query'));
        }
        else{
            $docs = Post::whereIn('category_id', $category->subCategories()->get(['id']))
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage);
        }
        return view('service.document.index', [
            'pageTitle' => 'Tra cứu TTHC',
            'docs' => $docs
        ]);
    }
}

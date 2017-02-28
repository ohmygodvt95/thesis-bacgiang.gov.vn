<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $perPage = 10;

    public function show($id, Request $request)
    {
        $category = Category::find($id);
        if(empty($category)){
            return redirect('/');
        }
        else{
            if($category->type == 'null'){
                return view('categories.show.category',[
                    'pageTitle' => $category->title,
                    'category' => $category
                ]);
            }
            else if($category->type == 'text'){
                $posts = $category->posts()->orderBy('id', 'DESC')->paginate($this->perPage);
                return view('categories.show.text',[
                    'pageTitle' => $category->title,
                    'category' => $category,
                    'posts' => $posts,
                ]);
            }
            else if($category->type == 'file'){
                $files = null;
                if($request->input('query')){
                    $files = $category->files()
                        ->where('title', 'like', "%".$request->input('query')."%")
                        ->orWhere('description', 'like', "%".$request->input('query')."%")
                        ->orWhere('publish_date', 'like', "%".$request->input('query')."%")
                        ->orWhere('code', 'like', "%".$request->input('query')."%")
                        ->orWhere('organization', 'like', "%".$request->input('query')."%")
                        ->orWhere('title', 'like', "%".$request->input('query')."%")
                        ->orderBy('id', 'DESC')->paginate($this->perPage);
                    $files->withPath("/categories/".$category->id."?query=".$request->input('query'));
                }
                else
                    $files = $category->files()->orderBy('id', 'DESC')->paginate($this->perPage);
                return view('categories.show.file',[
                    'pageTitle' => $category->title,
                    'category' => $category,
                    'files' => $files,
                ]);
            }
            else{
                return redirect('/');
            }
        }
    }
}

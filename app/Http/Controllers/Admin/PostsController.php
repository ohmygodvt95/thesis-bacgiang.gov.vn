<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Slugify;
class PostsController extends Controller
{
    private $perPage = 10;

    public function index(Request $request)
    {
        $posts = null;
        if($request->input('query')){
            $posts = Post::where('title', 'like', "%".$request->input('query')."%")
                ->orWhere('slug', 'like', "%".$request->input('query')."%")
                ->orWhere('description', 'like', "%".$request->input('query')."%")
                ->orWhere('body', 'like', "%".$request->input('query')."%")
                ->orWhere('created_at', 'like', "%".$request->input('query')."%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage);
            $posts->withPath('/admin/posts?query='.$request->input('query'));
        }
        else{
            $posts = Post::orderBy('id', 'DESC')
                ->paginate($this->perPage);
        }
        return view('admin.posts.index',[
            'pageTitle' => 'Management Posts',
            'posts' => $posts
        ]);
    }

    public function show($id)
    {

    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.posts.create',[
            'pageTitle' => 'Create Post',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'body' => 'required|min:100',
            'thumb' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/posts/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $post = new Post();
            $post->title = $request->title;
            $post->slug = Slugify::slugify($request->title);
            $post->category_id = $request->category_id;
            $post->thumb = $request->thumb;
            $post->description = $request->description;
            $post->body = $request->body;
            $post->user_id = Auth::user()->id;
            $post->save();
            return redirect('/admin/posts')->with([
                'type' => 'success',
                'message' => "Post '$post->title' has been created"
            ]);
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if($post){
            return view('admin.posts.edit',[
                'pageTitle' => "Edit: ".str_limit($post->title, 40),
                'post' => $post,
                'categories' => Category::where('parent_id', 0)->get()
            ]);
        }else{
            return redirect('/admin/posts')
                ->with([
                    'type' => 'danger',
                    'message' => 'Post not found!'
                ]);
        }
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect('/admin/posts')
                ->with([
                    'type' => 'danger',
                    'message' => 'Post not found!'
                ]);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'body' => 'required|min:100',
            'thumb' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin/posts/$id/edit")
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $post->title = $request->title;
            $post->slug = Slugify::slugify($request->title);
            $post->category_id = $request->category_id;
            $post->thumb = $request->thumb;
            $post->description = $request->description;
            $post->body = $request->body;
            $post->save();
            return redirect()->action(
                'Admin\PostsController@edit', ['id' => $post->id]
            )->with([
                'type' => 'success',
                'message' => 'Post update successful'
            ]);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post){
            $title = $post->title;
            $post->delete();
            return redirect('/admin/posts')
                ->with([
                    'type' => 'success',
                    'message' => "Post '$title' was deleted"
                ]);
        }else{
            return redirect('/admin/posts')
                ->with([
                    'type' => 'danger',
                    'message' => 'Post not found!'
                ]);
        }
    }
}

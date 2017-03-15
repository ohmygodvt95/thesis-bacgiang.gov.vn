<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class VideosController extends Controller
{
    private $categories = null;
    private $perPage = 15;

    public function __construct()
    {
        $this->categories = Category::where('id', 55)->get();
    }

    public function index()
    {
        $videos = Video::orderBy('id', 'DESC')
            ->paginate($this->perPage);
        return view('admin.videos.index', [
            'pageTitle' => 'Video management',
            'videos' => $videos
        ]);
    }

    public function create()
    {
        return view('admin.videos.create', [
            'pageTitle' => 'Create video',
            'categories' => $this->categories
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'source' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/videos/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $file = new Video();
            $file->title = $request->title;
            $file->category_id = $request->category_id;
            $file->source = $request->source;
            $file->thumb = $request->thumb;
            $file->save();
            return redirect('/admin/videos')->with([
                'type' => 'success',
                'message' => "Video '$file->title' has been created"
            ]);
        }
    }

    public function edit(Video $video)
    {


        return view('admin.videos.edit', [
            'pageTitle' => 'Edit video'.$video->title,
            'video' => $video,
            'categories' => $this->categories
        ]);
    }

    public function update(Video $video, Request $request)
    {
        $video->title = $request->title;
        $video->category_id = $request->category_id;
        $video->source = $request->source;
        $video->thumb = $request->thumb;
        $video->update();

        return redirect('/admin/videos/'.$video->id.'/edit')->with([
            'type' => 'success',
            'message' => "Video '$video->title' has been edited"
        ]);
    }

    public function destroy(Video $video)
    {
        $title = $video->title;
        $video->delete();
        return redirect('/admin/videos')->with([
            'type' => 'danger',
            'message' => "Video '$title' has been deleted"
        ]);
    }
}

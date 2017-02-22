<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Validator;
use Slugify;
class FilesController extends Controller
{
    private $perPage = 15;

    public function index(Request $request)
    {
        $files = null;
        if($request->input('query')){
            $files = File::where('title', 'like', "%".$request->input('query')."%")
                ->orWhere('title', 'like', "%".$request->input('query')."%")
                ->orWhere('slug', 'like', "%".$request->input('query')."%")
                ->orWhere('description', 'like', "%".$request->input('query')."%")
                ->orWhere('code', 'like', "%".$request->input('query')."%")
                ->orWhere('organization', 'like', "%".$request->input('query')."%")
                ->orWhere('type_document', 'like', "%".$request->input('query')."%")
                ->orWhere('attach', 'like', "%".$request->input('query')."%")
                ->orWhere('publish_date', 'like', "%".$request->input('query')."%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage);
            $files->withPath('/admin/files?query='.$request->input('query'));
        }
        else{
            $files = File::orderBy('id', 'DESC')
                ->paginate($this->perPage);
        }
        return view('admin.files.index',[
            'pageTitle' => 'Management Files',
            'files' => $files
        ]);
    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('admin.files.create',[
            'pageTitle' => 'Create file',
            'categories' => Category::where('parent_id', 0)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'attach' => 'required',
            'type' => [
                'required',
                Rule::in(['document', 'file']),
            ],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/files/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $file = new File();
            $file->title = $request->title;
            $file->slug = Slugify::slugify($request->title);
            $file->category_id = $request->category_id;
            $file->attach = $request->attach;
            $file->description = $request->description;
            $file->user_id = Auth::user()->id;
            if($request->type == 'document'){
                $file->publish_date = $request->publish_date;
                $file->code = $request->code;
                $file->type_document = $request->type_document;
                $file->organization = $request->organization;
            }
            $file->save();
            return redirect('/admin/files')->with([
                'type' => 'success',
                'message' => "File '$file->title' has been uploaded"
            ]);
        }
    }

    public function edit($id)
    {
        $file = File::find($id);
        if($file){
            return view('admin.files.edit',[
                'pageTitle' => "Edit file: ".str_limit($file->title, 40),
                'file' => $file,
                'categories' => Category::where('parent_id', 0)->get()
            ]);
        }else{
            return redirect('/admin/files')
                ->with([
                    'type' => 'danger',
                    'message' => 'Post not found!'
                ]);
        }
    }

    public function update($id, Request $request)
    {
        $file = File::find($id);
        if($file == null){
            return redirect('/admin/files')
                ->with([
                    'type' => 'danger',
                    'message' => 'File not found!'
                ]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'attach' => 'required',
            'type' => [
                'required',
                Rule::in(['document', 'file']),
            ],
        ]);

        if ($validator->fails()) {
            return redirect("/admin/files/$id/edit")
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $file->title = $request->title;
            $file->slug = Slugify::slugify($request->title);
            $file->category_id = $request->category_id;
            $file->attach = $request->attach;
            $file->description = $request->description;
            if($request->type == 'document'){
                $file->publish_date = $request->publish_date;
                $file->code = $request->code;
                $file->type_document = $request->type_document;
                $file->organization = $request->organization;
            }
            $file->save();
            return redirect()->action(
                'Admin\FilesController@edit', ['id' => $file->id]
            )->with([
                'type' => 'success',
                'message' => "File '$file->title' has been updated"
            ]);
        }
    }

    public function destroy($id)
    {
        $file = File::find($id);
        if($file){
            $title = $file->title;
            $file->delete();
            return redirect('/admin/files')
                ->with([
                    'type' => 'success',
                    'message' => "File '$title' was deleted"
                ]);
        }else{
            return redirect('/admin/files')
                ->with([
                    'type' => 'danger',
                    'message' => 'File not found!'
                ]);
        }
    }
}

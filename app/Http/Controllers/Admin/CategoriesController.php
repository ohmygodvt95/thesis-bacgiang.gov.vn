<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;
use Slugify;
class CategoriesController extends Controller
{
    private $categories;

    public function __construct()
    {
        $this->categories = Category::where('parent_id', 0)->get();
    }

    public function index(Request $request)
    {
        return view('admin.categories.index',[
            'pageTitle' => 'Management Categories',
            'categories' => $this->categories
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if($category){
            return view('admin.categories.show',[
                'pageTitle' => "Detail: $category->title",
                'category' => $category,
                'categories' => $this->categories
            ]);
        }else{
            return redirect('/admin/categories')
                ->with([
                    'type' => 'danger',
                    'message' => 'Category not found!'
                ]);
        }
    }

    public function create()
    {
        return view('admin.categories.create',[
            'pageTitle' => 'Create category',
            'categories' => $this->categories
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'parent_id' => 'required',
            'type' => [
                'required',
                Rule::in(['null', 'text', 'file', 'link']),
            ],
            'show_on_navigation' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/categories/create')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $category = new Category();
            $category->title = $request->title;
            $category->slug = Slugify::slugify($request->title);
            $category->parent_id = $request->parent_id;
            $category->type = $request->type;
            $category->show_on_navigation = $request->show_on_navigation;
            $category->save();
            return redirect('/admin/categories')->with([
                'type' => 'success',
                'message' => "Category '$category->title' has been created"
            ]);
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if($category){
            return view('admin.categories.edit',[
                'pageTitle' => "Edit: $category->title",
                'category' => $category,
                'categories' => $this->categories
            ]);
        }else{
            return redirect('/admin/categories')
                ->with([
                    'type' => 'danger',
                    'message' => 'Category not found!'
                ]);
        }
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);
        if($category == null){
            return redirect('/admin/categories')
                ->with([
                    'type' => 'danger',
                    'message' => 'Category not found!'
                ]);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'parent_id' => 'required',
            'type' => [
                'required',
                Rule::in(['null', 'text', 'file', 'link']),
            ],
            'show_on_navigation' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect("/admin/categories/$id/edit")
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $category->title = $request->title;
            $category->slug = Slugify::slugify($request->title);
            $category->parent_id = $request->parent_id;
            $category->type = $request->type;
            $category->show_on_navigation = $request->show_on_navigation;
            $category->save();
            return redirect()->action(
                'Admin\CategoriesController@show', ['id' => $category->id]
            )->with([
                'type' => 'success',
                'message' => 'Category update successful'
            ]);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){
            $title = $category->title;
            foreach ($category->subCategories as $c){
                $c->delete();
            }
            $category->delete();
            return redirect('/admin/categories')
                ->with([
                    'type' => 'success',
                    'message' => "Category '$title' was deleted"
                ]);
        }else{
            return redirect('/admin/categories')
                ->with([
                    'type' => 'danger',
                    'message' => 'Category not found!'
                ]);
        }
    }
}

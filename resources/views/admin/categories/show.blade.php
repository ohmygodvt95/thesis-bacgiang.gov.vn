@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail: {{ $category->title }}</div>
                    <div class="panel-body">
                        <form action="/admin/categories" method="POST"
                              class="col-sm-6 col-sm-offset-3">
                            {{ csrf_field() }}
                            <h3>Tiêu đề</h3>
                            <input type="text" value="{{ $category->title }}" class="form-control">
                            <h3>Chuyên mục cha</h3>
                            <select name="parent_id" class="form-control"
                                    title="Parent"
                                    required >
                                <option value="0" {{ $category->parent_id == 0 ? 'selected':'' }}>Main category</option>
                                @foreach($categories as $c)
                                    @if($c->type != 'link' && $category->id != $c->id)
                                        <option value="{{ $c->id }}" {{ ($category->parent_id == $c->id) ? 'selected' : 0}}>
                                            {{ $c->title }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <h3>Category chứa gì?</h3>
                            <select name="type" class="form-control"
                                    title="Type category" required>
                                <option value="null" {{ $category->type == 'null' ? 'selected':'' }}>Không chứa gì</option>
                                <option value="text" {{ $category->type == 'text' ? 'selected':'' }}>Chứa bài viết</option>
                                <option value="file" {{ $category->type == 'file' ? 'selected':'' }}>Chứa file</option>
                                <option value="link" {{ $category->type == 'link' ? 'selected':'' }}>Direct link</option>
                            </select>
                            <h3>Xuất hiện trên thanh navigation?</h3>
                            <select name="show_on_navigation" class="form-control"
                                    title="Show on navigation" required>
                                <option value="1" {{ $category->show_on_navigation == 1 ? 'selected':'' }}>Hiện</option>
                                <option value="0" {{ $category->show_on_navigation == 0 ? 'selected':'' }}>Ẩn</option>
                            </select>
                            <hr>
                            <a href="/admin/categories">Quay lại</a>
                            <a href="/admin/categories/{{ $category->id }}/edit" class="pull-right">Chỉnh sửa</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new category <a href="/admin/categories">Quay lại</a></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/admin/categories" method="POST"
                            class="col-sm-6 col-sm-offset-3">
                            {{ csrf_field() }}
                            <h3>Tiêu đề</h3>
                            <input type="text" name="title" required
                                class="form-control" title="Title"
                                value="{{ old('title') }}">
                            <h3>Chuyên mục cha</h3>
                            <select name="parent_id" class="form-control"
                                title="Parent"
                                required >
                                <option value="0">Main category</option>
                                @foreach($categories as $category)
                                    @if($category->type != 'link')
                                        <option value="{{ $category->id }}"
                                            {{ old('parent_id') == $category->id ? 'selected':'' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <h3>Category chứa gì?</h3>
                            <select name="type" class="form-control"
                                title="Type category" required>
                                <option value="null" {{ old('type') == 'null' ? 'selected':'' }}>Không chứa gì</option>
                                <option value="text" {{ old('type') == 'text' ? 'selected':'' }}>Chứa bài viết</option>
                                <option value="file" {{ old('type') == 'file' ? 'selected':'' }}>Chứa file</option>
                                <option value="link" {{ old('type') == 'link' ? 'selected':'' }}>Direct link</option>
                            </select>
                            <h3>Xuất hiện trên thanh navigation?</h3>
                            <select name="show_on_navigation" class="form-control"
                                title="Show on navigation" required>
                                <option value="1" {{ old('show_on_navigation') == 1 ? 'selected':'' }}>Hiện</option>
                                <option value="0" {{ old('show_on_navigation') == 0 ? 'selected':'' }}>Ẩn</option>
                            </select>
                            <hr>
                            <button type="reset" class="btn btn-danger col-sm-5">Làm lại</button>
                            <button type="submit" class="btn btn-success col-sm-offset-2 col-sm-5">Tạo mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

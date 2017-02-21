@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <form action="/admin/posts" class="col-sm-6 col-sm-offset-3">
                    <div class="input-group">
                        <input type="text" class="form-control"
                               placeholder="Search for..." name="query">
                        <span class="input-group-btn">
                            <button class="btn btn-default"
                                    type="submit">Search</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
                <hr>
            </div>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List posts
                        <a href="/admin/posts/create" class="pull-right">
                            <i class="fa fa-plus fa-fw"></i>
                            Thêm mới bài viết
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Publish date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{ empty($index) ? $index = 1 : ++$index }}</th>
                                        <th>
                                            <a href="/posts/{{ $post->id }}"
                                            title="{{ $post->title }}" target="_new">
                                                {{ str_limit($post->title, 70) }}
                                            </a>
                                        </th>
                                        <th>{{ $post->category->title }}</th>
                                        <th>{{ $post->created_at }}</th>
                                        <th>
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                                            <form action="/admin/posts/{{ $post->id }}" method="POST"
                                                style="display: inline-block"
                                                onsubmit="return confirm('Do you really want to delete this post?');">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                    <div class="panel-footer">
                        <a href="/admin/posts/create" class="pull-right">
                            <i class="fa fa-plus fa-fw"></i>
                            Thêm mới bài viết
                        </a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

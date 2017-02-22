@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <form action="/admin/files" class="col-sm-6 col-sm-offset-3">
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
                        List files
                        <a href="/admin/files/create" class="pull-right">
                            <i class="fa fa-plus fa-fw"></i>
                            Thêm mới file
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Attach</th>
                                <th>Publish date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <th>{{ empty($index) ? $index = 1 : ++$index }}</th>
                                    <th>
                                        @if($file->type == 'document')
                                            {{ $file->code }}
                                        @endif
                                        <a href="/files/{{ $file->id }}"
                                            title="{{ $file->title }}" target="_new">
                                            {{ str_limit($file->title, 70) }}
                                        </a>
                                    </th>
                                    <th>
                                        {{ $file->category->title }}
                                    </th>
                                    <th><a href="{{ $file->attach }}">See</a></th>
                                    <th>{{ $file->publish_date }}</th>
                                    <th>
                                        <a href="/admin/files/{{ $file->id }}/edit" class="btn btn-primary">Edit</a>
                                        <form action="/admin/files/{{ $file->id }}" method="POST"
                                            style="display: inline-block"
                                            onsubmit="return confirm('Do you really want to delete this file?');">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $files->links() }}
                    </div>
                    <div class="panel-footer">
                        <a href="/admin/files/create" class="pull-right">
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

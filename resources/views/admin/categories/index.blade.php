@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List categories
                        <a href="/admin/categories/create" class="pull-right">
                            <i class="fa fa-plus fa-fw"></i>
                            Thêm mới chuyên mục
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                        	<thead>
                        		<tr>
                        			<th>ID</th>
                                    <th>Title</th>
                                    <th>Action</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <a href="/admin/categories/{{ $category->id }}">
                                                {{ $category->title }}
                                            </a>
                                            @if($category->show_on_navigation)
                                                <small>show on navigation</small>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                                            <form action="/admin/categories/{{ $category->id }}"
                                                  onsubmit="return confirm('Do you really want to delete category?');"
                                            style="display: inline-block"  method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @if($category->subCategories)
                                        @foreach($category->subCategories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td style="padding-left: 50px">
                                                    <i class="fa fa-long-arrow-right"></i>
                                                    <a href="/admin/categories/{{ $category->id }}">
                                                        {{ $category->title }}
                                                    </a>
                                                    @if($category->show_on_navigation)
                                                        <small>show on navigation</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                                                    <form action="/admin/categories/{{ $category->id }}" method="POST"
                                                          onsubmit="return confirm('Do you really want to delete category?');"
                                                          style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                        	</tbody>
                        </table>
                    </div>
                    <div class="panel-footer">

                        <a href="/admin/categories/create" class="pull-right">
                            <i class="fa fa-plus fa-fw"></i>
                            Thêm mới chuyên mục
                        </a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

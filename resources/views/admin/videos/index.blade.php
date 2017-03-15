@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">List videos <a href="/admin">Quay lại</a></div>
                    <div class="panel-body">
                        <table class="table table-hover">
                        	<thead>
                        		<tr>
                        			<th>Title</th>
                                    <th>Category</th>
                                    <th>Source</th>
                                    <th>Time</th>
                                    <th>Action</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		@foreach($videos as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->getCategory()->title }}</td>
                                        <td><a target="_new" href="{{ url($item->source) }}">Xem</a></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="/admin/videos/{{ $item->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="/admin/videos/{{ $item->id }}" method="POST"
                                                  style="display: inline-block"
                                                  onsubmit="return confirm('Do you really want to delete this video?');">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        	</tbody>
                        </table>
                        <hr>
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

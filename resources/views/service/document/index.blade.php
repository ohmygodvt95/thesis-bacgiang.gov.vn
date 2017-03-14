@extends('service.layout')
@section('css')
    <style>
        .info .panel-body{
            height: 200px;
        }
    </style>
@endsection
@section('service')
    <div class="row info">
        <div class="col-sm-12">
            <div class="well well-sm">
                <form action="{{ url('service') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control"
                            placeholder="Số hiệu, nội dung, ngày ra mắt v.v.."
                            value="{{ Request::input('query') }}" >
                            <span class="input-group-btn">
                                <button class="btn btn-secondary btn-primary"  type="submit">Tìm kiếm</button>
                            </span>
                    </div>
                </form>
            </div>
            <a href="{{ url('/service/document') }}">Bỏ tìm kiếm</a>
            <table class="table table-bordered table-hover">
            	<thead>
            		<tr>
            			<th>Tên văn bản</th>
                        <th>Đơn vị</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($docs as $item)
                        <tr>
                            <td><a target="_new" href="{{ url('/posts/' . $item->id) }}">{{ str_limit($item->title, 80) }}</a></td>
                            <td>{{ $item->getCategory()->title }}</td>
                        </tr>
                    @endforeach
            	</tbody>
            </table>
            {{ $docs->links() }}
        </div>
    </div>
@endsection

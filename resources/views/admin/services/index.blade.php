@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <form action="/admin/services" class="col-sm-6 col-sm-offset-3">
                    <div class="input-group">
                        <select name="query" id="" class="form-control" required>
                            <option value="">-- Chọn --</option>
                            <option value="0">Chưa xử lý</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2">Đã xử lý</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-primary"
                                type="submit">Filter</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
                <hr>
            </div>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List requests
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Attach</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td><a href="{{ url('/admin/services/'.$item->id.'/edit') }}">{{ $item->type }} - {{ str_limit($item->description, 80) }}</a></td>
                                        <td>
                                            @if($item->status == 0)
                                                <span class="text-danger">Chưa xử lý</span>
                                            @elseif($item->status == 1)
                                                <span class="text-primary">Đang xử lý</span>
                                            @else
                                                <span class="text-success">Đã xử lý</span>
                                            @endif
                                        </td>
                                        <td><a target="_new" href="{{ asset('/uploads/'.$item->attach) }}">Đính kèm</a></td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

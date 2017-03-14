@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit status request: {{ $service->code }}  <a href="/admin/services">Quay lại</a></div>
                    <div class="panel-body">
                        <div class="col-sm-8 col-sm-offset-2">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Giá trị</th>
                                    <th>Nội dung</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td>{{ $service->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Số hiệu</td>
                                    <td>{{ $service->code }}</td>
                                </tr>
                                <tr>
                                    <td>Cơ quan nhận</td>
                                    <td>{{ $service->organization }}</td>
                                </tr>
                                <tr>
                                    <td>Lĩnh vực</td>
                                    <td>{{ $service->fields }}</td>
                                </tr>
                                <tr>
                                    <td>Loại giấy tờ</td>
                                    <td>{{ $service->type }}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td>{{ $service->description }}</td>
                                </tr>
                                <tr>
                                    <td>Đính kèm</td>
                                    <td><a target="_new" href="{{ asset('/uploads/'.$service->attach) }}">Đính kèm</a></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td>
                                        <form action="{{ url('/admin/services/'.$service->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PATCH">
                                            <select name="status" class="form-control">
                                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Chưa xử lý</option>
                                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Đang xử lý</option>
                                                <option value="2" {{ $service->status == 2 ? 'selected' : '' }}>Đã xử lý</option>
                                            </select>
                                            <hr>
                                            <button class="btn btn-success btn-block">Submit</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


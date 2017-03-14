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
            <!-- TAB NAVIGATION -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Lịch sử của tôi</a></li>
                <li><a href="#tab2" role="tab" data-toggle="tab">Thêm mới yêu cầu</a></li>
            </ul>
            <!-- TAB CONTENT -->
            <div class="tab-content">
                <div class="active tab-pane fade in" id="tab1">
                    @if (session('message'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif
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
                                    <td>{{ $item->type }} - {{ str_limit($item->description, 80) }}</td>
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
                </div>
                <div class="tab-pane fade" id="tab2">
                    <h2 class="text-center">Form yêu cầu HCC</h2>
                    <hr>
                    <form enctype="multipart/form-data" action="{{ url('/service/me') }}" method="POST" class="col-sm-8 col-sm-offset-2">
                        {{ csrf_field() }}
                        <h4>Đơn vị tiếp nhận</h4>
                        <select name="organization" required id="organization" title="organization" class="form-control">
                            <option data="0" value="">----Chọn----</option>
                            <option data="1" label="Văn phòng UBND tỉnh" value="Văn phòng UBND tỉnh">Văn phòng UBND tỉnh</option>
                            <option data="2" value="Sở ngoại Vụ">Sở ngoại Vụ</option>
                            <option data="3" value="Ban dân Tộc">Ban dân Tộc</option>
                            <option data="4" value="Sở xây dưng">Sở xây dựng</option>
                            <option data="5" value="Cục thuế">Cục thuế</option>
                            <option data="6" value="UBND Tỉnh">UBND Tỉnh</option>
                            <option data="7" value="UBND huyện Yên Thế">UBND huyện Yên Thế</option>
                            <option data="8" value="UBND huyện Hiệp Hòa">UBND huyện Hiệp Hòa</option>
                            <option data="9" value="UBND huyện Lạng Giang">UBND huyện Lạng Giang</option>
                            <option data="10" value="UBND huyện Lục Ngạn">UBND huyện Lục Ngạn</option>
                        </select>
                        <h4>Lĩnh vực</h4>
                        <select name="fields" id="fields" class="form-control" required>
                            <option value="">-- Chọn --</option>
                            <option value="Hành chính tư pháp">Hành chính tư pháp</option>
                            <option value="Thủy lợi">Thủy lợi</option>
                            <option value="Nông nghiệp">Nông nghiệp</option>
                            <option value="Nông thôn mới">Nông thôn mới</option>
                        </select>
                        <h4>Thủ tục</h4>
                        <select name="type" id="type" class="form-control" required>
                            <option value="Cấp giấy phép">Cấp giấy phép</option>
                            <option value="Gia hạn giấy phép">Gia hạn giấy phép</option>
                            <option value="Điều chỉnh giấy phép">Điều chỉnh giấy phép</option>
                            <option value="Hủy bỏ giấy phép">Hủy bỏ giấy phép</option>
                        </select>
                        <h4>Mô tả</h4>
                        <textarea required class="form-control" name="description" id="description" cols="30" rows="10" title="description"></textarea>
                        <h4>Đính kèm</h4>
                        <input required type="file" name="attach">
                        <hr>
                        <button type="submit" class="btn btn-block btn-primary">Hoàn tất</button>
                        <hr>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('service.layout')
@section('css')
    <style>
        .info .panel-body{
            height: 200px;
        }
        .box{
            text-align: center;
            height: 100px;
            line-height: 100px;
            font-size: 50px;
            font-weight: 500;
        }
    </style>
@endsection
@section('service')
    <div class="row info">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">TRA CỨU TÌNH TRẠNG HỒ SƠ</h3>
                </div>
                <div class="panel-body">
                    Để thực hiện tra cứu tình trạng hồ sơ cấp phép,
                    xin vui lòng nhập mã số tra cứu trên giấy biên nhận.
                    <hr>
                    <div class="input-group">
                        <input type="text" name="query" class="form-control code"
                            placeholder="Mã số">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary btn-primary find" type="submit"
                                data-toggle="modal" data-target="#myModal">Tra cứu</button>
                        </span>
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tình trạng hồ sơ</h4>
                                </div>
                                <div class="modal-body">
                                    Loading...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
            	  <div class="panel-heading">
            			<h3 class="panel-title">HỒ SƠ ĐÃ CÓ KẾT QUẢ TRONG NGÀY</h3>
            	  </div>
            	  <div class="panel-body">
            			<table class="table table-striped table-hover">
            				<tbody>

                            @foreach($today as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->type }} - {{ str_limit($item->description, 80) }}</td>
                                </tr>
                            @endforeach

                            </tbody>
            			</table>
            	  </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel panel-success">
                  <div class="panel-heading">
                        <h3 class="panel-title text-center">Tình hình giải quyết</h3>
                  </div>
                  <div class="panel-body">

                        <div class="col-sm-6">
                            <h3 class="text-center">Đã tiếp nhận</h3>
                            <div class="col-sm-12 box">
                                {{ $receive }}
                            </div>
                        </div>
                      <div class="col-sm-6">
                          <h3 class="text-center">Đã xử lý</h3>
                          <div class="col-sm-12 box">
                              {{ $success }}
                          </div>
                          <h5 class="text-center">Tỉ lệ {{ round($success / $receive) * 100 }} %</h5>
                      </div>

                  </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.find').click(function () {
            var code = $('.code').val();
            $('.modal-body').html('Search: ' + code + ' -> Loading...');
            $.post('/service/check', {code: code}, function (data) {
                $('.modal-body').html(data);
            });
        });
    </script>
@endsection

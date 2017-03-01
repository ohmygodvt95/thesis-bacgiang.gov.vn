@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">Liên hệ</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>CỔNG THÔNG TIN ĐIỆN TỬ UBND TỈNH BẮC GIANG BACGIANG PORTAL</h4>
                    <p>
                        Trụ sở : Số 82 - Đường Hùng Vương - TP. Bắc Giang - Tỉnh Bắc Giang
                        <br>
                        Điện thoại :(0240) 3.829.003; Fax: (0240) 3.855.012;
                        <br>
                        Email: banbientap@bacgiang.gov.vn
                    </p>
                    <h4>Nhập đầy đủ các thông tin vào bên dưới và gửi, chúng tôi sẽ liên lạc với quý khách trong thời gian sớm nhất. Xin cảm ơn.</h4>
                    <form action="{{ url('/contact') }}" method="POST" class="col-sm-8 col-sm-offset-2" >
                        {{ csrf_field() }}
                       <div class="panel panel-default">
                       	<div class="panel-body">
                            <span class="text-danger">(*) bắt buộc nhập</span>
                            <h5>Email *</h5>
                            <input type="email" name="email" class="form-control" required title="Email">
                            <h5>Họ và tên *</h5>
                            <input type="text" name="name" class="form-control" required title="Họ và tên">
                            <h5>Số điện thoại</h5>
                            <input type="text" name="phone" class="form-control" title="Số điện thoại">
                            <h5>Nội dung *</h5>
                            <textarea name="content" class="form-control" required title="Nội dung"></textarea>
                            <hr>
                            <button type="submit" class="btn btn-block btn-success">Gửi</button>
                        </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

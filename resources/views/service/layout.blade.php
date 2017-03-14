@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">Hành chính công</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/service') }}" class="navbar-brand">Hành chính công điện tử</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/service/document') }}">Tra cứu TTHC</a></li>
                        <li><a href="{{ url('/service/me') }}">Dịch vụ công của tôi</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            @yield('service')
        </div>
    </div>
@endsection

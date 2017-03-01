@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">Công dân</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- TAB NAVIGATION -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Thông tin</a></li>
                        <li><a href="#tab2" role="tab" data-toggle="tab">Các yêu cầu của tôi</a></li>
                    </ul>
                    <!-- TAB CONTENT -->
                    <div class="tab-content">
                        <div class="active tab-pane fade in" id="tab1">
                            <h2>Thông tin tài khoản</h2>
                            <table class="table table-hover">
                            	<thead>
                            		<tr>
                            			<th>Key</th>
                                        <th>Value</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>Email</td>
                                        <td>{{ Auth::user()->email }}</td>
                            		</tr>
                                    <tr>
                                        <td>Họ và tên</td>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày tham gia</td>
                                        <td>{{ Auth::user()->created_at }}</td>
                                    </tr>
                            	</tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <h2>Tab2</h2>
                            <p>Lorem ipsum.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

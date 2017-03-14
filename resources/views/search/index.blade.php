@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">Tìm kiếm</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <hr>
                    <div class="well well-sm">
                        <form action="{{ url('/search') }}" method="GET">
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
                    <hr>
                    <h3>Kết quả cho: "{{ Request::input('query') }}"</h3>
                    <hr>
                    @if(Request::input('query'))
                        <!-- TAB NAVIGATION -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a href="#tab1" role="tab" data-toggle="tab">
                                    Bài viết: <b>{{ count($posts) }}</b> kết quả
                                </a>
                            </li>
                            <li>
                                <a href="#tab2" role="tab" data-toggle="tab">
                                    Văn bản: <b>{{ count($files) }}</b> kết quả
                                </a>
                            </li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in" id="tab1">
                                <h5>Bài viết: <b>{{ count($posts) }}</b> kết quả</h5>
                                <hr>
                                @foreach($posts as $item)
                                    <div class="col-sm-12">
                                        <h5>
                                            <a href="{{ url('/posts/'.$item->id) }}" title="{{ $item->title }}">
                                                {{ $item->title }}
                                            </a>
                                            <br>
                                            <small>({{ substr($item->created_at, 0, 10) }})</small>
                                        </h5>
                                        <p>{{ str_limit($item->description, 255) }}</p>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <h5>Bài viết: <b>{{ count($files) }}</b> kết quả</h5>
                                <hr>
                                @foreach($files as $item)
                                    <div class="col-sm-12">
                                        <h5>
                                            <a href="{{ url('/files/'.$item->id) }}" title="{{ $item->title }}">
                                                {{ $item->title }}
                                            </a>
                                            <br>
                                            <small>({{ substr($item->created_at, 0, 10) }})</small>
                                        </h5>
                                        <p>{{ str_limit($item->description, 100) }}
                                            <br>
                                            <a href="{{ $item->attach }}">Đính kèm</a>
                                        </p>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

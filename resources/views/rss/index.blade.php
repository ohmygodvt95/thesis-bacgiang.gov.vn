@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">Rss</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>List rss</h3>
                    @foreach($categories as $item)
                        <h6><a href="{{ url('/rss/'.$item->id) }}">{{ $item->title }}</a></h6>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

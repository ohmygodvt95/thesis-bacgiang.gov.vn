@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        @if($category->parent_id != 0)
            <li>
                <a href="{{ url('/categories/'.$category->getFatherCategory()->id) }}">
                    {{ $category->getFatherCategory()->title }}
                </a>
            </li>
        @endif
        <li class="active">{{ $category->title }}</li>
    </ol>
    <div class="row" id="category">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($posts as $item)
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="{{ $item->thumb }}" alt="{{ $item->title }}"
                                         width="150px" height="100px" class="center-block thumb">
                                </div>
                                <div class="col-sm-9">
                                    <h5>
                                        <a href="{{ url('/posts/'.$item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                        <br>
                                        <small>Ngày đăng: {{ substr($item->created_at, 0, 10) }}</small>
                                    </h5>
                                    <p>{{ str_limit($item->description, 255) }}</p>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
    </div>
@endsection

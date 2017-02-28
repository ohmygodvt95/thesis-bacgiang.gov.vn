@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">{{ $category->title }}</li>
    </ol>
    <div class="row" id="category">
        @foreach($category->getSubCategories() as $element)
            <div class="col-sm-12">
                <div class="category-title">
                    <a href="{{ url('/categories/'.$element->id) }}" title="{{ $element->title }}">
                        {{ $element->title }}
                    </a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($element->type == 'text')
                            @foreach($element->getPosts(5) as $item)
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
                        @elseif($element->type == 'file')
                            @foreach($element->getFiles(5) as $item)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>
                                            <a href="{{ url('/files/'.$item->id) }}">
                                                {{ $item->title }}
                                            </a>
                                            <br>
                                            <small>Ngày đăng: {{ substr($item->created_at, 0, 10) }}</small>
                                        </h5>
                                        <p>{{ str_limit($item->description, 255) }}</p>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        @endif
                        <a href="{{ url('/categories/'.$element->id) }}" class="pull-right">Xem nhiều hơn</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

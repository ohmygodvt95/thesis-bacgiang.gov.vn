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
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Tìm kiếm văn bản</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ url('/categories/'.$category->id) }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control"
                                placeholder="Số hiệu, nội dung, ngày ra mắt v.v..">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Tìm kiếm</button>
                            </span>
                        </div>
                    </form>
                    <br>
                    <a href="{{ url('/categories/'.$category->id) }}" class="">Hủy bộ tìm kiếm</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($files as $item)
                        <div class="row">
                            <div class="col-sm-12">
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
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

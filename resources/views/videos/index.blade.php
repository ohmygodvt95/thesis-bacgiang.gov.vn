@extends('videos.layouts.app')
@section('css')
    <link href="http://vjs.zencdn.net/5.17.0/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <style>
        .category-title{

        }
    </style>
@endsection
@section('content')
    <div class="row" id="category">
        <div class="col-sm-12" style="margin-bottom: 20px;">
            <div class="col-sm-7">
                <video width="100%"  controls>
                    <?php $video = $bgNews->getVideos(1, 0)[0]; ?>
                    <source src="{{ $video->source }}">
                    Your browser does not support the video tag.
                </video>
                <h5><a href="{{ url('/videos/'.$video->id) }}">{{ str_limit($video->title, 50) }}</a></h5>
                <h6>Ngày đăng: {{ $video->created_at }}</h6>
                <h6>Chuyên mục: {{ $video->getCategory()->title }}</h6>
            </div>
            <div class="col-sm-5">
                <div class="category-title">
                    <a href="{{ url('/videos/categories/'.$bgNews->id) }}" title="{{ $bgNews->title }}">
                        {{ $bgNews->title }}
                    </a>
                </div>
                <div class="col-sm-12">
                    @foreach($bgNews->getVideos(4, 0) as $item)
                        <small>
                            <div class="col-sm-4">
                                <img src="{{ $item->thumb }}" alt="" class="img-responsive">
                            </div>
                            <div class="col-sm-8">
                                <h6><a href="{{ url('/videos/'.$item->id) }}">{{ str_limit($item->title, 50) }}</a></h6>
                                <div>Chuyên mục: {{ $item->getCategory()->title }}</div>
                                <div>Ngày phát: {{ $item->created_at }}</div>
                            </div>
                        </small>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="category-title">
                <a href="#" title="Video mới">
                    Video mới
                </a>
            </div>
            @foreach($bgNew->getVideos(4, 0) as $item)
                <div class="col-sm-3">
                    <div class="col-sm-12">
                        <img src="{{ $item->thumb }}" alt="" class="img-responsive">
                        <h6><a href="{{ url('/videos/'.$item->id) }}">{{ str_limit($item->title, 50) }}</a></h6>
                        <small>{{ substr($item->created_at, 0, 10) }}</small>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="col-sm-12">
            <div class="category-title">
                <a href="{{ url('/videos/categories/'.$bgFilms->id) }}" title="{{ $bgFilms->title }}">
                    {{ $bgFilms->title }}
                </a>
            </div>
            @foreach($bgFilms->getVideos(4, 0) as $item)
                <div class="col-sm-3">
                    <div class="col-sm-12">
                        <img src="{{ $item->thumb }}" alt="" class="img-responsive">
                        <h6><a href="{{ url('/videos/'.$item->id) }}">{{ str_limit($item->title, 50) }}</a></h6>
                        <small>{{ substr($item->created_at, 0, 10) }}</small>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="col-sm-12">
            <div class="category-title">
                <a href="{{ url('/videos/categories/'.$bgKySu->id) }}" title="{{ $bgKySu->title }}">
                    {{ $bgKySu->title }}
                </a>
            </div>
            @foreach($bgKySu->getVideos(4, 0) as $item)
                <div class="col-sm-3">
                    <div class="col-sm-12">
                        <img src="{{ $item->thumb }}" alt="" class="img-responsive">
                        <h6><a href="{{ url('/videos/'.$item->id) }}">{{ str_limit($item->title, 50) }}</a></h6>
                        <small>{{ substr($item->created_at, 0, 10) }}</small>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
@endsection
@section('js')
    <script src="http://vjs.zencdn.net/5.17.0/video.js"></script>
@endsection

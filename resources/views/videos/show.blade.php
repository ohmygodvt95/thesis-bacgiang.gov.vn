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
            <div class="col-sm-12">
                <video width="100%"  controls>
                    <source src="{{ $video->source }}">
                    Your browser does not support the video tag.
                </video>
                <h5><a href="{{ url('/videos/'.$video->id) }}">{{ str_limit($video->title, 50) }}</a></h5>
                <h6>Ngày đăng: {{ $video->created_at }}</h6>
                <h6>Chuyên mục: {{ $video->getCategory()->title }}</h6>
            </div>
            <div class="col-sm-12">
                <div class="category-title">
                    <a href="{{ url('/videos/categories/'.$video->getCategory()->id) }}" title="Video cùng chuyên mục">
                        Video cùng chuyên mục
                    </a>
                </div>
                @foreach($video->getCategory()->getVideos(4, 0) as $item)
                    <div class="col-sm-3">
                        <div class="col-sm-12">
                            <img src="{{ $item->thumb }}" alt="" class="img-responsive">
                            <h6><a href="{{ url('/videos/'.$item->id) }}">{{ str_limit($item->title, 50) }}</a></h6>
                            <small>Chuyên mục: {{ $item->getCategory()->title }}</small>
                            <br>
                            <small>Ngày phát: {{ $item->created_at }}</small>
                        </div>
                    </div>
                @endforeach
                <hr>
                <h4 class="">Bình luận:</h4>
                <hr>
                <div class="fb-comments" data-width="100%" data-href="{{ url('/videos/'.$video->id) }}" data-numposts="5"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="http://vjs.zencdn.net/5.17.0/video.js"></script>
@endsection

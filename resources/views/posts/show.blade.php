@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li>
            <a href="{{ url('/categories/'.$post->getCategory()->id) }}">
                {{ $post->getCategory()->title }}
            </a>
        </li>
        <li class="active">{{ str_limit($post->title, 30) }}</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="text-center text-primary">{{ $post->title }}</h4>
                    <span>Ngày đăng: {{ substr($post->created_at, 0, 10) }}</span>
                    <br>
                    <span>Lượt xem: {{ $post->views }}</span>
                    <span class="pull-right">Cỡ chữ:
                        <i class="fa fa-fw fa-minus"></i>
                        <i class="fa fa-fw fa-plus"></i>
                    </span>
                    <hr>
                    <div class="body">
                        <p style="font-weight: bolder; text-align: justify">{{ $post->description }}</p>
                        <div>{!! $post->body !!}</div>
                    </div>
                    <hr>
                    <div class="fb-share-button pull-left" style="margin-right: 15px; margin-top: -3px;"
                         data-href="{{ Request::url() }}"
                         data-layout="button_count">
                    </div>
                    <div class="g-plusone pull-left" data-size="medium"></div>
                    <a target="_new" href="{{ url('/print/'.$post->id) }}" class="pull-right btn btn-sm btn-primary">In ấn</a>
                </div>
                <div class="panel-footer">
                    <hr>
                    <h4 class="">Bài viết khác:</h4>
                    <hr>
                    <ul>
                        @foreach($relatedPosts as $item)
                            <li>
                                <a href="{{ url('/posts/'.$item->id) }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                                <small> ({{ substr($item->created_at, 0, 10) }})</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var size = 14;
        $('.fa-plus').click(function () {
            $('.body').css('font-size', (size < 30 ? size += 2 : 30) + 'px');
        });
        $('.fa-minus').click(function () {
            $('.body').css('font-size', (size > 14 ? size -= 2 : 14) + 'px');
        });
    </script>
@endsection

@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('content')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="active">Sitemap</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{ url('/categories/'.$category->id) }}">
                                        {{ $category->title }}
                                    </a>
                                </td>
                            </tr>
                            @if($category->subCategories)
                                @foreach($category->subCategories as $category)
                                    <tr>
                                        <td style="padding-left: 50px">
                                            <i class="fa fa-long-arrow-right"></i>
                                            <a href="{{ url('/categories/'.$category->id) }}">
                                                {{ $category->title }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

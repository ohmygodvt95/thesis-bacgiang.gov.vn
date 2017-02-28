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
            <a href="{{ url('/categories/'.$file->getCategory()->id) }}">
                {{ $file->getCategory()->title }}
            </a>
        </li>
        <li class="active">{{ str_limit($file->title, 30) }}</li>
    </ol>
    <div class="row" id="category">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="text-center text-primary">{{ $file->title }}</h4>
                    <span>Ngày đăng: {{ substr($file->created_at, 0, 10) }}</span>
                    <br>
                    <span>Lượt xem: {{ $file->views }}</span>
                    <hr>
                    <div class="body">
                        <p style="font-weight: bolder; text-align: justify">{{ $file->description }}</p>
                        @if($file->type == 'document')
                            <table class="table table-striped table-hover table-bordered">
                            	<thead>
                            		<tr>
                            			<th>Thuộc tính</th>
                                        <th>Giá trị</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>Ngày ký</td>
                                        <td>{{ $file->publish_date }}</td>
                            		</tr>
                                    <tr>
                                        <td>Loại văn vản</td>
                                        <td>{{ $file->type_document }}</td>
                                    </tr>
                                    <tr>
                                        <td>Số hiệu văn bản</td>
                                        <td>{{ $file->code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cơ quan ban hành</td>
                                        <td>{{ $file->organization }}</td>
                                    </tr>
                                    <tr>
                                        <td>Đính kèm</td>
                                        <td><a href="{{ asset($file->attach) }}">Tải về</a></td>
                                    </tr>
                            	</tbody>
                            </table>
                        @else
                            <p>Xem và tải về  <a href="{{ asset($file->attach) }}">tại đây</a>.</p>
                        @endif
                    </div>
                    <hr>
                    <div class="fb-share-button pull-left" style="margin-right: 15px; margin-top: -3px;"
                         data-href="{{ Request::url() }}"
                         data-layout="button_count">
                    </div>
                    <div class="g-plusone pull-left" data-size="medium"></div>
                </div>
                <div class="panel-footer">
                    <hr>
                    <h4 class="">Văn bản khác:</h4>
                    <hr>
                    <ul>
                        @foreach($relatedFiles as $item)
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

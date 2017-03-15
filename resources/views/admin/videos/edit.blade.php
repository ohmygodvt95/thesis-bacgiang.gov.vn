@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit file <a href="/admin/files">Quay lại</a></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/admin/videos/{{ $video->id }}" method="POST">
                            <div class="col-sm-6 col-sm-offset-3">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PATCH">
                                <h3>Tiêu đề</h3>
                                <input type="text" name="title" required
                                       class="form-control" title="Title"
                                       value="{{ $video->title }}">
                                <h3>Thuộc chuyên mục</h3>
                                <select name="category_id" class="form-control"
                                        title="Click để chọn chuyên mục" required>
                                    @foreach($categories as $category)
                                        @if($category->type != 'link')
                                            @if(count($category->subCategories) == 0 && $category->type == 'text')
                                                <option value="{{ $category->id }}"
                                                        {{ $video->category_id == $category->id ? 'selected=\"true\"':'' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @elseif(count($category->subCategories) > 0)
                                                <optgroup label="{{ $category->title }}">
                                                    @foreach($category->subCategories as $subCategory)
                                                        @if($subCategory->type == 'text')
                                                            <option value="{{ $subCategory->id }}"
                                                                    {{ $video->category_id == $subCategory->id ? 'selected=\"true\"':'' }}>
                                                                {{ $subCategory->title }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endif
                                    @endforeach

                                </select>
                                <h3>File video</h3>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="source"
                                           readonly required value="{{ $video->source }}" placeholder="Bấm chọn file hoặc copy link vào đây"
                                           name="source">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary"
                                                data-toggle="modal" data-target="#myModal">Select file</button>
                                    </span>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <iframe width="100%" height="500px" frameborder="0"
                                                        src="{{ url('/') }}/filemanager/dialog.php?type=2&field_id=source&relative_url=1"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3>Thumbnail</h3>
                                <input type="hidden" class="form-control" id="thumb"
                                       value="{{ url($video->thumb) }}" placeholder="Search" name="thumb">
                                <button type="button" class="btn btn-default btn-block"
                                        data-toggle="modal" data-target="#myModal1">Select</button>
                                <hr>
                                <img class="thumb img-responsive" src="{{ url($video->thumb) }}"
                                     alt="Ảnh đại diện">
                                <!-- Modal -->
                                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <iframe width="100%" height="450px" frameborder="0"
                                                        src="{{ url('/') }}/filemanager/dialog.php?type=2&field_id=thumb&relative_url=1"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a href="/admin/videos" class="btn btn-danger col-sm-5">Quay lại</a>
                                <button type="submit"
                                        class="btn btn-success col-sm-offset-2 col-sm-5">Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        function responsive_filemanager_callback(field_id) {
            var url = $('#' + field_id).val();
            if(field_id == 'thumb') $('.thumb').attr('src', url);
        }
    </script>
@endsection

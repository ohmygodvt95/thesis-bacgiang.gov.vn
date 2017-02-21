@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit post <a href="/admin/posts">Quay lại</a></div>
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
                        <form action="/admin/posts/{{ $post->id }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="col-sm-9">
                                {{ csrf_field() }}
                                <h3>Tiêu đề</h3>
                                <input type="text" name="title" required
                                       class="form-control" title="Title"
                                       value="{{ $post->title }}">
                                <h3>Thuộc chuyên mục</h3>
                                <select name="category_id" class="form-control"
                                        title="Click để chọn chuyên mục" required >
                                    <option value="">--Chọn chuyên mục--</option>
                                    @foreach($categories as $category)
                                        @if($category->type != 'link')
                                            @if(count($category->subCategories) == 0 && $category->type == 'text')
                                                <option value="{{ $category->id }}"
                                                        {{ $post->category_id == $category->id ? 'selected':'' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @elseif(count($category->subCategories) > 0)
                                                <optgroup label="{{ $category->title }}">
                                                    @foreach($category->subCategories as $subCategory)
                                                        @if($subCategory->type == 'text')
                                                            <option value="{{ $subCategory->id }}"
                                                                    {{ $post->category_id == $subCategory->id ? 'selected':'' }}>
                                                                {{ $subCategory->title }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                <h3>Description</h3>
                                <textarea name="description" cols="30" rows="4"
                                          placeholder="Tóm tắt nội dung"
                                          class="form-control" title="description">{{ $post->description }}</textarea>
                                <h3>Nội dung</h3>
                                <textarea id="body" name="body" cols="30" rows="4"
                                          class="form-control" title="description">
                                    {{ $post->body }}
                                </textarea>
                                <hr>
                                <button type="reset" class="btn btn-danger col-sm-5">Làm lại</button>
                                <button type="submit"
                                        class="btn btn-success col-sm-offset-2 col-sm-5">Cập nhật</button>
                            </div>
                            <div class="col-sm-3">
                                <h3>Thumbnail</h3>
                                <input type="hidden" class="form-control" id="thumb"
                                       value="{{ $post->thumb }}" placeholder="Search" name="thumb">
                                <button type="button" class="btn btn-default btn-block"
                                        data-toggle="modal" data-target="#myModal">Select</button>
                                <hr>
                                <img class="thumb img-responsive" src="{{ $post->thumb }}"
                                     alt="Ảnh đại diện">
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <iframe width="100%" height="450px" frameborder="0"
                                                        src="{{ url('/') }}/filemanager/dialog.php?type=1&amp;field_id=thumb&amp;relative_url=1"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <!-- Tinymce Editor -->
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/post.js') }}"></script>
    <script>
        function responsive_filemanager_callback(field_id){
            var url=$('#'+field_id).val();
            $('.thumb').attr('src', url);
        }
    </script>
@endsection

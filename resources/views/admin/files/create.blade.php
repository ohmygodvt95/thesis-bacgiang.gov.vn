@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new file <a href="/admin/files">Quay lại</a></div>
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
                        <form action="/admin/files" method="POST">
                            <div class="col-sm-6 col-sm-offset-3">
                                {{ csrf_field() }}
                                <h3>Tiêu đề</h3>
                                <input type="text" name="title" required
                                   class="form-control" title="Title"
                                   value="{{ old('title') }}">
                                <h3>Thuộc chuyên mục</h3>
                                <select name="category_id" class="form-control"
                                    title="Click để chọn chuyên mục" required>
                                    <option value="">--Chọn chuyên mục--</option>
                                    @foreach($categories as $category)
                                        @if($category->type != 'link')
                                            @if(count($category->subCategories) == 0 && $category->type == 'file')
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected':'' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @elseif(count($category->subCategories) > 0)
                                                <optgroup label="{{ $category->title }}">
                                                    @foreach($category->subCategories as $subCategory)
                                                        @if($subCategory->type == 'file')
                                                            <option value="{{ $subCategory->id }}"
                                                                {{ old('category_id') == $subCategory->id ? 'selected':'' }}>
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
                                    class="form-control" title="description">{{ old('description') }}</textarea>
                                <h3>Kiểu file</h3>
                                <select name="type" class="form-control type"
                                    title="Click để chọn chuyên mục" required>
                                    <option value="document"
                                        {{ old('type') == 'document' ? 'selected':'' }}>
                                        Văn bản hành chính(Nghị quyết, QĐ..)</option>
                                    <option value="file"
                                        {{ old('type') == 'file' ? 'selected':'' }}>
                                        Tài liệu tham khảo(file, video..)</option>
                                </select>
                                <h3>File đính kèm</h3>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="thumb"
                                        readonly required value="{{ old('attach') }}" placeholder="Search" name="attach">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary"
                                            data-toggle="modal" data-target="#myModal">Select file</button>
                                    </span>
                                </div>
                                <div class="" id="more">
                                    <h3>Thuộc tính văn bản</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">Ngày ký</div>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control"
                                                value="{{ old('publish_date') }}" placeholder="Ngày ký: yyyy-mm-dd"
                                                name="publish_date" required>
                                        </div>
                                        <div class="col-sm-6">Số hiệu văn bản</div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                value="{{ old('code') }}" placeholder="code" name="code" required>
                                        </div>
                                        <div class="col-sm-6">Loại văn bản</div>
                                        <div class="col-sm-6">
                                            <select name="type_document" title="Loại văn bản"
                                                class="form-control" required>
                                                <option value="">--Chọn loại văn bản--</option>
                                                <option value="Báo cáo" {{ old('type_document') == 'Báo cáo' ? 'selected':'' }}>Báo cáo</option>
                                                <option value="Chỉ thị" {{ old('type_document') == 'Chỉ thị' ? 'selected':'' }}>Chỉ thị</option>
                                                <option value="Công văn" {{ old('type_document') == 'Công văn' ? 'selected':'' }}>Công văn</option>
                                                <option value="Công điện" {{ old('type_document') == 'Công điệ' ? 'selected':'' }}>Công điện</option>
                                                <option value="Chương trình" {{ old('type_document') == 'Chương trình' ? 'selected':'' }}>Chương trình</option>
                                                <option value="Hướng dẫn" {{ old('type_document') == 'Hướng dẫn' ? 'selected':'' }}>Hướng dẫn</option>
                                                <option value="Kế hoạch" {{ old('type_document') == 'Kế hoạch' ? 'selected':'' }}>Kế hoạch</option>
                                                <option value="Nghị quyết" {{ old('type_document') == 'Nghị quyết' ? 'selected':'' }}>Nghị quyết</option>
                                                <option value="Thông báo" {{ old('type_document') == 'Thông báo' ? 'selected':'' }}>Thông báo</option>
                                                <option value="Quyết định" {{ old('type_document') == 'Quyết định' ? 'selected':'' }}>Quyết định</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">Cơ quan ban hành</div>
                                        <div class="col-sm-6" >
                                            <select name="organization" title="Cơ quan ban hành"
                                                class="form-control" required>
                                                <option value="">--Chọn cơ quan--</option>
                                                <option value="UBND" {{ old('organization') == 'UBND' ? 'selected':'' }}>UBND</option>
                                                <option value="HĐND" {{ old('organization') == 'HĐND' ? 'selected':'' }}>HĐND</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <iframe width="100%" height="500px" frameborder="0"
                                                        src="{{ url('/') }}/filemanager/dialog.php?type=2&field_id=thumb&relative_url=1"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="reset" class="btn btn-danger col-sm-5">Làm lại</button>
                                <button type="submit"
                                        class="btn btn-success col-sm-offset-2 col-sm-5">Tạo mới
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
    <!-- File js -->
    <script src="{{ asset('js/file.js') }}"></script>
    <script>
        function responsive_filemanager_callback(field_id) {
            var url = $('#' + field_id).val();
            $('.thumb').attr('src', url);
        }
    </script>
@endsection

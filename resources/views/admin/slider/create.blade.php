@extends('admin.layouts.master-layouts')

@section('content')

<h2>Thêm Slider</h2>

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.sliders.store') }}" method="POST" class="form-horizontal form-groups-bordered">
    @csrf

    <div class="panel panel-primary" data-collapsed="0">

        <div class="panel-heading">
            <div class="panel-title">
                Thông tin Slider
            </div>

            <div class="panel-options">
                <a href="#" data-rel="collapse">
                    <i class="entypo-down-open"></i>
                </a>
            </div>
        </div>

        <div class="panel-body">

            <div class="form-group">
                <label class="col-sm-3 control-label">Tiêu đề</label>
                <div class="col-sm-5">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Subtitle</label>
                <div class="col-sm-5">
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Mô tả</label>
                <div class="col-sm-5">
                    <textarea name="description" class="form-control autogrow" rows="4">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Ảnh Slider</label>
                <div class="col-sm-5">

                    <input type="hidden" name="image_id" id="image_id" value="{{ old('image_id') }}">

                    <div style="margin-bottom: 10px;">
                        <img id="image_id_preview"
                             src=""
                             style="max-width: 220px; max-height: 120px; display:none;">
                    </div>

                    <button type="button"
                            class="btn btn-default"
                            onclick="openMediaWindow('image_id')">
                        <i class="entypo-picture"></i>
                        Chọn ảnh
                    </button>

                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeSettingImage('image_id')">
                        Xóa ảnh
                    </button>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Link</label>
                <div class="col-sm-5">
                    <input type="text" name="link" value="{{ old('link') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Text Button</label>
                <div class="col-sm-5">
                    <input type="text" name="button_text" value="{{ old('button_text') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Vị trí</label>
                <div class="col-sm-5">
                    <select name="position" class="form-control">
                        <option value="">-- Chọn vị trí --</option>
                        <option value="home" {{ old('position') == 'home' ? 'selected' : '' }}>Home</option>
                        <option value="product" {{ old('position') == 'product' ? 'selected' : '' }}>Product</option>
                        <option value="blog" {{ old('position') == 'blog' ? 'selected' : '' }}>Blog</option>
                        <option value="landing" {{ old('position') == 'landing' ? 'selected' : '' }}>Landing</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Thứ tự</label>
                <div class="col-sm-2">
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-5">
                    <div class="checkbox checkbox-replace">
                        <label>
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                            Hiển thị
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Lưu Slider
            </button>

            <a href="{{ route('admin.sliders.index') }}" class="btn btn-default">
                Quay lại
            </a>
        </div>
    </div>

</form>

@endsection

@section('js')
<script>
function openMediaWindow(inputId) {
    window.open(
        '{{ route('admin.media.popup') }}?select=1&input=' + inputId,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeSettingImage(inputId) {
    document.getElementById(inputId).value = '';

    var preview = document.getElementById(inputId + '_preview');
    preview.src = '';
    preview.style.display = 'none';
}
</script>
@endsection
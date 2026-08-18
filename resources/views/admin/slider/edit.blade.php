@extends('admin.layouts.master-layouts')

@section('content')

<h2>Sửa Slider</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.sliders.update', $slider->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

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

            {{-- TITLE --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Tiêu đề</label>
                <div class="col-sm-5">
                    <input type="text"
                           name="title"
                           value="{{ old('title', $slider->title) }}"
                           class="form-control">
                </div>
            </div>

            {{-- SUBTITLE --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Subtitle</label>
                <div class="col-sm-5">
                    <input type="text"
                           name="subtitle"
                           value="{{ old('subtitle', $slider->subtitle) }}"
                           class="form-control">
                </div>
            </div>

            {{-- DESCRIPTION --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Mô tả</label>
                <div class="col-sm-5">
                    <textarea name="description"
                              class="form-control autogrow"
                              rows="4">{{ old('description', $slider->description) }}</textarea>
                </div>
            </div>

            {{-- IMAGE --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Ảnh Slider</label>

                <div class="col-sm-5">

                    <input type="hidden"
                           name="image_id"
                           id="image_id"
                           value="{{ old('image_id', $slider->image_id) }}">

                    <div style="margin-bottom: 10px;">
                        <img id="image_id_preview"
                             src="{{ $slider->image ? asset('storage/' . $slider->image->file_path) : '' }}"
                             style="max-width:220px; max-height:120px; {{ $slider->image ? '' : 'display:none;' }}">
                    </div>

                    <button type="button"
                            class="btn btn-default"
                            onclick="openMediaWindow('image_id')">
                        <i class="entypo-picture"></i>
                        Chọn ảnh
                    </button>

                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeImage('image_id')">
                        Xóa ảnh
                    </button>

                </div>
            </div>

            {{-- LINK --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Link</label>
                <div class="col-sm-5">
                    <input type="text"
                           name="link"
                           value="{{ old('link', $slider->link) }}"
                           class="form-control">
                </div>
            </div>

            {{-- BUTTON TEXT --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Text Button</label>
                <div class="col-sm-5">
                    <input type="text"
                           name="button_text"
                           value="{{ old('button_text', $slider->button_text) }}"
                           class="form-control">
                </div>
            </div>

            {{-- POSITION --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Vị trí</label>
                <div class="col-sm-5">
                    <select name="position" class="form-control">
                        <option value="">-- Chọn vị trí --</option>
                        <option value="home" {{ old('position', $slider->position) == 'home' ? 'selected' : '' }}>Home</option>
                        <option value="product" {{ old('position', $slider->position) == 'product' ? 'selected' : '' }}>Product</option>
                        <option value="blog" {{ old('position', $slider->position) == 'blog' ? 'selected' : '' }}>Blog</option>
                        <option value="landing" {{ old('position', $slider->position) == 'landing' ? 'selected' : '' }}>Landing</option>
                    </select>
                </div>
            </div>

            {{-- SORT --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Thứ tự</label>
                <div class="col-sm-2">
                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', $slider->sort_order) }}"
                           class="form-control">
                </div>
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-5">
                    <div class="checkbox checkbox-replace">
                        <label>
                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                            Hiển thị
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- BUTTON --}}
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">

            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Cập nhật Slider
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
        '{{ route('admin.media.popup') }}?input=' + inputId,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeImage(inputId) {
    document.getElementById(inputId).value = '';

    var preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>
@endsection
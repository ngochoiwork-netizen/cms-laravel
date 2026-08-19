@php
    $isEdit = isset($slider) && $slider;

    $vi = $isEdit ? $slider->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $slider->translations->where('locale', 'en')->first() : null;

    $selectedImage = $isEdit && $slider->image ? $slider->image : null;

    $positions = [
        'home' => 'Trang chủ',
        'pos-system' => 'POS System',
        'merchant-services' => 'Merchant Services',
        'growth-services' => 'Growth Services',
        'about' => 'About Us',
        'landing' => 'Landing Page',
    ];
@endphp

{{-- Thông tin slider --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin slider</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Vị trí hiển thị</label>
            <div class="col-sm-5">
                <select name="position" class="form-control">
                    <option value="">-- Chọn vị trí --</option>

                    @foreach($positions as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('position', $isEdit ? $slider->position : 'home') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>

                @error('position')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Link</label>
            <div class="col-sm-7">
                <input type="text"
                       name="link"
                       class="form-control"
                       value="{{ old('link', $isEdit ? $slider->link : '') }}"
                       placeholder="VD: /diem-den/da-lat">

                @error('link')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Text Button</label>
            <div class="col-sm-5">
                <input type="text"
                       name="button_text"
                       class="form-control"
                       value="{{ old('button_text', $isEdit ? $slider->button_text : '') }}"
                       placeholder="VD: Khám phá ngay">

                @error('button_text')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

{{-- Nội dung đa ngôn ngữ --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Nội dung đa ngôn ngữ</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#content-tab-vi" data-toggle="tab">Tiếng Việt</a>
            </li>
            <li>
                <a href="#content-tab-en" data-toggle="tab">English</a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top:20px;">

            {{-- VI --}}
            <div class="tab-pane active" id="content-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tiêu đề</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[title]"
                               class="form-control"
                               value="{{ old('vi.title', $vi->title ?? '') }}"
                               placeholder="VD: Khám phá Việt Nam theo cách riêng của bạn">

                        @error('vi.title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tiêu đề phụ</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[subtitle]"
                               class="form-control"
                               value="{{ old('vi.subtitle', $vi->subtitle ?? '') }}"
                               placeholder="VD: Cẩm nang du lịch, khách sạn, địa điểm ăn uống">

                        @error('vi.subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Mô tả</label>
                    <div class="col-sm-7">
                        <textarea name="vi[description]"
                                  class="form-control autogrow"
                                  rows="4"
                                  placeholder="Nhập mô tả ngắn cho slider">{{ old('vi.description', $vi->description ?? '') }}</textarea>

                        @error('vi.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- EN --}}
            <div class="tab-pane" id="content-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[title]"
                               class="form-control"
                               value="{{ old('en.title', $en->title ?? '') }}"
                               placeholder="VD: Explore Vietnam Your Way">

                        @error('en.title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Subtitle</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[subtitle]"
                               class="form-control"
                               value="{{ old('en.subtitle', $en->subtitle ?? '') }}"
                               placeholder="VD: Travel guides, hotels and local food">

                        @error('en.subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[description]"
                                  class="form-control autogrow"
                                  rows="4"
                                  placeholder="Enter short slider description">{{ old('en.description', $en->description ?? '') }}</textarea>

                        @error('en.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- Hình ảnh --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Hình ảnh</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh slider</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="image_id"
                       id="image_id"
                       value="{{ old('image_id', $isEdit ? $slider->image_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="image_id_preview"
                         src="{{ $selectedImage ? asset('storage/' . $selectedImage->file_path) : '' }}"
                         style="max-width:220px; max-height:120px; {{ $selectedImage ? '' : 'display:none;' }}">
                </div>

                <button type="button" class="btn btn-default" onclick="openMediaWindow('image_id')">
                    <i class="entypo-picture"></i> Chọn ảnh
                </button>

                <button type="button" class="btn btn-danger" onclick="removeMedia('image_id')">
                    Xóa ảnh
                </button>

                @error('image_id')
                    <br><span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

{{-- Cài đặt hiển thị --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Cài đặt hiển thị</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Thứ tự sắp xếp</label>
            <div class="col-sm-5">
                <input type="number"
                       name="sort_order"
                       class="form-control"
                       value="{{ old('sort_order', $isEdit ? $slider->sort_order : 0) }}">

                @error('sort_order')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $isEdit ? $slider->is_active : 1) ? 'checked' : '' }}>
                    Hiển thị slider
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" class="btn btn-primary">
                    <i class="entypo-check"></i>
                    {{ $isEdit ? 'Cập nhật slider' : 'Lưu slider' }}
                </button>

                <a href="{{ route('admin.sliders.index') }}" class="btn btn-default">
                    Quay lại
                </a>
            </div>
        </div>

    </div>
</div>
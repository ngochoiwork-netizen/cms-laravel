@php
    $isEdit = isset($section) && $section;

    $vi = $isEdit ? ($translations['vi'] ?? null) : null;
    $en = $isEdit ? ($translations['en'] ?? null) : null;

    $selectedImage = $isEdit && $section->image ? $section->image : null;

    $sectionTypes = [
        'content' => 'Content',
        'image_text' => 'Image + Text',
        'cta' => 'CTA',
        'list' => 'List',
        'faq' => 'FAQ',
        'gallery' => 'Gallery',
        'custom' => 'Custom',
    ];

    $layouts = [
        'default' => 'Default',
        'left_image' => 'Ảnh trái - Nội dung phải',
        'right_image' => 'Ảnh phải - Nội dung trái',
        'center' => 'Center',
        'grid' => 'Grid',
        'slider' => 'Slider',
    ];

    $currentType = old('type', $isEdit ? $section->type : 'content');
@endphp

{{-- Thông tin Section --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin Section</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Section Key</label>
            <div class="col-sm-5">
                <input type="text"
                       name="key"
                       class="form-control"
                       value="{{ old('key', $isEdit ? $section->key : '') }}"
                       placeholder="VD: hero, intro, why_choose">

                @error('key')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Loại Section</label>
            <div class="col-sm-5">
                <select name="type"
                        id="section_type"
                        class="form-control"
                        onchange="toggleSectionFields()">

                    @foreach($sectionTypes as $value => $label)
                        <option value="{{ $value }}"
                            {{ $currentType == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach

                </select>

                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Layout</label>
            <div class="col-sm-5">
                <select name="layout" class="form-control">
                    <option value="">-- Chọn layout --</option>

                    @foreach($layouts as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('layout', $isEdit ? $section->layout : '') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>

                @error('layout')
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
                <a href="#section-tab-vi" data-toggle="tab">Tiếng Việt</a>
            </li>
            <li>
                <a href="#section-tab-en" data-toggle="tab">English</a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top:20px;">

            {{-- VI --}}
            <div class="tab-pane active" id="section-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tiêu đề</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[title]"
                               class="form-control"
                               value="{{ old('vi.title', $vi->title ?? '') }}"
                               placeholder="Nhập tiêu đề section">

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
                               placeholder="Nhập tiêu đề phụ">
                    </div>
                </div>

                <div class="form-group section-field section-content-field">
                    <label class="col-sm-3 control-label">Nội dung</label>
                    <div class="col-sm-8">
                        <textarea name="vi[content]"
                                  id="vi_content"
                                  class="form-control ckeditor"
                                  rows="12">{{ old('vi.content', $vi->content ?? '') }}</textarea>
                    </div>
                </div>

                <div class="section-field section-button-field">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Button Text</label>
                        <div class="col-sm-5">
                            <input type="text"
                                   name="vi[button_text]"
                                   class="form-control"
                                   value="{{ old('vi.button_text', $vi->button_text ?? '') }}"
                                   placeholder="VD: Xem thêm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Button Link</label>
                        <div class="col-sm-7">
                            <input type="text"
                                   name="vi[button_link]"
                                   class="form-control"
                                   value="{{ old('vi.button_link', $vi->button_link ?? '') }}"
                                   placeholder="VD: /lien-he">
                        </div>
                    </div>
                </div>

                <div class="form-group section-field section-json-field">
                    <label class="col-sm-3 control-label">Data JSON</label>
                    <div class="col-sm-8">
                        <textarea name="vi[data_json]"
                                  class="form-control"
                                  rows="10"
                                  placeholder='{"items":[{"title":"Item 1","description":"Nội dung"}]}'>{{ old('vi.data_json', isset($vi->data_json) ? json_encode($vi->data_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>

                        <p class="help-block">
                            Chỉ dùng cho type: list, faq, gallery, custom.
                        </p>
                    </div>
                </div>

            </div>

            {{-- EN --}}
            <div class="tab-pane" id="section-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[title]"
                               class="form-control"
                               value="{{ old('en.title', $en->title ?? '') }}"
                               placeholder="Enter section title">

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
                               placeholder="Enter subtitle">
                    </div>
                </div>

                <div class="form-group section-field section-content-field">
                    <label class="col-sm-3 control-label">Content</label>
                    <div class="col-sm-8">
                        <textarea name="en[content]"
                                  id="en_content"
                                  class="form-control ckeditor"
                                  rows="12">{{ old('en.content', $en->content ?? '') }}</textarea>
                    </div>
                </div>

                <div class="section-field section-button-field">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Button Text</label>
                        <div class="col-sm-5">
                            <input type="text"
                                   name="en[button_text]"
                                   class="form-control"
                                   value="{{ old('en.button_text', $en->button_text ?? '') }}"
                                   placeholder="VD: Learn more">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Button Link</label>
                        <div class="col-sm-7">
                            <input type="text"
                                   name="en[button_link]"
                                   class="form-control"
                                   value="{{ old('en.button_link', $en->button_link ?? '') }}"
                                   placeholder="VD: /en/contact">
                        </div>
                    </div>
                </div>

                <div class="form-group section-field section-json-field">
                    <label class="col-sm-3 control-label">Data JSON</label>
                    <div class="col-sm-8">
                        <textarea name="en[data_json]"
                                  class="form-control"
                                  rows="10"
                                  placeholder='{"items":[{"title":"Item 1","description":"Content"}]}'>{{ old('en.data_json', isset($en->data_json) ? json_encode($en->data_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>

                        <p class="help-block">
                            Only for type: list, faq, gallery, custom.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- Hình ảnh --}}
<div class="panel panel-primary section-field section-image-field" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Hình ảnh Section</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh chính</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="image_id"
                       id="image_id"
                       value="{{ old('image_id', $isEdit ? $section->image_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="image_id_preview"
                         src="{{ $selectedImage ? asset('storage/' . $selectedImage->file_path) : '' }}"
                         style="max-width:160px; max-height:100px; {{ $selectedImage ? '' : 'display:none;' }}">
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
                       value="{{ old('sort_order', $isEdit ? $section->sort_order : 0) }}">

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
                           {{ old('is_active', $isEdit ? $section->is_active : 1) ? 'checked' : '' }}>
                    Hiển thị section
                </label>
            </div>
        </div>

    </div>
</div>
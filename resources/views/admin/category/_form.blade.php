
@php
    $isEdit = isset($category) && $category;

    $vi = $isEdit ? $category->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $category->translations->where('locale', 'en')->first() : null;

    $selectedThumbnail = $isEdit && $category->thumbnail ? $category->thumbnail : null;
    $selectedBanner = $isEdit && $category->banner ? $category->banner : null;
    $selectedOgImage = $isEdit && $category->ogImage ? $category->ogImage : null;

    $categoryTypes = [
        'post' => 'Blog',
        'product' => 'Sản Phẩm',
    ];

    $schemaTypes = [
        'CollectionPage' => 'CollectionPage',
        'WebPage' => 'WebPage',
        'Article' => 'Article',
        'Blog' => 'Blog',
        'FAQPage' => 'FAQPage',
    ];
@endphp

{{-- Thông tin danh mục --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin danh mục</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Danh mục cha</label>
            <div class="col-sm-5">
                <select name="parent_id" class="form-control">
                    <option value="">-- Danh mục gốc --</option>

                    @foreach($categories as $categoryItem)
                        <option value="{{ $categoryItem['id'] }}"
                            {{ old('parent_id', $isEdit ? $category->parent_id : '') == $categoryItem['id'] ? 'selected' : '' }}>
                            {{ $categoryItem['name'] }}
                        </option>
                    @endforeach
                </select>

                @error('parent_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Loại danh mục</label>
            <div class="col-sm-5">
                <select name="type" class="form-control">
                    @foreach($categoryTypes as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('type', $isEdit ? $category->type : 'post') == $value ? 'selected' : '' }}>
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
            <label class="col-sm-3 control-label">Slug chính</label>
            <div class="col-sm-5">
                <input type="text"
                       name="slug"
                       class="form-control"
                       value="{{ old('slug', $isEdit ? $category->slug : '') }}"
                       placeholder="VD: kinh-nghiem-du-lich">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Canonical URL</label>
            <div class="col-sm-7">
                <input type="text"
                       name="canonical_url"
                       class="form-control"
                       value="{{ old('canonical_url', $isEdit ? $category->canonical_url : '') }}">

                @error('canonical_url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Robots</label>
            <div class="col-sm-5">
                <input type="text"
                       name="robots"
                       class="form-control"
                       value="{{ old('robots', $isEdit ? $category->robots : 'index, follow') }}"
                       placeholder="index, follow">

                @error('robots')
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

            <div class="tab-pane active" id="content-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tên danh mục</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[name]"
                               class="form-control"
                               value="{{ old('vi.name', $vi->name ?? '') }}"
                               placeholder="VD: Kinh nghiệm du lịch">

                        @error('vi.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Mô tả ngắn</label>
                    <div class="col-sm-7">
                        <textarea name="vi[short_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('vi.short_description', $vi->short_description ?? '') }}</textarea>

                        @error('vi.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nội dung chi tiết</label>
                    <div class="col-sm-8">
                        <textarea name="vi[description]"
                                  id="vi_description"
                                  class="form-control ckeditor"
                                  rows="12">{{ old('vi.description', $vi->description ?? '') }}</textarea>

                        @error('vi.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="content-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[name]"
                               class="form-control"
                               value="{{ old('en.name', $en->name ?? '') }}"
                               placeholder="VD: Travel Guide">

                        @error('en.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Short Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[short_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('en.short_description', $en->short_description ?? '') }}</textarea>

                        @error('en.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-8">
                        <textarea name="en[description]"
                                  id="en_description"
                                  class="form-control ckeditor"
                                  rows="12">{{ old('en.description', $en->description ?? '') }}</textarea>

                        @error('en.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- SEO đa ngôn ngữ --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">SEO đa ngôn ngữ</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#seo-tab-vi" data-toggle="tab">Tiếng Việt</a>
            </li>
            <li>
                <a href="#seo-tab-en" data-toggle="tab">English</a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top:20px;">

            <div class="tab-pane active" id="seo-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta title</label>
                    <div class="col-sm-7">
                        <input type="text" name="vi[meta_title]" class="form-control"
                               value="{{ old('vi.meta_title', $vi->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta description</label>
                    <div class="col-sm-7">
                        <textarea name="vi[meta_description]" class="form-control" rows="3">{{ old('vi.meta_description', $vi->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta keywords</label>
                    <div class="col-sm-7">
                        <textarea name="vi[meta_keywords]" class="form-control" rows="3">{{ old('vi.meta_keywords', $vi->meta_keywords ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG title</label>
                    <div class="col-sm-7">
                        <input type="text" name="vi[og_title]" class="form-control"
                               value="{{ old('vi.og_title', $vi->og_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG description</label>
                    <div class="col-sm-7">
                        <textarea name="vi[og_description]" class="form-control" rows="3">{{ old('vi.og_description', $vi->og_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="seo-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta title</label>
                    <div class="col-sm-7">
                        <input type="text" name="en[meta_title]" class="form-control"
                               value="{{ old('en.meta_title', $en->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta description</label>
                    <div class="col-sm-7">
                        <textarea name="en[meta_description]" class="form-control" rows="3">{{ old('en.meta_description', $en->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta keywords</label>
                    <div class="col-sm-7">
                        <textarea name="en[meta_keywords]" class="form-control" rows="3">{{ old('en.meta_keywords', $en->meta_keywords ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG title</label>
                    <div class="col-sm-7">
                        <input type="text" name="en[og_title]" class="form-control"
                               value="{{ old('en.og_title', $en->og_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG description</label>
                    <div class="col-sm-7">
                        <textarea name="en[og_description]" class="form-control" rows="3">{{ old('en.og_description', $en->og_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
{{-- Schema --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Schema</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#schema-tab-vi" data-toggle="tab">Tiếng Việt</a>
            </li>
            <li>
                <a href="#schema-tab-en" data-toggle="tab">English</a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top:20px;">

            <div class="tab-pane active" id="schema-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema type</label>
                    <div class="col-sm-5">
                        <input type="text" name="vi[schema_type]" class="form-control"
                               value="{{ old('vi.schema_type', $vi->schema_type ?? 'CollectionPage') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema data JSON</label>
                    <div class="col-sm-8">
                        <textarea name="vi[schema_data]" class="form-control" rows="8">{{ old('vi.schema_data', isset($vi->schema_data) ? json_encode($vi->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="schema-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema type</label>
                    <div class="col-sm-5">
                        <input type="text" name="en[schema_type]" class="form-control"
                               value="{{ old('en.schema_type', $en->schema_type ?? 'CollectionPage') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema data JSON</label>
                    <div class="col-sm-8">
                        <textarea name="en[schema_data]" class="form-control" rows="8">{{ old('en.schema_data', isset($en->schema_data) ? json_encode($en->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
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

        {{-- Thumbnail --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Thumbnail</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="thumbnail_id"
                       id="thumbnail_id"
                       value="{{ old('thumbnail_id', $isEdit ? $category->thumbnail_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="thumbnail_id_preview"
                         src="{{ $selectedThumbnail ? asset('storage/' . $selectedThumbnail->file_path) : '' }}"
                         style="max-width:160px; max-height:100px; {{ $selectedThumbnail ? '' : 'display:none;' }}">
                </div>

                <button type="button" class="btn btn-default" onclick="openMediaWindow('thumbnail_id')">
                    <i class="entypo-picture"></i> Chọn ảnh
                </button>

                <button type="button" class="btn btn-danger" onclick="removeMedia('thumbnail_id')">
                    Xóa ảnh
                </button>

                @error('thumbnail_id')
                    <br><span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Banner --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Banner</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="banner_id"
                       id="banner_id"
                       value="{{ old('banner_id', $isEdit ? $category->banner_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="banner_id_preview"
                         src="{{ $selectedBanner ? asset('storage/' . $selectedBanner->file_path) : '' }}"
                         style="max-width:160px; max-height:100px; {{ $selectedBanner ? '' : 'display:none;' }}">
                </div>

                <button type="button" class="btn btn-default" onclick="openMediaWindow('banner_id')">
                    <i class="entypo-picture"></i> Chọn ảnh
                </button>

                <button type="button" class="btn btn-danger" onclick="removeMedia('banner_id')">
                    Xóa ảnh
                </button>

                @error('banner_id')
                    <br><span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- OG Image --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">OG Image</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="og_image_id"
                       id="og_image_id"
                       value="{{ old('og_image_id', $isEdit ? $category->og_image_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="og_image_id_preview"
                         src="{{ $selectedOgImage ? asset('storage/' . $selectedOgImage->file_path) : '' }}"
                         style="max-width:160px; max-height:100px; {{ $selectedOgImage ? '' : 'display:none;' }}">
                </div>

                <button type="button" class="btn btn-default" onclick="openMediaWindow('og_image_id')">
                    <i class="entypo-picture"></i> Chọn ảnh
                </button>

                <button type="button" class="btn btn-danger" onclick="removeMedia('og_image_id')">
                    Xóa ảnh
                </button>

                @error('og_image_id')
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
            <label class="col-sm-3 control-label">Thứ tự</label>
            <div class="col-sm-3">
                <input type="number"
                       name="sort_order"
                       class="form-control"
                       value="{{ old('sort_order', $isEdit ? $category->sort_order : 0) }}">

                @error('sort_order')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Nổi bật</label>
            <div class="col-sm-5">
                <div class="checkbox checkbox-replace">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $isEdit ? $category->is_featured : false) ? 'checked' : '' }}>
                    <label>Hiển thị nổi bật</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-5">
                <div class="checkbox checkbox-replace">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $isEdit ? $category->is_active : true) ? 'checked' : '' }}>
                    <label>Kích hoạt</label>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-success">
            {{ $isEdit ? 'Cập nhật' : 'Thêm mới' }}
        </button>

        <a href="{{ route('admin.categories.index') }}" class="btn btn-default">
            Quay lại
        </a>
    </div>
</div>
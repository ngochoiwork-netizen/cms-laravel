@php
    $isEdit = isset($province) && $province;

    $vi = $isEdit ? $province->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $province->translations->where('locale', 'en')->first() : null;

    $selectedThumbnail = $isEdit && $province->thumbnail ? $province->thumbnail : null;
    $selectedBanner = $isEdit && $province->banner ? $province->banner : null;
@endphp

{{-- Thông tin tỉnh / thành --}}
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Thông tin tỉnh / thành
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">
                Quốc gia
            </label>

            <div class="col-sm-5">
                <select name="country_id" class="form-control">
                    <option value="">-- Chọn quốc gia --</option>

                    @foreach($countries as $countryItem)
                        @php
                            $countryName = $countryItem->translations
                                ->where('locale', 'vi')
                                ->first()?->name;
                        @endphp

                        <option value="{{ $countryItem->id }}"
                            {{ old('country_id', $isEdit ? $province->country_id : '') == $countryItem->id ? 'selected' : '' }}>
                            {{ $countryName ?? $countryItem->slug }}
                        </option>
                    @endforeach
                </select>

                @error('country_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">
                Mã tỉnh / thành
            </label>

            <div class="col-sm-5">
                <input type="text"
                       name="code"
                       class="form-control"
                       value="{{ old('code', $isEdit ? $province->code : '') }}"
                       placeholder="VD: HCM, HN, DN">

                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">
                Slug
            </label>

            <div class="col-sm-5">
                <input type="text"
                       name="slug"
                       class="form-control"
                       value="{{ old('slug', $isEdit ? $province->slug : '') }}"
                       placeholder="Để trống sẽ tự tạo">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>

</div>

{{-- Nội dung đa ngôn ngữ --}}
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Nội dung đa ngôn ngữ
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#content-tab-vi" data-toggle="tab">
                    Tiếng Việt
                </a>
            </li>

            <li>
                <a href="#content-tab-en" data-toggle="tab">
                    English
                </a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top:20px;">

            {{-- VI --}}
            <div class="tab-pane active" id="content-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Tên tỉnh / thành
                    </label>

                    <div class="col-sm-5">
                        <input type="text"
                               name="vi[name]"
                               class="form-control"
                               value="{{ old('vi.name', $vi->name ?? '') }}"
                               placeholder="VD: Đà Nẵng">

                        @error('vi.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Mô tả
                    </label>

                    <div class="col-sm-7">
                        <textarea name="vi[description]"
                                  class="form-control autogrow"
                                  rows="5"
                                  placeholder="Nhập mô tả tỉnh / thành">{{ old('vi.description', $vi->description ?? '') }}</textarea>

                        @error('vi.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- EN --}}
            <div class="tab-pane" id="content-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Province / City Name
                    </label>

                    <div class="col-sm-5">
                        <input type="text"
                               name="en[name]"
                               class="form-control"
                               value="{{ old('en.name', $en->name ?? '') }}"
                               placeholder="VD: Da Nang">

                        @error('en.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Description
                    </label>

                    <div class="col-sm-7">
                        <textarea name="en[description]"
                                  class="form-control autogrow"
                                  rows="5"
                                  placeholder="Enter province / city description">{{ old('en.description', $en->description ?? '') }}</textarea>

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
        <div class="panel-title">
            Hình ảnh
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        {{-- Thumbnail --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">
                Thumbnail
            </label>

            <div class="col-sm-5">

                <input type="hidden"
                       name="thumbnail_id"
                       id="thumbnail_id"
                       value="{{ old('thumbnail_id', $isEdit ? $province->thumbnail_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="thumbnail_id_preview"
                         src="{{ $selectedThumbnail ? asset('storage/' . $selectedThumbnail->file_path) : '' }}"
                         style="max-width:160px; max-height:100px; {{ $selectedThumbnail ? '' : 'display:none;' }}">
                </div>

                <button type="button"
                        class="btn btn-default"
                        onclick="openMediaWindow('thumbnail_id')">
                    <i class="entypo-picture"></i>
                    Chọn ảnh
                </button>

                <button type="button"
                        class="btn btn-danger"
                        onclick="removeCategoryImage('thumbnail_id')">
                    Xóa ảnh
                </button>

            </div>
        </div>

        {{-- Banner --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">
                Banner
            </label>

            <div class="col-sm-5">

                <input type="hidden"
                       name="banner_id"
                       id="banner_id"
                       value="{{ old('banner_id', $isEdit ? $province->banner_id : '') }}">

                <div style="margin-bottom:10px;">
                    <img id="banner_id_preview"
                         src="{{ $selectedBanner ? asset('storage/' . $selectedBanner->file_path) : '' }}"
                         style="max-width:160px; max-height:100px; {{ $selectedBanner ? '' : 'display:none;' }}">
                </div>

                <button type="button"
                        class="btn btn-default"
                        onclick="openMediaWindow('banner_id')">
                    <i class="entypo-picture"></i>
                    Chọn ảnh
                </button>

                <button type="button"
                        class="btn btn-danger"
                        onclick="removeCategoryImage('banner_id')">
                    Xóa ảnh
                </button>

            </div>
        </div>

    </div>

</div>

{{-- SEO đa ngôn ngữ --}}
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            SEO đa ngôn ngữ
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#seo-tab-vi" data-toggle="tab">
                    Tiếng Việt
                </a>
            </li>

            <li>
                <a href="#seo-tab-en" data-toggle="tab">
                    English
                </a>
            </li>
        </ul>

        <div class="tab-content" style="padding-top:20px;">

            {{-- SEO VI --}}
            <div class="tab-pane active" id="seo-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Meta Title
                    </label>

                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[meta_title]"
                               class="form-control"
                               value="{{ old('vi.meta_title', $vi->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Meta Description
                    </label>

                    <div class="col-sm-7">
                        <textarea name="vi[meta_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('vi.meta_description', $vi->meta_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            {{-- SEO EN --}}
            <div class="tab-pane" id="seo-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Meta Title
                    </label>

                    <div class="col-sm-7">
                        <input type="text"
                               name="en[meta_title]"
                               class="form-control"
                               value="{{ old('en.meta_title', $en->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">
                        Meta Description
                    </label>

                    <div class="col-sm-7">
                        <textarea name="en[meta_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('en.meta_description', $en->meta_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

{{-- Hiển thị --}}
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Cài đặt hiển thị
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">
                Thứ tự sắp xếp
            </label>

            <div class="col-sm-5">
                <input type="number"
                       name="sort_order"
                       class="form-control"
                       value="{{ old('sort_order', $isEdit ? $province->sort_order : 0) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">
                Nổi bật
            </label>

            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $isEdit ? $province->is_featured : 0) ? 'checked' : '' }}>
                    Tỉnh / thành nổi bật
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">
                Trạng thái
            </label>

            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $isEdit ? $province->is_active : 1) ? 'checked' : '' }}>
                    Hiển thị tỉnh / thành
                </label>
            </div>
        </div>

    </div>

</div>
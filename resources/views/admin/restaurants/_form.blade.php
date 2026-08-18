@php
    $isEdit = isset($restaurant) && $restaurant;

    $vi = $isEdit ? $restaurant->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $restaurant->translations->where('locale', 'en')->first() : null;

    $selectedThumbnail = $isEdit && $restaurant->thumbnail ? $restaurant->thumbnail : null;
    $selectedBanner = $isEdit && $restaurant->banner ? $restaurant->banner : null;
    $selectedOgImage = $isEdit && $restaurant->ogImage ? $restaurant->ogImage : null;

    $galleryImages = $isEdit && $restaurant->galleryImages ? $restaurant->galleryImages : collect();

    $cuisineTypes = [
        'vietnamese' => 'Món Việt',
        'local_food' => 'Đặc sản địa phương',
        'seafood' => 'Hải sản',
        'street_food' => 'Ẩm thực đường phố',
        'vegetarian' => 'Món chay',
        'coffee' => 'Cafe',
        'buffet' => 'Buffet',
        'bbq' => 'BBQ',
        'asian' => 'Món Á',
        'western' => 'Món Âu',
        'japanese' => 'Món Nhật',
        'korean' => 'Món Hàn',
        'thai' => 'Món Thái',
        'fast_food' => 'Fast Food',
        'other' => 'Khác',
    ];
@endphp

{{-- Thông tin nhà hàng --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin nhà hàng</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Quốc gia</label>
            <div class="col-sm-5">
                <select name="country_id" class="form-control">
                    <option value="">-- Chọn quốc gia --</option>

                    @foreach($countries as $countryItem)
                        @php
                            $countryName = $countryItem->translations->where('locale', 'vi')->first()?->name;
                        @endphp

                        <option value="{{ $countryItem->id }}"
                            {{ old('country_id', $isEdit ? $restaurant->country_id : '') == $countryItem->id ? 'selected' : '' }}>
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
            <label class="col-sm-3 control-label">Tỉnh / Thành</label>
            <div class="col-sm-5">
                <select name="province_id" class="form-control">
                    <option value="">-- Chọn tỉnh / thành --</option>

                    @foreach($provinces as $provinceItem)
                        @php
                            $provinceName = $provinceItem->translations->where('locale', 'vi')->first()?->name;
                        @endphp

                        <option value="{{ $provinceItem->id }}"
                            {{ old('province_id', $isEdit ? $restaurant->province_id : '') == $provinceItem->id ? 'selected' : '' }}>
                            {{ $provinceName ?? $provinceItem->slug }}
                        </option>
                    @endforeach
                </select>

                @error('province_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Điểm đến</label>
            <div class="col-sm-5">
                <select name="destination_id" class="form-control">
                    <option value="">-- Chọn điểm đến --</option>

                    @foreach($destinations as $destinationItem)
                        @php
                            $destinationName = $destinationItem->translations->where('locale', 'vi')->first()?->name;
                        @endphp

                        <option value="{{ $destinationItem->id }}"
                            {{ old('destination_id', $isEdit ? $restaurant->destination_id : '') == $destinationItem->id ? 'selected' : '' }}>
                            {{ $destinationName ?? $destinationItem->slug }}
                        </option>
                    @endforeach
                </select>

                @error('destination_id')
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
                       value="{{ old('slug', $isEdit ? $restaurant->slug : '') }}"
                       placeholder="VD: nha-hang-da-lat">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Loại ẩm thực</label>
            <div class="col-sm-5">
                <select name="cuisine_type" class="form-control">
                    <option value="">-- Chọn loại ẩm thực --</option>

                    @foreach($cuisineTypes as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('cuisine_type', $isEdit ? $restaurant->cuisine_type : '') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>

                @error('cuisine_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Khoảng giá</label>
            <div class="col-sm-5">
                <input type="text"
                       name="price_range"
                       class="form-control"
                       value="{{ old('price_range', $isEdit ? $restaurant->price_range : '') }}"
                       placeholder="VD: 100.000đ - 300.000đ / người">

                @error('price_range')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Giờ mở cửa</label>
            <div class="col-sm-5">
                <input type="text"
                       name="opening_hours"
                       class="form-control"
                       value="{{ old('opening_hours', $isEdit ? $restaurant->opening_hours : '') }}"
                       placeholder="VD: 07:00 - 22:00">

                @error('opening_hours')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

{{-- Liên hệ & vị trí --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Liên hệ & vị trí</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Số điện thoại</label>
            <div class="col-sm-5">
                <input type="text"
                       name="phone"
                       class="form-control"
                       value="{{ old('phone', $isEdit ? $restaurant->phone : '') }}">

                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Website</label>
            <div class="col-sm-7">
                <input type="text"
                       name="website"
                       class="form-control"
                       value="{{ old('website', $isEdit ? $restaurant->website : '') }}">

                @error('website')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Latitude</label>
            <div class="col-sm-5">
                <input type="text"
                       name="latitude"
                       class="form-control"
                       value="{{ old('latitude', $isEdit ? $restaurant->latitude : '') }}"
                       placeholder="VD: 11.9404">

                @error('latitude')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Longitude</label>
            <div class="col-sm-5">
                <input type="text"
                       name="longitude"
                       class="form-control"
                       value="{{ old('longitude', $isEdit ? $restaurant->longitude : '') }}"
                       placeholder="VD: 108.4583">

                @error('longitude')
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
                    <label class="col-sm-3 control-label">Tên nhà hàng</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[name]"
                               class="form-control"
                               value="{{ old('vi.name', $vi->name ?? '') }}"
                               placeholder="VD: Nhà hàng Cơm Niêu Đà Lạt">

                        @error('vi.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Địa chỉ</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[address]"
                               class="form-control"
                               value="{{ old('vi.address', $vi->address ?? '') }}"
                               placeholder="VD: Trung tâm thành phố Đà Lạt">

                        @error('vi.address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Mô tả ngắn</label>
                    <div class="col-sm-7">
                        <textarea name="vi[short_description]"
                                  class="form-control autogrow"
                                  rows="4"
                                  placeholder="Nhập mô tả ngắn">{{ old('vi.short_description', $vi->short_description ?? '') }}</textarea>

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

            {{-- EN --}}
            <div class="tab-pane" id="content-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Restaurant Name</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[name]"
                               class="form-control"
                               value="{{ old('en.name', $en->name ?? '') }}"
                               placeholder="VD: Da Lat Local Restaurant">

                        @error('en.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[address]"
                               class="form-control"
                               value="{{ old('en.address', $en->address ?? '') }}"
                               placeholder="VD: Da Lat City Center">

                        @error('en.address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Short Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[short_description]"
                                  class="form-control autogrow"
                                  rows="4"
                                  placeholder="Enter short description">{{ old('en.short_description', $en->short_description ?? '') }}</textarea>

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
                       value="{{ old('thumbnail_id', $isEdit ? $restaurant->thumbnail_id : '') }}">

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
                       value="{{ old('banner_id', $isEdit ? $restaurant->banner_id : '') }}">

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
                       value="{{ old('og_image_id', $isEdit ? $restaurant->og_image_id : '') }}">

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

{{-- Gallery --}}
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">Gallery nhà hàng</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Gallery</label>

            <div class="col-sm-8">

                <button type="button"
                        class="btn btn-default"
                        onclick="openMediaWindow('restaurant_gallery')">

                    <i class="entypo-picture"></i>
                    Chọn nhiều ảnh

                </button>

                <div id="restaurant-gallery-preview"
                     style="display:flex;
                            flex-wrap:wrap;
                            gap:10px;
                            margin-top:15px;">

                    @foreach($galleryImages as $image)

                        <div class="gallery-item"
                             style="position:relative;
                                    width:120px;">

                            <input type="hidden"
                                   name="gallery_ids[]"
                                   value="{{ $image->id }}">

                            <img src="{{ asset('storage/' . $image->file_path) }}"
                                 style="width:120px;
                                        height:80px;
                                        object-fit:cover;
                                        border:1px solid #ddd;
                                        padding:3px;">

                            <button type="button"
                                    onclick="this.closest('.gallery-item').remove()"
                                    class="btn btn-danger btn-xs"
                                    style="position:absolute;
                                           top:3px;
                                           right:3px;">

                                ×

                            </button>

                        </div>

                    @endforeach

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

            {{-- SEO VI --}}
            <div class="tab-pane active" id="seo-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[meta_title]"
                               class="form-control"
                               value="{{ old('vi.meta_title', $vi->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Description</label>
                    <div class="col-sm-7">
                        <textarea name="vi[meta_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('vi.meta_description', $vi->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Keywords</label>
                    <div class="col-sm-7">
                        <textarea name="vi[meta_keywords]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('vi.meta_keywords', $vi->meta_keywords ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[og_title]"
                               class="form-control"
                               value="{{ old('vi.og_title', $vi->og_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Description</label>
                    <div class="col-sm-7">
                        <textarea name="vi[og_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('vi.og_description', $vi->og_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            {{-- SEO EN --}}
            <div class="tab-pane" id="seo-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[meta_title]"
                               class="form-control"
                               value="{{ old('en.meta_title', $en->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[meta_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('en.meta_description', $en->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Keywords</label>
                    <div class="col-sm-7">
                        <textarea name="en[meta_keywords]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('en.meta_keywords', $en->meta_keywords ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[og_title]"
                               class="form-control"
                               value="{{ old('en.og_title', $en->og_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[og_description]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('en.og_description', $en->og_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- Schema đa ngôn ngữ --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Schema đa ngôn ngữ</div>
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

            @php
                $schemaTypes = [
                    'Restaurant' => 'Restaurant',
                    'FoodEstablishment' => 'FoodEstablishment',
                    'LocalBusiness' => 'LocalBusiness',
                    'Place' => 'Place',
                    'Article' => 'Article',
                    'FAQPage' => 'FAQPage',
                ];
            @endphp

            <div class="tab-pane active" id="schema-tab-vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema Type</label>
                    <div class="col-sm-5">
                        <select name="vi[schema_type]" class="form-control">
                            <option value="">-- Chọn schema type --</option>

                            @foreach($schemaTypes as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('vi.schema_type', $vi->schema_type ?? 'Restaurant') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema Data JSON</label>
                    <div class="col-sm-7">
                        <textarea name="vi[schema_data]"
                                  class="form-control"
                                  rows="7"
                                  placeholder='{"@type":"Restaurant"}'>{{ old('vi.schema_data', isset($vi->schema_data) ? json_encode($vi->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="schema-tab-en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema Type</label>
                    <div class="col-sm-5">
                        <select name="en[schema_type]" class="form-control">
                            <option value="">-- Chọn schema type --</option>

                            @foreach($schemaTypes as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('en.schema_type', $en->schema_type ?? 'Restaurant') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema Data JSON</label>
                    <div class="col-sm-7">
                        <textarea name="en[schema_data]"
                                  class="form-control"
                                  rows="7"
                                  placeholder='{"@type":"Restaurant"}'>{{ old('en.schema_data', isset($en->schema_data) ? json_encode($en->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
                    </div>
                </div>

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
                       value="{{ old('sort_order', $isEdit ? $restaurant->sort_order : 0) }}">

                @error('sort_order')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Nổi bật</label>
            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $isEdit ? $restaurant->is_featured : 0) ? 'checked' : '' }}>
                    Nhà hàng nổi bật
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $isEdit ? $restaurant->is_active : 1) ? 'checked' : '' }}>
                    Hiển thị nhà hàng
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" class="btn btn-primary">
                    <i class="entypo-check"></i>
                    {{ $isEdit ? 'Cập nhật nhà hàng' : 'Lưu nhà hàng' }}
                </button>

                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-default">
                    Quay lại
                </a>
            </div>
        </div>

    </div>
</div>
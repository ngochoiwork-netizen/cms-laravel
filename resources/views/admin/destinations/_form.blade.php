@php
    $isEdit = isset($destination) && $destination;

    $vi = $isEdit ? $destination->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $destination->translations->where('locale', 'en')->first() : null;

    $selectedThumbnail = $isEdit && $destination->thumbnail ? $destination->thumbnail : null;
    $selectedBanner = $isEdit && $destination->banner ? $destination->banner : null;
    $selectedOgImage = $isEdit && $destination->ogImage ? $destination->ogImage : null;

    $selectedStyles = old('travel_styles', $isEdit ? ($destination->travel_styles ?? []) : []);

    $styles = [
        'beach' => 'Biển',
        'mountain' => 'Núi',
        'city' => 'Thành phố',
        'nature' => 'Thiên nhiên',
        'adventure' => 'Khám phá',
        'family' => 'Gia đình',
        'couple' => 'Cặp đôi',
        'honeymoon' => 'Trăng mật',
        'luxury' => 'Cao cấp',
        'budget' => 'Tiết kiệm',
        'food' => 'Ẩm thực',
        'culture' => 'Văn hóa',
        'nightlife' => 'Về đêm',
        'photography' => 'Chụp ảnh',
        'wellness' => 'Nghỉ dưỡng sức khỏe',
        'backpacking' => 'Du lịch bụi',
        'roadtrip' => 'Roadtrip',
    ];
@endphp

{{-- Thông tin điểm đến --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin điểm đến</div>
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
                            {{ old('country_id', $isEdit ? $destination->country_id : '') == $countryItem->id ? 'selected' : '' }}>
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
                            {{ old('province_id', $isEdit ? $destination->province_id : '') == $provinceItem->id ? 'selected' : '' }}>
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
            <label class="col-sm-3 control-label">Slug chính</label>
            <div class="col-sm-5">
                <input type="text"
                       name="slug"
                       class="form-control"
                       value="{{ old('slug', $isEdit ? $destination->slug : '') }}"
                       placeholder="VD: da-lat">

                @error('slug')
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
                       value="{{ old('latitude', $isEdit ? $destination->latitude : '') }}"
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
                       value="{{ old('longitude', $isEdit ? $destination->longitude : '') }}"
                       placeholder="VD: 108.4583">

                @error('longitude')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Thời điểm đẹp nhất</label>
            <div class="col-sm-5">
                <input type="text"
                       name="best_time_to_visit"
                       class="form-control"
                       value="{{ old('best_time_to_visit', $isEdit ? $destination->best_time_to_visit : '') }}"
                       placeholder="VD: Tháng 11 - Tháng 3">

                @error('best_time_to_visit')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Khu vực</label>
            <div class="col-sm-5">
                <input type="text"
                       name="region"
                       class="form-control"
                       value="{{ old('region', $isEdit ? $destination->region : '') }}"
                       placeholder="VD: northern, central, southern">

                @error('region')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Travel Styles</label>
            <div class="col-sm-8">
                @foreach($styles as $value => $label)
                    <label class="checkbox-inline" style="margin-bottom:10px;">
                        <input type="checkbox"
                               name="travel_styles[]"
                               value="{{ $value }}"
                               {{ in_array($value, $selectedStyles ?? []) ? 'checked' : '' }}>
                        {{ $label }}
                    </label>
                @endforeach

                @error('travel_styles')
                    <br><span class="text-danger">{{ $message }}</span>
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
                    <label class="col-sm-3 control-label">Tên điểm đến</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[name]"
                               class="form-control"
                               value="{{ old('vi.name', $vi->name ?? '') }}"
                               placeholder="VD: Đà Lạt">

                        @error('vi.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Slug tiếng Việt</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[slug]"
                               class="form-control"
                               value="{{ old('vi.slug', $vi->slug ?? '') }}"
                               placeholder="VD: da-lat">

                        @error('vi.slug')
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
                               placeholder="VD: Thành phố Đà Lạt, Lâm Đồng">

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
                    <label class="col-sm-3 control-label">Destination Name</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[name]"
                               class="form-control"
                               value="{{ old('en.name', $en->name ?? '') }}"
                               placeholder="VD: Da Lat">

                        @error('en.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">English Slug</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[slug]"
                               class="form-control"
                               value="{{ old('en.slug', $en->slug ?? '') }}"
                               placeholder="VD: da-lat">

                        @error('en.slug')
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
                               placeholder="VD: Da Lat City, Lam Dong">

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
                       value="{{ old('thumbnail_id', $isEdit ? $destination->thumbnail_id : '') }}">

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
                       value="{{ old('banner_id', $isEdit ? $destination->banner_id : '') }}">

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
                       value="{{ old('og_image_id', $isEdit ? $destination->og_image_id : '') }}">

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
                    <label class="col-sm-3 control-label">Canonical URL</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[canonical_url]"
                               class="form-control"
                               value="{{ old('vi.canonical_url', $vi->canonical_url ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Robots</label>
                    <div class="col-sm-5">
                        <input type="text"
                               name="vi[robots]"
                               class="form-control"
                               value="{{ old('vi.robots', $vi->robots ?? 'index, follow') }}">
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
                    <label class="col-sm-3 control-label">Canonical URL</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[canonical_url]"
                               class="form-control"
                               value="{{ old('en.canonical_url', $en->canonical_url ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Robots</label>
                    <div class="col-sm-5">
                        <input type="text"
                               name="en[robots]"
                               class="form-control"
                               value="{{ old('en.robots', $en->robots ?? 'index, follow') }}">
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

            <div class="tab-pane active" id="schema-tab-vi">
            	@php
				    $schemaTypes = [
				        'TouristDestination' => 'TouristDestination',
				        'Place' => 'Place',
				        'LocalBusiness' => 'LocalBusiness',
				        'Article' => 'Article',
				        'TravelAgency' => 'TravelAgency',
				        'FAQPage' => 'FAQPage',
				    ];
				@endphp
                <div class="form-group">
                    <label class="col-sm-3 control-label">Schema Type</label>
                    <div class="col-sm-5">
                        <select name="vi[schema_type]" class="form-control">
						    <option value="">-- Chọn schema type --</option>

						    @foreach($schemaTypes as $value => $label)
						        <option value="{{ $value }}"
						            {{ old('vi.schema_type', $vi->schema_type ?? 'TouristDestination') == $value ? 'selected' : '' }}>
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
                                  placeholder='{"@type":"TouristDestination"}'>{{ old('vi.schema_data', isset($vi->schema_data) ? json_encode($vi->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
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
						            {{ old('en.schema_type', $en->schema_type ?? 'TouristDestination') == $value ? 'selected' : '' }}>
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
                                  placeholder='{"@type":"TouristDestination"}'>{{ old('en.schema_data', isset($en->schema_data) ? json_encode($en->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
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
            <label class="col-sm-3 control-label">Excerpt hệ thống</label>
            <div class="col-sm-7">
                <textarea name="excerpt"
                          class="form-control autogrow"
                          rows="4">{{ old('excerpt', $isEdit ? $destination->excerpt : '') }}</textarea>

                @error('excerpt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Canonical URL chính</label>
            <div class="col-sm-7">
                <input type="text"
                       name="canonical_url"
                       class="form-control"
                       value="{{ old('canonical_url', $isEdit ? $destination->canonical_url : '') }}">

                @error('canonical_url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Thứ tự sắp xếp</label>
            <div class="col-sm-5">
                <input type="number"
                       name="sort_order"
                       class="form-control"
                       value="{{ old('sort_order', $isEdit ? $destination->sort_order : 0) }}">

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
                           {{ old('is_featured', $isEdit ? $destination->is_featured : 0) ? 'checked' : '' }}>
                    Điểm đến nổi bật
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
                           {{ old('is_active', $isEdit ? $destination->is_active : 1) ? 'checked' : '' }}>
                    Hiển thị điểm đến
                </label>
            </div>
        </div>
        <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-5">
		        <button type="submit" class="btn btn-primary">
		            <i class="entypo-check"></i>
		            {{ $isEdit ? 'Cập nhật điểm đến' : 'Lưu điểm đến' }}
		        </button>

		        <a href="{{ route('admin.destinations.index') }}" class="btn btn-default">
		            Quay lại
		        </a>
		    </div>
		</div>
    </div>
</div>
@php
    $isEdit = isset($product) && $product;

    $vi = $isEdit ? $product->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $product->translations->where('locale', 'en')->first() : null;

    $selectedThumbnail = $isEdit && $product->thumbnail ? $product->thumbnail : null;
    $selectedBanner = $isEdit && $product->banner ? $product->banner : null;
    $selectedOgImage = $isEdit && $product->ogImage ? $product->ogImage : null;

    $galleryImages = $isEdit && $product->galleryImages ? $product->galleryImages : collect();

    $viSpecifications = old('vi.specifications', $vi->specifications ?? []);
    $enSpecifications = old('en.specifications', $en->specifications ?? []);

    $viFeatures = old('vi.features', $vi->features ?? []);
    $enFeatures = old('en.features', $en->features ?? []);

    $selectedTags = old('tag_ids', $isEdit ? $product->tags->pluck('id')->toArray() : []);
@endphp

{{-- Thông tin sản phẩm --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin sản phẩm</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Danh mục</label>
            <div class="col-sm-5">
                <select name="category_id" class="form-control">
                    <option value="">-- Chọn danh mục --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}"
                            {{ old('category_id', $isEdit ? $product->category_id : '') == $category['id'] ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
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
                       value="{{ old('slug', $isEdit ? $product->slug : '') }}"
                       placeholder="VD: vali-du-lich-cao-cap">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">SKU</label>
            <div class="col-sm-5">
                <input type="text"
                       name="sku"
                       class="form-control"
                       value="{{ old('sku', $isEdit ? $product->sku : '') }}"
                       placeholder="VD: SP001">

                @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Thương hiệu</label>
            <div class="col-sm-5">
                <input type="text"
                       name="brand"
                       class="form-control"
                       value="{{ old('brand', $isEdit ? $product->brand : '') }}"
                       placeholder="VD: Travel Gear">

                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Model</label>
            <div class="col-sm-5">
                <input type="text"
                       name="model"
                       class="form-control"
                       value="{{ old('model', $isEdit ? $product->model : '') }}"
                       placeholder="VD: TG-2026">

                @error('model')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Bảo hành</label>
            <div class="col-sm-5">
                <input type="text"
                       name="warranty"
                       class="form-control"
                       value="{{ old('warranty', $isEdit ? $product->warranty : '') }}"
                       placeholder="VD: 12 tháng">

                @error('warranty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>
{{-- Giá bán & trạng thái --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Giá bán & trạng thái</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Giá bán</label>
            <div class="col-sm-5">
                <input type="number"
                       name="price"
                       class="form-control"
                       value="{{ old('price', $isEdit ? $product->price : '') }}"
                       placeholder="VD: 500000">

                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Giá khuyến mãi</label>
            <div class="col-sm-5">
                <input type="number"
                       name="sale_price"
                       class="form-control"
                       value="{{ old('sale_price', $isEdit ? $product->sale_price : '') }}"
                       placeholder="VD: 450000">

                @error('sale_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Số lượng tồn kho</label>
            <div class="col-sm-5">
                <input type="number"
                       name="stock_quantity"
                       class="form-control"
                       value="{{ old('stock_quantity', $isEdit ? $product->stock_quantity : 0) }}">

                @error('stock_quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Trạng thái bài</label>
            <div class="col-sm-5">
                <select name="status" class="form-control">
                    <option value="draft" {{ old('status', $isEdit ? $product->status : 'draft') == 'draft' ? 'selected' : '' }}>
                        Nháp
                    </option>
                    <option value="published" {{ old('status', $isEdit ? $product->status : '') == 'published' ? 'selected' : '' }}>
                        Xuất bản
                    </option>
                    <option value="archived" {{ old('status', $isEdit ? $product->status : '') == 'archived' ? 'selected' : '' }}>
                        Lưu trữ
                    </option>
                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Tùy chọn</label>
            <div class="col-sm-7">

                <div class="checkbox checkbox-replace">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $isEdit ? $product->is_featured : 0) ? 'checked' : '' }}>
                    <label>Sản phẩm nổi bật</label>
                </div>

                <div class="checkbox checkbox-replace">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $isEdit ? $product->is_active : 1) ? 'checked' : '' }}>
                    <label>Hiển thị ngoài website</label>
                </div>

            </div>
        </div>

    </div>
</div>
{{-- Nội dung đa ngôn ngữ --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Nội dung sản phẩm</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#product_vi" data-toggle="tab">Tiếng Việt</a>
            </li>
            <li>
                <a href="#product_en" data-toggle="tab">English</a>
            </li>
        </ul>

        <div class="tab-content">

            {{-- VI --}}
            <div class="tab-pane active" id="product_vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text"
                               name="vi[name]"
                               class="form-control"
                               value="{{ old('vi.name', $vi->name ?? '') }}"
                               placeholder="Nhập tên sản phẩm">

                        @error('vi.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8">
                        <textarea name="vi[short_description]"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Nhập mô tả ngắn">{{ old('vi.short_description', $vi->short_description ?? '') }}</textarea>

                        @error('vi.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Mô tả chi tiết</label>
                    <div class="col-sm-9">
                        <textarea name="vi[description]"
                                  id="vi_description"
                                  class="form-control"
                                  rows="10">{{ old('vi.description', $vi->description ?? '') }}</textarea>

                        @error('vi.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- EN --}}
            <div class="tab-pane" id="product_en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text"
                               name="en[name]"
                               class="form-control"
                               value="{{ old('en.name', $en->name ?? '') }}"
                               placeholder="Enter product name">

                        @error('en.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Short Description</label>
                    <div class="col-sm-8">
                        <textarea name="en[short_description]"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter short description">{{ old('en.short_description', $en->short_description ?? '') }}</textarea>

                        @error('en.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="en[description]"
                                  id="en_description"
                                  class="form-control"
                                  rows="10">{{ old('en.description', $en->description ?? '') }}</textarea>

                        @error('en.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- Hình ảnh sản phẩm --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Hình ảnh sản phẩm</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        {{-- Thumbnail --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh đại diện</label>
            <div class="col-sm-7">
                <input type="hidden"
                       name="thumbnail_id"
                       id="thumbnail_id"
                       value="{{ old('thumbnail_id', $isEdit ? $product->thumbnail_id : '') }}">

                <button type="button"
                        class="btn btn-info"
                        onclick="openMediaWindow('thumbnail_id')">
                    <i class="entypo-picture"></i>
                    Chọn ảnh
                </button>

                <div id="thumbnail_id_preview" style="margin-top:10px;">
                    @if($selectedThumbnail)
                        <img src="{{ asset('storage/' . $selectedThumbnail->file_path) }}"
                             style="width:160px;height:110px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">
                    @endif
                </div>

                @error('thumbnail_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Banner --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh banner</label>
            <div class="col-sm-7">
                <input type="hidden"
                       name="banner_id"
                       id="banner_id"
                       value="{{ old('banner_id', $isEdit ? $product->banner_id : '') }}">

                <button type="button"
                        class="btn btn-info"
                        onclick="openMediaWindow('banner_id')">
                    <i class="entypo-picture"></i>
                    Chọn banner
                </button>

                <div id="banner_id_preview" style="margin-top:10px;">
                    @if($selectedBanner)
                        <img src="{{ asset('storage/' . $selectedBanner->file_path) }}"
                             style="width:220px;height:100px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">
                    @endif
                </div>

                @error('banner_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- OG Image --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh Open Graph</label>
            <div class="col-sm-7">
                <input type="hidden"
                       name="og_image_id"
                       id="og_image_id"
                       value="{{ old('og_image_id', $isEdit ? $product->og_image_id : '') }}">

                <button type="button"
                        class="btn btn-info"
                        onclick="openMediaWindow('og_image_id')">
                    <i class="entypo-picture"></i>
                    Chọn ảnh OG
                </button>

                <div id="og_image_id_preview" style="margin-top:10px;">
                    @if($selectedOgImage)
                        <img src="{{ asset('storage/' . $selectedOgImage->file_path) }}"
                             style="width:160px;height:110px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">
                    @endif
                </div>

                @error('og_image_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Gallery --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Gallery sản phẩm</label>
            <div class="col-sm-9">

                <button type="button"
                        class="btn btn-info"
                        onclick="openMediaWindow('product_gallery')">
                    <i class="entypo-picture"></i>
                    Thêm ảnh gallery
                </button>

                <div id="product-gallery-preview" style="margin-top:15px;">
                    @foreach($galleryImages as $image)
                        <div class="gallery-item" style="display:inline-block;margin:5px;position:relative;">
                            <input type="hidden" name="gallery_ids[]" value="{{ $image->id }}">

                            <img src="{{ asset('storage/' . $image->file_path) }}"
                                 style="width:110px;height:85px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">

                            <button type="button"
                                    class="btn btn-danger btn-xs remove-gallery-image"
                                    style="position:absolute;top:2px;right:2px;">
                                x
                            </button>
                        </div>
                    @endforeach
                </div>

                @error('gallery_ids')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
        </div>

    </div>
</div>
{{-- Features --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Tính năng nổi bật</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#features_vi" data-toggle="tab">
                    Tiếng Việt
                </a>
            </li>

            <li>
                <a href="#features_en" data-toggle="tab">
                    English
                </a>
            </li>
        </ul>

        <div class="tab-content">

            {{-- VI --}}
            <div class="tab-pane active" id="features_vi">

                <div id="vi-features-wrapper">

                    @if(count($viFeatures))
                        @foreach($viFeatures as $feature)

                            <div class="feature-item panel panel-default">
                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-11">
                                            <input type="text"
                                                   name="vi[features][]"
                                                   class="form-control"
                                                   value="{{ $feature }}"
                                                   placeholder="Nhập tính năng">
                                        </div>

                                        <div class="col-md-1 text-right">
                                            <button type="button"
                                                    class="btn btn-danger remove-feature">
                                                <i class="entypo-trash"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <button type="button"
                        class="btn btn-default add-feature-btn"
                        data-target="vi-features-wrapper"
                        data-name="vi[features][]">
                    <i class="entypo-plus"></i>
                    Thêm tính năng
                </button>

            </div>

            {{-- EN --}}
            <div class="tab-pane" id="features_en">

                <div id="en-features-wrapper">

                    @if(count($enFeatures))
                        @foreach($enFeatures as $feature)

                            <div class="feature-item panel panel-default">
                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-11">
                                            <input type="text"
                                                   name="en[features][]"
                                                   class="form-control"
                                                   value="{{ $feature }}"
                                                   placeholder="Enter feature">
                                        </div>

                                        <div class="col-md-1 text-right">
                                            <button type="button"
                                                    class="btn btn-danger remove-feature">
                                                <i class="entypo-trash"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <button type="button"
                        class="btn btn-default add-feature-btn"
                        data-target="en-features-wrapper"
                        data-name="en[features][]">
                    <i class="entypo-plus"></i>
                    Add feature
                </button>

            </div>

        </div>

    </div>
</div>
{{-- Specifications --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông số kỹ thuật</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#specifications_vi" data-toggle="tab">
                    Tiếng Việt
                </a>
            </li>

            <li>
                <a href="#specifications_en" data-toggle="tab">
                    English
                </a>
            </li>
        </ul>

        <div class="tab-content">

            {{-- VI --}}
            <div class="tab-pane active" id="specifications_vi">

                <div id="vi-specifications-wrapper">

                    @if(count($viSpecifications))
                        @foreach($viSpecifications as $index => $spec)

                            <div class="specification-item panel panel-default">
                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-5">
                                            <input type="text"
                                                   name="vi[specifications][{{ $index }}][key]"
                                                   class="form-control"
                                                   value="{{ $spec['key'] ?? '' }}"
                                                   placeholder="Tên thông số">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text"
                                                   name="vi[specifications][{{ $index }}][value]"
                                                   class="form-control"
                                                   value="{{ $spec['value'] ?? '' }}"
                                                   placeholder="Giá trị">
                                        </div>

                                        <div class="col-md-1 text-right">
                                            <button type="button"
                                                    class="btn btn-danger remove-specification">
                                                <i class="entypo-trash"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <button type="button"
                        class="btn btn-default add-specification-btn"
                        data-locale="vi">
                    <i class="entypo-plus"></i>
                    Thêm thông số
                </button>

            </div>

            {{-- EN --}}
            <div class="tab-pane" id="specifications_en">

                <div id="en-specifications-wrapper">

                    @if(count($enSpecifications))
                        @foreach($enSpecifications as $index => $spec)

                            <div class="specification-item panel panel-default">
                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-5">
                                            <input type="text"
                                                   name="en[specifications][{{ $index }}][key]"
                                                   class="form-control"
                                                   value="{{ $spec['key'] ?? '' }}"
                                                   placeholder="Specification">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text"
                                                   name="en[specifications][{{ $index }}][value]"
                                                   class="form-control"
                                                   value="{{ $spec['value'] ?? '' }}"
                                                   placeholder="Value">
                                        </div>

                                        <div class="col-md-1 text-right">
                                            <button type="button"
                                                    class="btn btn-danger remove-specification">
                                                <i class="entypo-trash"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>

                <button type="button"
                        class="btn btn-default add-specification-btn"
                        data-locale="en">
                    <i class="entypo-plus"></i>
                    Add specification
                </button>

            </div>

        </div>

    </div>
</div>

{{-- Tags --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Tags sản phẩm</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Tags</label>

            <div class="col-sm-7">

                <select name="tag_ids[]"
                        class="form-control select2"
                        multiple>

                    @foreach($tags as $tag)

                        @php
                            $tagName = $tag->vi->name ?? $tag->slug;
                        @endphp

                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                            {{ $tagName }}
                        </option>

                    @endforeach

                </select>

                @error('tag_ids')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
        </div>

    </div>
</div>

{{-- SEO --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">SEO & Open Graph</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#seo_vi" data-toggle="tab">
                    Tiếng Việt
                </a>
            </li>

            <li>
                <a href="#seo_en" data-toggle="tab">
                    English
                </a>
            </li>
        </ul>

        <div class="tab-content">

            {{-- SEO VI --}}
            <div class="tab-pane active" id="seo_vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Title</label>

                    <div class="col-sm-8">
                        <input type="text"
                               name="vi[meta_title]"
                               class="form-control"
                               value="{{ old('vi.meta_title', $vi->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Description</label>

                    <div class="col-sm-8">
                        <textarea name="vi[meta_description]"
                                  class="form-control"
                                  rows="4">{{ old('vi.meta_description', $vi->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Keywords</label>

                    <div class="col-sm-8">
                        <input type="text"
                               name="vi[meta_keywords]"
                               class="form-control"
                               value="{{ old('vi.meta_keywords', $vi->meta_keywords ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Title</label>

                    <div class="col-sm-8">
                        <input type="text"
                               name="vi[og_title]"
                               class="form-control"
                               value="{{ old('vi.og_title', $vi->og_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Description</label>

                    <div class="col-sm-8">
                        <textarea name="vi[og_description]"
                                  class="form-control"
                                  rows="4">{{ old('vi.og_description', $vi->og_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            {{-- SEO EN --}}
            <div class="tab-pane" id="seo_en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Title</label>

                    <div class="col-sm-8">
                        <input type="text"
                               name="en[meta_title]"
                               class="form-control"
                               value="{{ old('en.meta_title', $en->meta_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Description</label>

                    <div class="col-sm-8">
                        <textarea name="en[meta_description]"
                                  class="form-control"
                                  rows="4">{{ old('en.meta_description', $en->meta_description ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Keywords</label>

                    <div class="col-sm-8">
                        <input type="text"
                               name="en[meta_keywords]"
                               class="form-control"
                               value="{{ old('en.meta_keywords', $en->meta_keywords ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Title</label>

                    <div class="col-sm-8">
                        <input type="text"
                               name="en[og_title]"
                               class="form-control"
                               value="{{ old('en.og_title', $en->og_title ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Description</label>

                    <div class="col-sm-8">
                        <textarea name="en[og_description]"
                                  class="form-control"
                                  rows="4">{{ old('en.og_description', $en->og_description ?? '') }}</textarea>
                    </div>
                </div>

            </div>

        </div>

        <hr>

        <div class="form-group">
            <label class="col-sm-3 control-label">Canonical URL</label>

            <div class="col-sm-8">
                <input type="text"
                       name="canonical_url"
                       class="form-control"
                       value="{{ old('canonical_url', $isEdit ? $product->canonical_url : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Robots</label>

            <div class="col-sm-5">
                <input type="text"
                       name="robots"
                       class="form-control"
                       value="{{ old('robots', $isEdit ? $product->robots : 'index, follow') }}">
            </div>
        </div>

    </div>
</div>

{{-- Schema --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Schema</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema Type</label>

            <div class="col-sm-5">
                <select name="schema_type" class="form-control">

                    <option value="">
                        -- Chọn schema --
                    </option>

                    <option value="Product"
                        {{ old('schema_type', $isEdit ? $product->schema_type : '') == 'Product' ? 'selected' : '' }}>
                        Product
                    </option>

                    <option value="WebPage"
                        {{ old('schema_type', $isEdit ? $product->schema_type : '') == 'WebPage' ? 'selected' : '' }}>
                        WebPage
                    </option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema JSON</label>

            <div class="col-sm-8">

                <textarea name="schema_data"
                          class="form-control"
                          rows="10">@if(old('schema_data'))
{{ old('schema_data') }}
@elseif($isEdit && $product->schema_data)
{{ json_encode($product->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
@endif</textarea>

            </div>
        </div>

    </div>
</div>

{{-- Submit --}}
<div class="form-group default-padding">
    <div class="col-sm-offset-3 col-sm-9">

        <button type="submit" class="btn btn-success">
            <i class="entypo-check"></i>

            {{ $isEdit ? 'Cập nhật sản phẩm' : 'Tạo sản phẩm' }}
        </button>

        <a href="{{ route('admin.products.index') }}"
           class="btn btn-default">
            Quay lại
        </a>

    </div>
</div>
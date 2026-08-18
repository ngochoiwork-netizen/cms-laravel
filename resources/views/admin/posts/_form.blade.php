@php
    $isEdit = isset($post) && $post;

    $vi = $isEdit ? $post->translations->where('locale', 'vi')->first() : null;
    $en = $isEdit ? $post->translations->where('locale', 'en')->first() : null;

    $selectedThumbnail = $isEdit && $post->thumbnail ? $post->thumbnail : null;
    $selectedBanner = $isEdit && $post->banner ? $post->banner : null;
    $selectedOgImage = $isEdit && $post->ogImage ? $post->ogImage : null;

    $selectedTags = $selectedTags ?? [];

    $schemaTypes = [
        'Article' => 'Article',
        'BlogPosting' => 'BlogPosting',
        'NewsArticle' => 'NewsArticle',
        'TravelAction' => 'TravelAction',
        'FAQPage' => 'FAQPage',
        'WebPage' => 'WebPage',
    ];
@endphp

{{-- Thông tin bài viết --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin bài viết</div>
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

                    @foreach($categories as $categoryItem)
                        @php
                            $categoryName = $categoryItem->translations->where('locale', 'vi')->first()?->name;
                        @endphp

                        <option value="{{ $categoryItem->id }}"
                            {{ old('category_id', $isEdit ? $post->category_id : '') == $categoryItem->id ? 'selected' : '' }}>
                            {{ $categoryName ?? $categoryItem->slug }}
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
                       value="{{ old('slug', $isEdit ? $post->slug : '') }}"
                       placeholder="VD: kinh-nghiem-du-lich-da-lat">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Tags</label>
            <div class="col-sm-7">

                @php
                    $tagValues = [];

                    if ($isEdit && $post->tags) {
                        foreach ($post->tags as $tag) {
                            $tagName = $tag->translations->where('locale', 'vi')->first()?->name;
                            $tagValues[] = $tagName ?? $tag->slug;
                        }
                    }
                @endphp

                <input type="hidden"
                       name="tag_ids"
                       id="tag_ids"
                       value="{{ old('tag_ids', implode(',', $tagValues)) }}">

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Ngày đăng</label>
            <div class="col-sm-5">
                <input type="datetime-local"
                       name="published_at"
                       class="form-control"
                       value="{{ old('published_at', $isEdit && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">

                @error('published_at')
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
                               placeholder="VD: Kinh nghiệm du lịch Đà Lạt tự túc">

                        @error('vi.title')
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
                        <textarea name="vi[content]"
                                  id="vi_content"
                                  class="form-control ckeditor"
                                  rows="12">{{ old('vi.content', $vi->content ?? '') }}</textarea>

                        @error('vi.content')
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
                               placeholder="VD: Da Lat Travel Guide">

                        @error('en.title')
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
                    <label class="col-sm-3 control-label">Content</label>
                    <div class="col-sm-8">
                        <textarea name="en[content]"
                                  id="en_content"
                                  class="form-control ckeditor"
                                  rows="12">{{ old('en.content', $en->content ?? '') }}</textarea>

                        @error('en.content')
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
                       value="{{ old('thumbnail_id', $isEdit ? $post->thumbnail_id : '') }}">

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
            </div>
        </div>

        {{-- Banner --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">Banner</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="banner_id"
                       id="banner_id"
                       value="{{ old('banner_id', $isEdit ? $post->banner_id : '') }}">

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
            </div>
        </div>

        {{-- OG Image --}}
        <div class="form-group">
            <label class="col-sm-3 control-label">OG Image</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="og_image_id"
                       id="og_image_id"
                       value="{{ old('og_image_id', $isEdit ? $post->og_image_id : '') }}">

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

                <div class="form-group">
                    <label class="col-sm-3 control-label">AI Overview</label>
                    <div class="col-sm-7">
                        <textarea name="vi[ai_overview]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('vi.ai_overview', $vi->ai_overview ?? '') }}</textarea>
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

                <div class="form-group">
                    <label class="col-sm-3 control-label">AI Overview</label>
                    <div class="col-sm-7">
                        <textarea name="en[ai_overview]"
                                  class="form-control autogrow"
                                  rows="4">{{ old('en.ai_overview', $en->ai_overview ?? '') }}</textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- Schema --}}
<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Schema & Robots</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Canonical URL</label>
            <div class="col-sm-7">
                <input type="text"
                       name="canonical_url"
                       class="form-control"
                       value="{{ old('canonical_url', $isEdit ? $post->canonical_url : '') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Robots</label>
            <div class="col-sm-5">
                <select name="robots" class="form-control">
                    <option value="">-- Mặc định --</option>
                    <option value="index,follow" {{ old('robots', $isEdit ? $post->robots : '') == 'index,follow' ? 'selected' : '' }}>index,follow</option>
                    <option value="noindex,follow" {{ old('robots', $isEdit ? $post->robots : '') == 'noindex,follow' ? 'selected' : '' }}>noindex,follow</option>
                    <option value="noindex,nofollow" {{ old('robots', $isEdit ? $post->robots : '') == 'noindex,nofollow' ? 'selected' : '' }}>noindex,nofollow</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema Type</label>
            <div class="col-sm-5">
                <select name="schema_type" class="form-control">
                    @foreach($schemaTypes as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('schema_type', $isEdit ? $post->schema_type : 'Article') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema Data JSON</label>
            <div class="col-sm-7">
                <textarea name="schema_data"
                          class="form-control"
                          rows="7"
                          placeholder='{"@type":"Article"}'>{{ old('schema_data', $isEdit && $post->schema_data ? json_encode($post->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
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
                       value="{{ old('sort_order', $isEdit ? $post->sort_order : 0) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Nổi bật</label>
            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $isEdit ? $post->is_featured : 0) ? 'checked' : '' }}>
                    Bài viết nổi bật
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
                           {{ old('is_active', $isEdit ? $post->is_active : 1) ? 'checked' : '' }}>
                    Hiển thị bài viết
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" class="btn btn-primary">
                    <i class="entypo-check"></i>
                    {{ $isEdit ? 'Cập nhật bài viết' : 'Lưu bài viết' }}
                </button>

                <a href="{{ route('admin.posts.index') }}" class="btn btn-default">
                    Quay lại
                </a>
            </div>
        </div>

    </div>
</div>
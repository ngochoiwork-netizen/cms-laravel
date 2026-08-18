@php
    $isEdit = isset($post) && $post;

    $selectedThumbnail = $isEdit && $post->thumbnail ? $post->thumbnail : null;
    $selectedOgImage = $isEdit && $post->ogImage ? $post->ogImage : null;

    $statusValue = old('status', $isEdit ? $post->status : 'draft');
    $robotsValue = old('robots', $isEdit ? $post->robots : 'index, follow');
@endphp

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Nội dung bài viết</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-2 control-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input type="text"
                       name="title"
                       id="title"
                       value="{{ old('title', $isEdit ? $post->title : '') }}"
                       class="form-control input-lg"
                       placeholder="Nhập tiêu đề bài viết">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nội dung</label>
            <div class="col-sm-10">
                <textarea name="content"
                      id="content"
                      class="form-control"
                      rows="15">{{ old('content', $isEdit ? $post->content : '') }}</textarea>

                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Thông tin bài viết</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Danh mục</label>
            <div class="col-sm-5">
                <select name="category_id" class="form-control">
                    <option value="">-- Chọn danh mục --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $isEdit ? $post->category_id : '') == $category->id ? 'selected' : '' }}>
                            {!! str_repeat('&mdash; ', $category->level ?? 0) !!}
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Slug</label>
            <div class="col-sm-5">
                <input type="text"
                       name="slug"
                       id="slug"
                       value="{{ old('slug', $isEdit ? $post->slug : '') }}"
                       class="form-control"
                       placeholder="Có thể bỏ trống để tự tạo">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Mô tả ngắn</label>
            <div class="col-sm-7">
                <textarea name="excerpt"
                          class="form-control autogrow"
                          rows="4"
                          placeholder="Nhập mô tả ngắn">{{ old('excerpt', $isEdit ? $post->excerpt : '') }}</textarea>

                @error('excerpt')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Hình ảnh</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh đại diện</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="thumbnail_id"
                       id="thumbnail_id"
                       value="{{ old('thumbnail_id', $isEdit ? $post->thumbnail_id : '') }}">

                <div style="margin-bottom: 10px;">
                    <img id="thumbnail_id_preview"
                         src="{{ $selectedThumbnail ? asset('storage/' . $selectedThumbnail->file_path) : '' }}"
                         style="max-width: 160px; max-height: 100px; {{ $selectedThumbnail ? '' : 'display:none;' }}">
                </div>

                <button type="button"
                        class="btn btn-default"
                        onclick="openMediaWindow('thumbnail_id')">
                    <i class="entypo-picture"></i>
                    Chọn ảnh
                </button>

                <button type="button"
                        class="btn btn-danger"
                        onclick="removePostImage('thumbnail_id')">
                    Xóa ảnh
                </button>

                @error('thumbnail_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Ảnh OG Image</label>
            <div class="col-sm-5">
                <input type="hidden"
                       name="og_image_id"
                       id="og_image_id"
                       value="{{ old('og_image_id', $isEdit ? $post->og_image_id : '') }}">

                <div style="margin-bottom: 10px;">
                    <img id="og_image_id_preview"
                         src="{{ $selectedOgImage ? asset('storage/' . $selectedOgImage->file_path) : '' }}"
                         style="max-width: 160px; max-height: 100px; {{ $selectedOgImage ? '' : 'display:none;' }}">
                </div>

                <button type="button"
                        class="btn btn-default"
                        onclick="openMediaWindow('og_image_id')">
                    <i class="entypo-picture"></i>
                    Chọn ảnh
                </button>

                <button type="button"
                        class="btn btn-danger"
                        onclick="removePostImage('og_image_id')">
                    Xóa ảnh
                </button>

                @error('og_image_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Cài đặt đăng bài</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Trạng thái</label>
            <div class="col-sm-5">
                <select name="status" class="form-control">
                    <option value="draft" {{ $statusValue == 'draft' ? 'selected' : '' }}>Nháp</option>
                    <option value="published" {{ $statusValue == 'published' ? 'selected' : '' }}>Xuất bản</option>
                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Ngày xuất bản</label>
            <div class="col-sm-5">
                <input type="datetime-local"
                       name="published_at"
                       value="{{ old('published_at', $isEdit && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                       class="form-control">

                @error('published_at')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Bài nổi bật</label>
            <div class="col-sm-5">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $isEdit ? $post->is_featured : 0) ? 'checked' : '' }}>
                    Đánh dấu bài viết nổi bật
                </label>
            </div>
        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">SEO</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Meta Title</label>
            <div class="col-sm-7">
                <input type="text"
                       name="meta_title"
                       value="{{ old('meta_title', $isEdit ? $post->meta_title : '') }}"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Meta Description</label>
            <div class="col-sm-7">
                <textarea name="meta_description"
                          class="form-control autogrow"
                          rows="4">{{ old('meta_description', $isEdit ? $post->meta_description : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Meta Keywords</label>
            <div class="col-sm-7">
                <input type="text"
                       name="meta_keywords"
                       value="{{ old('meta_keywords', $isEdit ? $post->meta_keywords : '') }}"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Canonical URL</label>
            <div class="col-sm-7">
                <input type="text"
                       name="canonical_url"
                       value="{{ old('canonical_url', $isEdit ? $post->canonical_url : '') }}"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Robots</label>
            <div class="col-sm-5">
                <select name="robots" class="form-control">
                    <option value="index, follow" {{ $robotsValue == 'index, follow' ? 'selected' : '' }}>index, follow</option>
                    <option value="noindex, follow" {{ $robotsValue == 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
                    <option value="index, nofollow" {{ $robotsValue == 'index, nofollow' ? 'selected' : '' }}>index, nofollow</option>
                    <option value="noindex, nofollow" {{ $robotsValue == 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                </select>
            </div>
        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">Open Graph</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">OG Title</label>
            <div class="col-sm-7">
                <input type="text"
                       name="og_title"
                       value="{{ old('og_title', $isEdit ? $post->og_title : '') }}"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">OG Description</label>
            <div class="col-sm-7">
                <textarea name="og_description"
                          class="form-control autogrow"
                          rows="4">{{ old('og_description', $isEdit ? $post->og_description : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema Type</label>
            <div class="col-sm-5">
                @php
                    $schemaTypeValue = old('schema_type', $isEdit ? $post->schema_type : 'Article');
                @endphp

                <select name="schema_type" class="form-control">
                    <option value="Article" {{ $schemaTypeValue == 'Article' ? 'selected' : '' }}>Article</option>
                    <option value="BlogPosting" {{ $schemaTypeValue == 'BlogPosting' ? 'selected' : '' }}>BlogPosting</option>
                    <option value="NewsArticle" {{ $schemaTypeValue == 'NewsArticle' ? 'selected' : '' }}>NewsArticle</option>
                </select>
            </div>
        </div>

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
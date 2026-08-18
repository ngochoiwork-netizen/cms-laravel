@php
    $isEdit = isset($page) && $page;
    $vi = $translations['vi'] ?? null;
    $en = $translations['en'] ?? null;
@endphp

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">NỘI DUNG TRANG</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#tab_vi" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-doc-text"></i></span>
                    <span class="hidden-xs">Tiếng Việt</span>
                </a>
            </li>

            <li>
                <a href="#tab_en" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-doc-text"></i></span>
                    <span class="hidden-xs">English</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="tab_vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tiêu đề <span class="text-danger">*</span></label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[title]"
                               value="{{ old('vi.title', optional($vi)->title) }}"
                               class="form-control input-lg">

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
                               value="{{ old('vi.subtitle', optional($vi)->subtitle) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Mô tả ngắn</label>
                    <div class="col-sm-7">
                        <textarea name="vi[excerpt]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('vi.excerpt', optional($vi)->excerpt) }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nội dung</label>
                    <div class="col-sm-9">
                        <textarea name="vi[content]"
                                  id="vi_content"
                                  class="form-control"
                                  rows="10">{{ old('vi.content', optional($vi)->content) }}</textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="tab_en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[title]"
                               value="{{ old('en.title', optional($en)->title) }}"
                               class="form-control input-lg">

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
                               value="{{ old('en.subtitle', optional($en)->subtitle) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Excerpt</label>
                    <div class="col-sm-7">
                        <textarea name="en[excerpt]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('en.excerpt', optional($en)->excerpt) }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Content</label>
                    <div class="col-sm-9">
                        <textarea name="en[content]"
                                  id="en_content"
                                  class="form-control"
                                  rows="10">{{ old('en.content', optional($en)->content) }}</textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">THÔNG TIN TRANG</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Slug</label>
            <div class="col-sm-5">
                <input type="text"
                       name="slug"
                       value="{{ old('slug', $isEdit ? $page->slug : '') }}"
                       class="form-control"
                       placeholder="Tự động tạo nếu để trống">

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Template</label>
            <div class="col-sm-5">
                <select name="template" class="form-control">
                    <option value="default" {{ old('template', $isEdit ? $page->template : 'default') == 'default' ? 'selected' : '' }}>Default</option>
                    <option value="about" {{ old('template', $isEdit ? $page->template : '') == 'about' ? 'selected' : '' }}>Giới thiệu</option>
                    <option value="contact" {{ old('template', $isEdit ? $page->template : '') == 'contact' ? 'selected' : '' }}>Liên hệ</option>
                    <option value="policy" {{ old('template', $isEdit ? $page->template : '') == 'policy' ? 'selected' : '' }}>Chính sách</option>
                    <option value="landing" {{ old('template', $isEdit ? $page->template : '') == 'landing' ? 'selected' : '' }}>Landing Page</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Thứ tự</label>
            <div class="col-sm-3">
                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $isEdit ? $page->sort_order : 0) }}"
                       class="form-control">
            </div>
        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">HÌNH ẢNH</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        @php
            $images = [
                'thumbnail_id' => 'Ảnh đại diện',
                'banner_id' => 'Banner',
                'og_image_id' => 'Ảnh OG Image',
            ];
        @endphp

        @foreach($images as $field => $label)
            @php
                $mediaObj = $isEdit ? $page->{str_replace('_id', '', $field)} ?? null : null;

                if ($field == 'og_image_id') {
                    $mediaObj = $isEdit ? $page->ogImage : null;
                }
            @endphp

            <div class="form-group">
                <label class="col-sm-3 control-label">{{ $label }}</label>
                <div class="col-sm-5">
                    <input type="hidden"
                           name="{{ $field }}"
                           id="{{ $field }}"
                           value="{{ old($field, $isEdit ? $page->{$field} : '') }}">

                    <div style="margin-bottom:10px;">
                        <img id="{{ $field }}_preview"
                             src="{{ $mediaObj ? asset('storage/' . $mediaObj->file_path) : '' }}"
                             style="max-width:200px; {{ $mediaObj ? '' : 'display:none;' }}">
                    </div>

                    <button type="button"
                            class="btn btn-default"
                            onclick="openMediaWindow('{{ $field }}')">
                        <i class="entypo-picture"></i>
                        Chọn ảnh
                    </button>

                    <button type="button"
                            class="btn btn-danger"
                            onclick="removeMedia('{{ $field }}')">
                        <i class="entypo-trash"></i>
                        Xóa
                    </button>
                </div>
            </div>
        @endforeach

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">SEO ĐA NGÔN NGỮ</div>

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
                    <span class="visible-xs"><i class="entypo-search"></i></span>
                    <span class="hidden-xs">SEO Tiếng Việt</span>
                </a>
            </li>

            <li>
                <a href="#seo_en" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-search"></i></span>
                    <span class="hidden-xs">SEO English</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="seo_vi">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[meta_title]"
                               value="{{ old('vi.meta_title', optional($vi)->meta_title) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Description</label>
                    <div class="col-sm-7">
                        <textarea name="vi[meta_description]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('vi.meta_description', optional($vi)->meta_description) }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Keywords</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[meta_keywords]"
                               value="{{ old('vi.meta_keywords', optional($vi)->meta_keywords) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="vi[og_title]"
                               value="{{ old('vi.og_title', optional($vi)->og_title) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Description</label>
                    <div class="col-sm-7">
                        <textarea name="vi[og_description]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('vi.og_description', optional($vi)->og_description) }}</textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="seo_en">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[meta_title]"
                               value="{{ old('en.meta_title', optional($en)->meta_title) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[meta_description]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('en.meta_description', optional($en)->meta_description) }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Meta Keywords</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[meta_keywords]"
                               value="{{ old('en.meta_keywords', optional($en)->meta_keywords) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Title</label>
                    <div class="col-sm-7">
                        <input type="text"
                               name="en[og_title]"
                               value="{{ old('en.og_title', optional($en)->og_title) }}"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">OG Description</label>
                    <div class="col-sm-7">
                        <textarea name="en[og_description]"
                                  class="form-control autogrow"
                                  rows="3">{{ old('en.og_description', optional($en)->og_description) }}</textarea>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
        <div class="panel-title">CÀI ĐẶT SEO & TRẠNG THÁI</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse">
                <i class="entypo-down-open"></i>
            </a>
        </div>
    </div>

    <div class="panel-body">

        <div class="form-group">
            <label class="col-sm-3 control-label">Canonical URL</label>
            <div class="col-sm-7">
                <input type="text"
                       name="canonical_url"
                       value="{{ old('canonical_url', $isEdit ? $page->canonical_url : '') }}"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Robots</label>
            <div class="col-sm-5">
                <select name="robots" class="form-control">
                    @foreach(['index, follow', 'noindex, follow', 'index, nofollow', 'noindex, nofollow'] as $robots)
                        <option value="{{ $robots }}" {{ old('robots', $isEdit ? $page->robots : 'index, follow') == $robots ? 'selected' : '' }}>
                            {{ $robots }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema Type</label>
            <div class="col-sm-5">
                <select name="schema_type" class="form-control">
                    <option value="">None</option>
                    <option value="WebPage" {{ old('schema_type', $isEdit ? $page->schema_type : '') == 'WebPage' ? 'selected' : '' }}>WebPage</option>
                    <option value="AboutPage" {{ old('schema_type', $isEdit ? $page->schema_type : '') == 'AboutPage' ? 'selected' : '' }}>AboutPage</option>
                    <option value="ContactPage" {{ old('schema_type', $isEdit ? $page->schema_type : '') == 'ContactPage' ? 'selected' : '' }}>ContactPage</option>
                    <option value="FAQPage" {{ old('schema_type', $isEdit ? $page->schema_type : '') == 'FAQPage' ? 'selected' : '' }}>FAQPage</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Schema Data JSON</label>
            <div class="col-sm-7">
                <textarea name="schema_data"
                          class="form-control"
                          rows="5">{{ old('schema_data', $isEdit && $page->schema_data ? json_encode($page->schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Kích hoạt</label>
            <div class="col-sm-5">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               {{ old('is_active', $isEdit ? $page->is_active : true) ? 'checked' : '' }}>
                        Hiển thị trang
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-primary">
            <i class="entypo-check"></i>
            {{ $isEdit ? 'Cập nhật trang' : 'Lưu trang' }}
        </button>

        <a href="{{ route('admin.pages.index') }}" class="btn btn-default">
            <i class="entypo-reply"></i>
            Quay lại
        </a>
    </div>
</div>
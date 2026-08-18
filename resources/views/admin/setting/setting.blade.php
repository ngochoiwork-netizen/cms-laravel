@extends('admin.layouts.master-layouts')

@section('content')

<h2>Cài đặt website</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.settings.update') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @foreach($settings as $group => $items)

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    {{ strtoupper($group) }}
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
                        <a href="#{{ $group }}-tab-vi" data-toggle="tab">
                            Tiếng Việt
                        </a>
                    </li>
                    <li>
                        <a href="#{{ $group }}-tab-en" data-toggle="tab">
                            English
                        </a>
                    </li>
                </ul>

                <div class="tab-content" style="padding-top:20px;">

                    @foreach(['vi' => 'Tiếng Việt', 'en' => 'English'] as $locale => $localeLabel)

                        <div class="tab-pane {{ $locale === 'vi' ? 'active' : '' }}"
                             id="{{ $group }}-tab-{{ $locale }}">

                            @foreach($items as $setting)

                                @php
                                    $translation = $setting->translations
                                        ->where('locale', $locale)
                                        ->first();

                                    $value = old(
                                        'settings.' . $setting->id . '.' . $locale,
                                        $translation->value ?? ''
                                    );

                                    $inputId = 'setting_' . $setting->id . '_' . $locale;

                                    $selectedMedia = null;

                                    if ($setting->type === 'image' && isset($media)) {
                                        $selectedMedia = $media->firstWhere('id', (int) $value);
                                    }
                                @endphp

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        {{ $setting->label ?? ucwords(str_replace('_', ' ', $setting->key)) }}
                                    </label>

                                    <div class="col-sm-7">

                                        {{-- TEXT --}}
                                        @if($setting->type === 'text')
                                            <input type="text"
                                                   name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                   id="{{ $inputId }}"
                                                   value="{{ $value }}"
                                                   class="form-control">
                                        @endif

                                        {{-- TEXTAREA --}}
                                        @if($setting->type === 'textarea')
                                            <textarea name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                      id="{{ $inputId }}"
                                                      class="form-control autogrow"
                                                      rows="4">{{ $value }}</textarea>
                                        @endif

                                        {{-- NUMBER --}}
                                        @if($setting->type === 'number')
                                            <input type="number"
                                                   name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                   id="{{ $inputId }}"
                                                   value="{{ $value }}"
                                                   class="form-control">
                                        @endif

                                        {{-- BOOLEAN --}}
                                        @if($setting->type === 'boolean')
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"
                                                           name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                           id="{{ $inputId }}"
                                                           value="1"
                                                           {{ $value == 1 ? 'checked' : '' }}>
                                                    Bật
                                                </label>
                                            </div>
                                        @endif

                                        {{-- IMAGE --}}
                                        @if($setting->type === 'image')

                                            <input type="hidden"
                                                   name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                   id="{{ $inputId }}"
                                                   value="{{ $value }}">

                                            <div style="margin-bottom: 10px;">
                                                <img id="{{ $inputId }}_preview"
                                                     src="{{ $selectedMedia ? asset('storage/' . $selectedMedia->file_path) : '' }}"
                                                     style="max-width: 160px; max-height: 100px; {{ $selectedMedia ? '' : 'display:none;' }}">
                                            </div>

                                            <button type="button"
                                                    class="btn btn-default"
                                                    onclick="openMediaWindow('{{ $inputId }}')">
                                                <i class="entypo-picture"></i> Chọn ảnh
                                            </button>

                                            <button type="button"
                                                    class="btn btn-danger"
                                                    onclick="removeSettingImage('{{ $inputId }}')">
                                                Xóa ảnh
                                            </button>

                                        @endif

                                        {{-- JSON --}}
                                        @if($setting->type === 'json')
                                            <textarea name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                      id="{{ $inputId }}"
                                                      class="form-control"
                                                      rows="6"
                                                      placeholder="Nhập JSON...">{{ $value }}</textarea>
                                        @endif

                                        {{-- CODE --}}
                                        @if($setting->type === 'code')
                                            <textarea name="settings[{{ $setting->id }}][{{ $locale }}]"
                                                      id="{{ $inputId }}"
                                                      class="form-control"
                                                      rows="7"
                                                      placeholder="Nhập script hoặc code...">{{ $value }}</textarea>
                                        @endif

                                        @if($setting->description)
                                            <p class="help-block">
                                                {{ $setting->description }}
                                            </p>
                                        @endif

                                    </div>
                                </div>

                            @endforeach

                        </div>

                    @endforeach

                </div>

            </div>
        </div>

    @endforeach

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-7">
            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Lưu cài đặt
            </button>
        </div>
    </div>

</form>

@endsection

@section('js')
<script>
function openMediaWindow(inputId) {
    window.open(
        '{{ route('admin.media.popup') }}?select=1&input=' + inputId,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function setMedia(inputId, mediaId, mediaUrl) {
    document.getElementById(inputId).value = mediaId;

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = mediaUrl;
        preview.style.display = 'block';
    }
}

function setMediaFromPopup(inputId, media) {
    document.getElementById(inputId).value = media.id;

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = media.url;
        preview.style.display = 'block';
    }
}

function removeSettingImage(inputId) {
    document.getElementById(inputId).value = '';

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>
@endsection
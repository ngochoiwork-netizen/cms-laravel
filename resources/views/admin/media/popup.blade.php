<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chọn ảnh</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons/entypo/css/entypo.css') }}">

    <style>
        body {
            margin: 0;
            padding: 18px;
            background: #f5f6fa;
            font-family: Arial, sans-serif;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 18px;
            border: 1px solid #e5e5e5;
        }

        .popup-header h3 {
            margin: 0;
            font-size: 20px;
        }

        .upload-status {
            display: none;
            background: #fff;
            border: 1px solid #ddd;
            padding: 10px 14px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .upload-status.success {
            display: block;
            border-color: #8dc63f;
            color: #3c763d;
        }

        .upload-status.error {
            display: block;
            border-color: #cc2424;
            color: #a94442;
        }

        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(145px, 1fr));
            gap: 14px;
        }

        .media-card {
            background: #fff;
            border: 2px solid transparent;
            border-radius: 6px;
            padding: 8px;
            cursor: pointer;
            transition: all .2s ease;
            position: relative;
        }

        .media-card:hover {
            border-color: #2c7be5;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }

        .media-card.active {
            border-color: #00a651;
        }

        .media-thumb {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
            background: #eee;
        }

        .media-name {
            margin-top: 7px;
            font-size: 12px;
            line-height: 16px;
            height: 32px;
            overflow: hidden;
            color: #555;
            text-align: center;
        }

        .media-check {
            display: none;
            position: absolute;
            top: 8px;
            right: 8px;
            background: #00a651;
            color: #fff;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
        }

        .media-card.active .media-check {
            display: block;
        }

        .empty-box {
            background: #fff;
            border: 1px dashed #ccc;
            padding: 40px;
            text-align: center;
            color: #777;
            border-radius: 6px;
        }

        .popup-footer {
            margin-top: 18px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="popup-header">
    <h3>Thư viện ảnh</h3>

    <div>
        <input type="file"
               name="images[]"
               id="uploadInput"
               multiple
               accept="image/*"
               style="display:none;">

        <button type="button"
                class="btn btn-default"
                id="uploadBtn"
                onclick="document.getElementById('uploadInput').click();">
            <i class="entypo-upload"></i>
            Upload Image
        </button>

        <button type="button" class="btn btn-success" onclick="confirmSelectMedia()">
            <i class="entypo-check"></i>
            Chọn ảnh
        </button>

        <button type="button" class="btn btn-default" onclick="window.close()">
            Đóng
        </button>
    </div>
</div>

<div id="uploadStatus" class="upload-status"></div>

@if($media->count())
    <div class="media-grid" id="mediaGrid">
        @foreach($media as $item)
            <div class="media-card"
                 data-id="{{ $item->id }}"
                 data-url="{{ asset('storage/' . $item->file_path) }}"
                 data-alt="{{ $item->file_name }}"
                 onclick="selectMediaCard(this)">

                <span class="media-check">
                    <i class="entypo-check"></i>
                </span>

                <img src="{{ asset('storage/' . $item->file_path) }}"
                     class="media-thumb"
                     alt="{{ $item->file_name }}">

                <div class="media-name">
                    {{ $item->file_name }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="popup-footer">
        {{ $media->links() }}
    </div>
@else
    <div class="media-grid" id="mediaGrid"></div>

    <div class="empty-box" id="emptyBox">
        Chưa có hình ảnh nào.
    </div>
@endif

<script>
let selectedMedia = null;

const uploadInput = document.getElementById('uploadInput');
const uploadBtn = document.getElementById('uploadBtn');
const uploadStatus = document.getElementById('uploadStatus');
const mediaGrid = document.getElementById('mediaGrid');
const emptyBox = document.getElementById('emptyBox');

uploadInput.addEventListener('change', function () {
    if (this.files.length > 0) {
        uploadAjax(this.files);
    }
});

function uploadAjax(files) {
    const formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('images[]', files[i]);
    }

    uploadBtn.disabled = true;
    uploadBtn.innerHTML = '<i class="entypo-hourglass"></i> Đang upload...';

    showUploadStatus('Đang upload ảnh...', '');

    fetch('{{ route('admin.media.ajax-upload') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(async response => {
        const data = await response.json();

        if (!response.ok) {
            throw data;
        }

        return data;
    })
    .then(data => {
        if (data.success) {
            showUploadStatus(data.message, 'success');

            if (emptyBox) {
                emptyBox.style.display = 'none';
            }

            data.data.forEach(function(item, index) {
                const card = createMediaCard(item);
                mediaGrid.prepend(card);

                if (index === data.data.length - 1) {
                    selectMediaCard(card);
                }
            });

            uploadInput.value = '';
        }
    })
    .catch(error => {
        let message = 'Upload thất bại. Vui lòng thử lại.';

        if (error.message) {
            message = error.message;
        }

        if (error.errors) {
            message = Object.values(error.errors).flat().join('<br>');
        }

        showUploadStatus(message, 'error');
    })
    .finally(() => {
        uploadBtn.disabled = false;
        uploadBtn.innerHTML = '<i class="entypo-upload"></i> Upload Image';
    });
}

function createMediaCard(item) {
    const card = document.createElement('div');

    card.className = 'media-card';
    card.setAttribute('data-id', item.id);
    card.setAttribute('data-url', item.url);
    card.setAttribute('data-alt', item.file_name || '');
    card.setAttribute('onclick', 'selectMediaCard(this)');

    card.innerHTML = `
        <span class="media-check">
            <i class="entypo-check"></i>
        </span>

        <img src="${item.url}"
             class="media-thumb"
             alt="${escapeHtml(item.file_name || '')}">

        <div class="media-name">
            ${escapeHtml(item.file_name || 'image')}
        </div>
    `;

    return card;
}

function selectMediaCard(el) {
    document.querySelectorAll('.media-card').forEach(function(item) {
        item.classList.remove('active');
    });

    el.classList.add('active');

    selectedMedia = {
        id: el.getAttribute('data-id'),
        url: el.getAttribute('data-url'),
        alt: el.getAttribute('data-alt') || ''
    };
}

function confirmSelectMedia() {
    if (!selectedMedia) {
        alert('Vui lòng chọn một ảnh.');
        return;
    }

    selectMediaForParent(selectedMedia.id, selectedMedia.url, selectedMedia.alt);
}

function selectMediaForParent(id, url, alt = '') {
    const inputId = @json($input ?? request()->get('input'));
    const isCkeditor = @json(request()->has('ckeditor'));
    const ckeditorFuncNum = @json(request()->get('CKEditorFuncNum'));

    if (!window.opener) {
        alert('Không tìm thấy cửa sổ gốc.');
        return;
    }

    if (isCkeditor && ckeditorFuncNum) {
        window.opener.CKEDITOR.tools.callFunction(ckeditorFuncNum, url, function() {
            var element = this.getDialog().getContentElement('info', 'txtAlt');

            if (element) {
                element.setValue(alt || '');
            }
        });

        window.close();
        return;
    }

    if (inputId) {

        if (typeof window.opener.setMediaFromPopup === 'function') {

            window.opener.setMediaFromPopup(inputId, {
                id: id,
                url: url,
                alt: alt
            });

            window.close();
            return;
        }

        // fallback cũ
        const input = window.opener.document.getElementById(inputId);
        const preview = window.opener.document.getElementById(inputId + '_preview');

        if (input) {
            input.value = id;
        }

        if (preview) {
            preview.src = url;
            preview.style.display = 'block';
        }

        window.close();
        return;
    }

    alert('Không tìm thấy input cần gán ảnh.');
}

function showUploadStatus(message, type) {
    uploadStatus.innerHTML = message;
    uploadStatus.className = 'upload-status';

    if (type) {
        uploadStatus.classList.add(type);
    } else {
        uploadStatus.style.display = 'block';
    }
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.innerText = text;
    return div.innerHTML;
}
</script>

</body>
</html>
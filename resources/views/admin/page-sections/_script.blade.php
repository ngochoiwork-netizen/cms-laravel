<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
if (document.getElementById('vi_content')) {
    CKEDITOR.replace('vi_content', {
        height: 400,
        allowedContent: true,
    });
}

if (document.getElementById('en_content')) {
    CKEDITOR.replace('en_content', {
        height: 400,
        allowedContent: true,
    });
}
</script>

<script>
function openMediaWindow(inputId) {
    let url = '{{ route('admin.media.popup') }}?select=1&input=' + inputId;

    window.open(
        url,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeMedia(inputId) {
    let input = document.getElementById(inputId);

    if (input) {
        input.value = '';
    }

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}

function setMediaFromPopup(inputId, media) {
    let input = document.getElementById(inputId);

    if (input) {
        input.value = media.id;
    }

    let preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = media.url;
        preview.style.display = 'block';
    }
}
</script>

<script>
function toggleSectionFields() {
    let typeSelect = document.getElementById('section_type');

    if (!typeSelect) {
        return;
    }

    let type = typeSelect.value;

    let contentFields = document.querySelectorAll('.section-content-field');
    let buttonFields = document.querySelectorAll('.section-button-field');
    let jsonFields = document.querySelectorAll('.section-json-field');
    let imageFields = document.querySelectorAll('.section-image-field');

    contentFields.forEach(function (el) {
        el.style.display = 'none';
    });

    buttonFields.forEach(function (el) {
        el.style.display = 'none';
    });

    jsonFields.forEach(function (el) {
        el.style.display = 'none';
    });

    imageFields.forEach(function (el) {
        el.style.display = 'none';
    });

    /*
    |--------------------------------------------------------------------------
    | TYPE RULES
    |--------------------------------------------------------------------------
    */

    if (type === 'content') {
        showFields(contentFields);
    }

    if (type === 'image_text') {
        showFields(contentFields);
        showFields(buttonFields);
        showFields(imageFields);
    }

    if (type === 'cta') {
        showFields(contentFields);
        showFields(buttonFields);
        showFields(imageFields);
    }

    if (type === 'list') {
        showFields(jsonFields);
        showFields(imageFields);
    }

    if (type === 'faq') {
        showFields(jsonFields);
    }

    if (type === 'gallery') {
        showFields(jsonFields);
        showFields(imageFields);
    }

    if (type === 'custom') {
        showFields(contentFields);
        showFields(buttonFields);
        showFields(jsonFields);
        showFields(imageFields);
    }
}

function showFields(fields) {
    fields.forEach(function (el) {
        el.style.display = '';
    });
}

document.addEventListener('DOMContentLoaded', function () {
    toggleSectionFields();
});
</script>
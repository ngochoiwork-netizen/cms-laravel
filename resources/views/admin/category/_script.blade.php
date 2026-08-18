<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
    if (document.getElementById('vi_description')) {
        CKEDITOR.replace('vi_description', {
            height: 500,
            allowedContent: true,
        });
    }

    if (document.getElementById('en_description')) {
        CKEDITOR.replace('en_description', {
            height: 500,
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
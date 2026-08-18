<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
<script src="{{ asset('assets/admin/js/select2/select2.min.js') }}"></script>
<script>
if (document.getElementById('vi_content')) {
    CKEDITOR.replace('vi_content', {
        height: 500,
        allowedContent: true,
    });
}

if (document.getElementById('en_content')) {
    CKEDITOR.replace('en_content', {
        height: 500,
        allowedContent: true,
    });
}
</script>

<script>
jQuery(document).ready(function($) {

    $('#tag_ids').select2({
        tags: [
            @foreach($tags as $tagItem)
                @php
                    $tagName = $tagItem->translations->where('locale', 'vi')->first()?->name;
                @endphp

                "{{ $tagName ?? $tagItem->slug }}",
            @endforeach
        ],
        tokenSeparators: [','],
        width: '100%'
    });

});
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
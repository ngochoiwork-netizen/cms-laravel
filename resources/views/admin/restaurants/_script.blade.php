<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace('vi_description', {
    height: 500,
    allowedContent: true,
});

CKEDITOR.replace('en_description', {
    height: 500,
    allowedContent: true,
});
</script>

<script>
function openMediaWindow(inputId) {

    let url = '{{ route('admin.media.popup') }}?select=1&input=' + inputId;

    // multiple gallery
    if (inputId.includes('_gallery')) {
        url += '&multiple=1';
    }

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

    // Gallery mode
    if (inputId.includes('_gallery')) {
        addGalleryImage(inputId, media);
        return;
    }

    // Single image
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

function addGalleryImage(inputId, media) {

    // restaurant_gallery -> restaurant-gallery-preview
    let wrapperId = inputId.replace('_gallery', '-gallery-preview');

    let wrapper = document.getElementById(wrapperId);

    if (!wrapper) {
        return;
    }

    // tránh add trùng
    let existingInputs = wrapper.querySelectorAll('input[name="gallery_ids[]"]');

    for (let i = 0; i < existingInputs.length; i++) {

        if (existingInputs[i].value == media.id) {
            return;
        }
    }

    let html = `
        <div class="gallery-item"
             style="position:relative;
                    width:120px;">

            <input type="hidden"
                   name="gallery_ids[]"
                   value="${media.id}">

            <img src="${media.url}"
                 style="width:120px;
                        height:80px;
                        object-fit:cover;
                        border:1px solid #ddd;
                        padding:3px;">

            <button type="button"
                    onclick="this.closest('.gallery-item').remove()"
                    class="btn btn-danger btn-xs"
                    style="position:absolute;
                           top:3px;
                           right:3px;">

                ×

            </button>

        </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);
}
</script>
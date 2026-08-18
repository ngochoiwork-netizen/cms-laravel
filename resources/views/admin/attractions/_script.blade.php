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

    // gallery multiple images
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

        // support cả dấu - và _
        let galleryContainer =
            document.getElementById(inputId + '_preview') ||
            document.getElementById(inputId.replaceAll('_', '-') + '-preview');

        if (!galleryContainer) {
            return;
        }

        // multiple images
        if (Array.isArray(media)) {

            media.forEach(function(item) {

                appendGalleryImage(galleryContainer, item);

            });

        } else {

            appendGalleryImage(galleryContainer, media);

        }

        return;
    }

    // Single image mode
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
function appendGalleryImage(container, media) {

    // prevent duplicate
    if (container.querySelector('[data-id="' + media.id + '"]')) {
        return;
    }

    let wrapper = document.createElement('div');

    wrapper.classList.add('gallery-item');

    wrapper.setAttribute('data-id', media.id);

    wrapper.style.position = 'relative';
    wrapper.style.width = '120px';

    wrapper.innerHTML = `
        <input type="hidden"
               name="gallery_ids[]"
               value="${media.id}">

        <img src="${media.url}"
             style="width:120px;
                    height:90px;
                    object-fit:cover;
                    border:1px solid #ddd;
                    padding:3px;">

        <button type="button"
                class="btn btn-danger btn-xs"
                style="position:absolute;top:3px;right:3px;"
                onclick="this.parentElement.remove()">
            x
        </button>
    `;

    container.appendChild(wrapper);
}
</script>
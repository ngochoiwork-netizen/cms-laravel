

<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
/*
|--------------------------------------------------------------------------
| CKEDITOR
|--------------------------------------------------------------------------
*/

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
/*
|--------------------------------------------------------------------------
| MEDIA POPUP
|--------------------------------------------------------------------------
*/

function openMediaWindow(inputId)
{
    let url = '{{ route('admin.media.popup') }}?select=1&input=' + inputId;

    if (inputId === 'product_gallery') {
        url += '&multiple=1';
    }

    window.open(
        url,
        'MediaLibrary',
        'width=1200,height=700'
    );
}

function setMediaFromPopup(inputId, media)
{
    /*
    |--------------------------------------------------------------------------
    | GALLERY
    |--------------------------------------------------------------------------
    */

    if (inputId === 'product_gallery') {

        addGalleryImage(media);

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | SINGLE IMAGE
    |--------------------------------------------------------------------------
    */

    $('#' + inputId).val(media.id);

    $('#' + inputId + '_preview').html(`
        <img src="${media.url}"
             style="width:180px;height:120px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">
    `);
}

function addGalleryImage(media)
{
    let html = `
        <div class="gallery-item"
             style="display:inline-block;margin:5px;position:relative;">

            <input type="hidden"
                   name="gallery_ids[]"
                   value="${media.id}">

            <img src="${media.url}"
                 style="width:120px;height:90px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">

            <button type="button"
                    class="btn btn-danger btn-xs remove-gallery-image"
                    style="position:absolute;top:2px;right:2px;">
                x
            </button>

        </div>
    `;

    $('#product-gallery-preview').append(html);
}

$(document).on('click', '.remove-gallery-image', function () {

    $(this).closest('.gallery-item').remove();
});
</script>

<script>
/*
|--------------------------------------------------------------------------
| FEATURES
|--------------------------------------------------------------------------
*/

$(document).on('click', '.add-feature-btn', function () {

    let target = $(this).data('target');

    let name = $(this).data('name');

    let placeholder = name.includes('vi')
        ? 'Nhập tính năng'
        : 'Enter feature';

    let html = `
        <div class="feature-item panel panel-default">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-11">

                        <input type="text"
                               name="${name}"
                               class="form-control"
                               placeholder="${placeholder}">

                    </div>

                    <div class="col-md-1 text-right">

                        <button type="button"
                                class="btn btn-danger remove-feature">

                            <i class="entypo-trash"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>
    `;

    $('#' + target).append(html);
});

$(document).on('click', '.remove-feature', function () {

    $(this).closest('.feature-item').remove();
});
</script>

<script>
/*
|--------------------------------------------------------------------------
| SPECIFICATIONS
|--------------------------------------------------------------------------
*/

let specificationIndex = {
    vi: $('#vi-specifications-wrapper .specification-item').length,
    en: $('#en-specifications-wrapper .specification-item').length
};

$(document).on('click', '.add-specification-btn', function () {

    let locale = $(this).data('locale');

    let index = specificationIndex[locale]++;

    let keyPlaceholder = locale === 'vi'
        ? 'Tên thông số'
        : 'Specification';

    let valuePlaceholder = locale === 'vi'
        ? 'Giá trị'
        : 'Value';

    let html = `
        <div class="specification-item panel panel-default">

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-5">

                        <input type="text"
                               name="${locale}[specifications][${index}][key]"
                               class="form-control"
                               placeholder="${keyPlaceholder}">

                    </div>

                    <div class="col-md-6">

                        <input type="text"
                               name="${locale}[specifications][${index}][value]"
                               class="form-control"
                               placeholder="${valuePlaceholder}">

                    </div>

                    <div class="col-md-1 text-right">

                        <button type="button"
                                class="btn btn-danger remove-specification">

                            <i class="entypo-trash"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>
    `;

    $('#' + locale + '-specifications-wrapper').append(html);
});

$(document).on('click', '.remove-specification', function () {

    $(this).closest('.specification-item').remove();
});
</script>

<script>
/*
|--------------------------------------------------------------------------
| SELECT2
|--------------------------------------------------------------------------
*/

$('.select2').select2({
    placeholder: 'Chọn dữ liệu',
    allowClear: true
});
</script>

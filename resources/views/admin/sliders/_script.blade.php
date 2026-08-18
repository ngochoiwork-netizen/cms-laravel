<script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/neon-chat.js') }}"></script>

<script type="text/javascript">

jQuery(document).ready(function($) {

    if ($("#table-sliders").length) {

        var $table = jQuery("#table-sliders");

        var table = $table.DataTable({
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "order": [[4, "asc"]],
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [1, 7]
                },
                {
                    "searchable": false,
                    "targets": [1, 7]
                }
            ]
        });

        $table.closest('.dataTables_wrapper').find('select').select2({
            minimumResultsForSearch: -1
        });

        $('#table-sliders tfoot th').each(function () {

            var title = $('#table-sliders thead th').eq($(this).index()).text();

            if (title !== 'Ảnh' && title !== 'Thao tác') {
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
            } else {
                $(this).html('');
            }

        });

        table.columns().every(function () {

            var that = this;

            $('input', this.footer()).on('keyup change', function () {

                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }

            });

        });

    }

});

function openMediaWindow(inputId) {
    window.open(
        '{{ route('admin.media.popup') }}?select=1&input=' + inputId,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeImage(inputId) {

    document.getElementById(inputId).value = '';

    var preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }

}

function setMediaFromPopup(inputId, media) {

    document.getElementById(inputId).value = media.id;

    var preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = media.url;
        preview.style.display = 'block';
    }

}

</script>
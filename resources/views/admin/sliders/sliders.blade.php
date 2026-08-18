@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý sliders</h3>
<br>

<a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm slider
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered datatable" id="table-sliders">

    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tiêu đề</th>
            <th>Vị trí</th>
            <th>Link</th>
            <th>Thứ tự</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th width="220">Thao tác</th>
        </tr>
    </thead>

    <tbody>

        @foreach($sliders as $slider)

            <tr>

                <td>{{ $slider->id }}</td>

                <td>
                    @if($slider->image)
                        <img src="{{ asset('storage/' . $slider->image->file_path) }}"
                             style="width:100px;height:70px;object-fit:cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>
                    <strong>
                        {{ $slider->title }}
                    </strong>

                    @if($slider->subtitle)
                        <br>

                        <small class="text-muted">
                            {{ Str::limit($slider->subtitle, 50) }}
                        </small>
                    @endif
                </td>

                <td>
                    <span class="label label-info">
                        {{ $slider->position ?? 'home' }}
                    </span>
                </td>

                <td>
                    @if($slider->link)
                        <a href="{{ $slider->link }}"
                           target="_blank">
                            {{ Str::limit($slider->link, 35) }}
                        </a>
                    @else
                        ---
                    @endif
                </td>

                <td>
                    {{ $slider->sort_order }}
                </td>

                <td>
                    @if($slider->is_active)
                        <span class="label label-success">
                            Hiển thị
                        </span>
                    @else
                        <span class="label label-default">
                            Ẩn
                        </span>
                    @endif
                </td>

                <td>
                    {{ optional($slider->created_at)->format('d/m/Y') }}
                </td>

                <td>

                    <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa slider này?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">
                            Xóa
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

    </tbody>

    <tfoot>
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tiêu đề</th>
            <th>Vị trí</th>
            <th>Link</th>
            <th>Thứ tự</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
    </tfoot>

</table>

@endsection

@section('js')
<script src="{{ asset('assets/admin/js/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/admin/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/neon-chat.js') }}"></script>

<script>

jQuery(document).ready(function($)
{
    var $table = $('#table-sliders');

    var table = $table.DataTable({

        "aLengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],

        "order": [[0, "desc"]],

        "columnDefs": [
            {
                "orderable": false,
                "targets": [1, 8]
            },
            {
                "searchable": false,
                "targets": [1, 8]
            }
        ]
    });

    $table.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });

    $('#table-sliders tfoot th').each(function ()
    {
        var title = $('#table-sliders thead th')
            .eq($(this).index())
            .text();

        if (title !== 'Ảnh' && title !== 'Thao tác')
        {
            $(this).html(
                '<input type="text" class="form-control" placeholder="Search '+title+'" />'
            );
        }
        else
        {
            $(this).html('');
        }
    });

    table.columns().every(function ()
    {
        var that = this;

        $('input', this.footer()).on('keyup change', function ()
        {
            if (that.search() !== this.value)
            {
                that.search(this.value).draw();
            }
        });
    });

});

</script>
@endsection
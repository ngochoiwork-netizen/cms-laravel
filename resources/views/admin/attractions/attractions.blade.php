@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý địa điểm tham quan</h3>
<br>

<a href="{{ route('admin.attractions.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm địa điểm
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered datatable" id="table-attractions">

    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên địa điểm</th>
            <th>Điểm đến</th>
            <th>Loại hình</th>
            <th>Giá vé</th>
            <th>Nổi bật</th>
            <th>Trạng thái</th>
            <th>Thứ tự</th>
            <th>Ngày tạo</th>
            <th width="220">Thao tác</th>
        </tr>
    </thead>

    <tbody>

        @foreach($attractions as $attraction)

            @php
                $vi = $attraction->translations->where('locale', 'vi')->first();
            @endphp

            <tr>

                <td>{{ $attraction->id }}</td>

                <td>
                    @if($attraction->thumbnail)
                        <img src="{{ asset('storage/' . $attraction->thumbnail->file_path) }}"
                             style="width:100px;height:70px;object-fit:cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>
                    <strong>
                        {{ $vi->name ?? 'Chưa có tên' }}
                    </strong>

                    <br>

                    <small class="text-muted">
                        {{ $attraction->slug }}
                    </small>
                </td>

                <td>
                    @if($attraction->destination)
                        {{ optional($attraction->destination->vi)->name }}
                    @else
                        ---
                    @endif
                </td>

                <td>
                    {{ $attraction->attraction_type ?? '---' }}
                </td>

                <td>
                    @if($attraction->ticket_price)
                        {{ $attraction->ticket_price}}
                    @else
                        Miễn phí
                    @endif
                </td>

                <td>
                    @if($attraction->is_featured)
                        <span class="label label-warning">
                            Nổi bật
                        </span>
                    @else
                        <span class="label label-default">
                            Thường
                        </span>
                    @endif
                </td>

                <td>
                    @if($attraction->is_active)
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
                    {{ $attraction->sort_order }}
                </td>

                <td>
                    {{ optional($attraction->created_at)->format('d/m/Y') }}
                </td>

                <td>

                    <a href="{{ route('admin.attractions.edit', $attraction->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.attractions.destroy', $attraction->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa địa điểm này?')">

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
            <th>Tên địa điểm</th>
            <th>Điểm đến</th>
            <th>Loại hình</th>
            <th>Giá vé</th>
            <th>Nổi bật</th>
            <th>Trạng thái</th>
            <th>Thứ tự</th>
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
    var $table = $('#table-attractions');

    var table = $table.DataTable({

        "aLengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],

        "order": [[0, "desc"]],

        "columnDefs": [
            {
                "orderable": false,
                "targets": [1, 10]
            },
            {
                "searchable": false,
                "targets": [1, 10]
            }
        ]
    });

    $table.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });

    $('#table-attractions tfoot th').each(function ()
    {
        var title = $('#table-attractions thead th')
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
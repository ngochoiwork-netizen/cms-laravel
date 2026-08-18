@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý quốc gia</h3>
<br>

<a href="{{ route('admin.countries.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm quốc gia
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered datatable" id="table-countries">
    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên quốc gia</th>
            <th>Slug</th>
            <th>Nổi bật</th>
            <th>Trạng thái</th>
            <th>Thứ tự</th>
            <th>Ngày tạo</th>
            <th width="220">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($countries as $country)

            @php
                $vi = $country->translations->where('locale', 'vi')->first();
            @endphp

            <tr>

                <td>{{ $country->id }}</td>

                <td>
                    @if($country->thumbnail)
                        <img src="{{ asset('storage/' . $country->thumbnail->file_path) }}"
                             style="width:100px;height:70px;object-fit:cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>
                    <strong>
                        {{ $vi->name ?? 'Chưa có tên' }}
                    </strong>
                </td>

                <td>
                    {{ $country->slug }}
                </td>

                <td>
                    @if($country->is_featured)
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
                    @if($country->is_active)
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
                    {{ $country->sort_order }}
                </td>

                <td>
                    {{ optional($country->created_at)->format('d/m/Y') }}
                </td>

                <td>

                    <a href="{{ route('admin.countries.edit', $country->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.countries.destroy', $country->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa quốc gia này?')">

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
            <th>Tên quốc gia</th>
            <th>Slug</th>
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
    var $table = $('#table-countries');

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

    $('#table-countries tfoot th').each(function ()
    {
        var title = $('#table-countries thead th')
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
@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý khách sạn</h3>
<br>

<a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm khách sạn
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered datatable" id="table-hotels">

    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên khách sạn</th>
            <th>Điểm đến</th>
            <th>Loại</th>
            <th>Sao</th>
            <th>Giá từ</th>
            <th>Nổi bật</th>
            <th>Trạng thái</th>
            <th>Thứ tự</th>
            <th>Ngày tạo</th>
            <th width="220">Thao tác</th>
        </tr>
    </thead>

    <tbody>

        @foreach($hotels as $hotel)

            @php
                $vi = $hotel->translations->where('locale', 'vi')->first();
            @endphp

            <tr>

                <td>{{ $hotel->id }}</td>

                <td>
                    @if($hotel->thumbnail)
                        <img src="{{ asset('storage/' . $hotel->thumbnail->file_path) }}"
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
                        {{ $hotel->slug }}
                    </small>
                </td>

                <td>
                    @if($hotel->destination)
                        {{ optional($hotel->destination->vi)->name }}
                    @else
                        ---
                    @endif
                </td>

                <td>
                    {{ $hotel->hotel_type ?? '---' }}
                </td>

                <td>
                    @if($hotel->star_rating)
                        ⭐ {{ $hotel->star_rating }}
                    @else
                        ---
                    @endif
                </td>

                <td>
                    @if($hotel->price_from)
                        {{ number_format($hotel->price_from, 0, ',', '.') }}đ
                    @else
                        ---
                    @endif
                </td>

                <td>
                    @if($hotel->is_featured)
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
                    @if($hotel->is_active)
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
                    {{ $hotel->sort_order }}
                </td>

                <td>
                    {{ optional($hotel->created_at)->format('d/m/Y') }}
                </td>

                <td>

                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa khách sạn này?')">

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
            <th>Tên khách sạn</th>
            <th>Điểm đến</th>
            <th>Loại</th>
            <th>Sao</th>
            <th>Giá từ</th>
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
    var $table = $('#table-hotels');

    var table = $table.DataTable({

        "aLengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],

        "order": [[0, "desc"]],

        "columnDefs": [
            {
                "orderable": false,
                "targets": [1, 11]
            },
            {
                "searchable": false,
                "targets": [1, 11]
            }
        ]
    });

    $table.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });

    $('#table-hotels tfoot th').each(function ()
    {
        var title = $('#table-hotels thead th')
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
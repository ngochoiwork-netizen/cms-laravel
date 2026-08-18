@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý sản phẩm</h3>
<br>

<a href="{{ route('admin.products.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm sản phẩm
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered datatable" id="table-products">
    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Nổi bật</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th width="220">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)

            @php
                $vi = $product->translations->where('locale', 'vi')->first();
            @endphp

            <tr>
                <td>{{ $product->id }}</td>

                <td>
                    @if($product->thumbnail)
                        <img src="{{ asset('storage/' . $product->thumbnail->file_path) }}"
                             style="width: 100px; height: 70px; object-fit: cover;">
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
                        {{ $product->slug }}
                    </small>
                </td>

                <td>
                    @if($product->category)
                        {{ optional($product->category->vi)->name }}
                    @else
                        <span class="text-muted">---</span>
                    @endif
                </td>

                <td>
                    @if($product->price)
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    @else
                        ---
                    @endif
                </td>

                <td>
                    @if($product->is_featured)
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
                    @if($product->status === 'published')
                        <span class="label label-success">
                            Published
                        </span>
                    @else
                        <span class="label label-default">
                            Draft
                        </span>
                    @endif
                </td>

                <td>
                    {{ optional($product->created_at)->format('d/m/Y') }}
                </td>

                <td>

                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">

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
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Nổi bật</th>
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
    var $table = $('#table-products');

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

    $('#table-products tfoot th').each(function ()
    {
        var title = $('#table-products thead th')
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
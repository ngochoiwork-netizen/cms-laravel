@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý danh mục</h3>
<br>

<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm danh mục
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered datatable" id="table-categories">
    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên danh mục</th>
            <th>Loại</th>
            <th>Danh mục cha</th>
            <th>Thứ tự</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th width="160">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>

                <td>
                    @if($category->thumbnail)
                        <img src="{{ asset('storage/' . $category->thumbnail->file_path) }}"
                             style="width: 100px; height: 60px; object-fit: cover;">
                    @else
                        <span class="text-muted">Chưa có ảnh</span>
                    @endif
                </td>

                <td>
                    <strong>{{ $category->name }}</strong>
                    <br>
                    <small class="text-muted">{{ $category->slug }}</small>
                </td>

                <td>
                    <span class="label label-info">
                        {{ $category->type }}
                    </span>
                </td>

                <td>
                    {{ $category->parent ? $category->parent->name : '-' }}
                </td>

                <td>{{ $category->sort_order }}</td>

                <td>
                    @if($category->is_active)
                        <span class="label label-success">Hiển thị</span>
                    @else
                        <span class="label label-default">Ẩn</span>
                    @endif
                </td>

                <td>{{ $category->created_at->format('d/m/Y') }}</td>

                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
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
            <th>Tên danh mục</th>
            <th>Loại</th>
            <th>Danh mục cha</th>
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
jQuery(document).ready(function($) {
    var $table = $("#table-categories");

    var table = $table.DataTable({
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "order": [[5, "asc"]],
        "columnDefs": [
            { "orderable": false, "targets": [1, 8] },
            { "searchable": false, "targets": [1, 8] }
        ]
    });

    $table.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });

    $('#table-categories tfoot th').each(function () {
        var title = $('#table-categories thead th').eq($(this).index()).text();

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
});
</script>
@endsection
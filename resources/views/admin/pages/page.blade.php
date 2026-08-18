@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý trang</h3>
<br>

<a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm trang
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered datatable" id="table-pages">
    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tiêu đề</th>
            <th>Template</th>
            <th>Thứ tự</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th width="220">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pages as $page)
            @php
                $vi = $page->translations->firstWhere('locale', 'vi');
            @endphp

            <tr>
                <td>{{ $page->id }}</td>

                <td>
                    @if($page->thumbnail)
                        <img src="{{ asset('storage/' . $page->thumbnail->file_path) }}"
                             style="width: 100px; height: 60px; object-fit: cover;">
                    @else
                        <span class="text-muted">Chưa có ảnh</span>
                    @endif
                </td>

                <td>
                    <strong>{{ $vi->title ?? 'Chưa có tiêu đề' }}</strong>
                    <br>
                    <small class="text-muted">{{ $page->slug }}</small>
                </td>

                <td>
                    <span class="label label-info">
                        {{ $page->template ?? 'default' }}
                    </span>
                </td>

                <td>{{ $page->sort_order }}</td>

                <td>
                    @if($page->is_active)
                        <span class="label label-success">Hiển thị</span>
                    @else
                        <span class="label label-default">Ẩn</span>
                    @endif
                </td>

                <td>{{ optional($page->created_at)->format('d/m/Y') }}</td>

                <td>
                    <a href="{{ route('admin.pages.edit', $page->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <a href="{{ route('admin.pages.sections.index', $page->id) }}"
                       class="btn btn-default btn-sm">
                        Sections
                    </a>

                    <form action="{{ route('admin.pages.destroy', $page->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa trang này?')">
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
            <th>Tiêu đề</th>
            <th>Template</th>
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
    var $table = $("#table-pages");

    var table = $table.DataTable({
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "order": [[4, "asc"]],
        "columnDefs": [
            { "orderable": false, "targets": [1, 7] },
            { "searchable": false, "targets": [1, 7] }
        ]
    });

    $table.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });

    $('#table-pages tfoot th').each(function () {
        var title = $('#table-pages thead th').eq($(this).index()).text();

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
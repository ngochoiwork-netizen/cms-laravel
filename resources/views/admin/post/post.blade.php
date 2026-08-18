@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
@endsection

@section('content')

<h3>Quản lý bài viết</h3>
<br>

<a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
    <i class="entypo-plus"></i> Thêm bài viết
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered datatable" id="table-posts">
    <thead>
        <tr class="replace-inputs">
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tiêu đề</th>
            <th>Danh mục</th>
            <th>Trạng thái</th>
            <th>Nổi bật</th>
            <th>Ngày đăng</th>
            <th width="160">Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>

            {{-- Thumbnail --}}
            <td>
                @if($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail->file_path) }}"
                         style="width: 120px; height: 70px; object-fit: cover;">
                @else
                    <span class="text-muted">Không có ảnh</span>
                @endif
            </td>

            {{-- Title --}}
            <td>
                <strong>{{ $post->title }}</strong>

                @if($post->excerpt)
                    <br>
                    <small>{{ Str::limit($post->excerpt, 60) }}</small>
                @endif
            </td>

            {{-- Category --}}
            <td>
                {{ $post->category ? $post->category->name : '-' }}
            </td>

            {{-- Status --}}
            <td>
                @if($post->status === 'published')
                    <span class="label label-success">Đã đăng</span>
                @else
                    <span class="label label-default">Nháp</span>
                @endif
            </td>

            {{-- Featured --}}
            <td>
                @if($post->is_featured)
                    <span class="label label-warning">Nổi bật</span>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>

            {{-- Date --}}
            <td>
                {{ $post->published_at ? $post->published_at->format('d/m/Y') : '-' }}
            </td>

            {{-- Actions --}}
            <td>
                <a href="{{ route('admin.posts.edit', $post->id) }}"
                   class="btn btn-info btn-sm">
                    Sửa
                </a>

                <form action="{{ route('admin.posts.destroy', $post->id) }}"
                      method="POST"
                      style="display:inline-block;"
                      onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?')">
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
            <th>Danh mục</th>
            <th>Trạng thái</th>
            <th>Nổi bật</th>
            <th>Ngày đăng</th>
            <th>Thao tác</th>
        </tr>
    </tfoot>
</table>

@endsection

@section('js')
<script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>

<script>
jQuery(document).ready(function($) {

    var $table = $("#table-posts");

    var table = $table.DataTable({
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "order": [[0, "desc"]],
        "columnDefs": [
            { "orderable": false, "targets": [1, 7] },
            { "searchable": false, "targets": [1, 7] }
        ]
    });

    $table.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });

    // Search footer
    $('#table-posts tfoot th').each(function () {
        var title = $('#table-posts thead th').eq($(this).index()).text();

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
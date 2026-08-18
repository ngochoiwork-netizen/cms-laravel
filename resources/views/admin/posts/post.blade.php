@extends('admin.layouts.master-layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/js/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/js/select2/select2.css') }}">
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

            <th>Tags</th>

            <th>Nổi bật</th>

            <th>Trạng thái</th>

            <th>Ngày đăng</th>

            <th width="160">Thao tác</th>

        </tr>
    </thead>

    <tbody>

        @foreach($posts as $post)

            @php

                $vi = $post->translations
                    ->firstWhere('locale', 'vi');

                $categoryName = optional(optional($post->category)
                    ->translations
                    ->firstWhere('locale', 'vi'))
                    ->name;

            @endphp

            <tr>

                <td>
                    {{ $post->id }}
                </td>

                <td>

                    @if($post->thumbnail)

                        <img src="{{ asset('storage/' . $post->thumbnail->file_path) }}"
                             style="width: 100px; height: 60px; object-fit: cover;">

                    @else

                        <span class="text-muted">
                            Chưa có ảnh
                        </span>

                    @endif

                </td>

                <td>

                    <strong>
                        {{ $vi->title ?? 'Chưa có tiêu đề' }}
                    </strong>

                    <br>

                    <small class="text-muted">
                        {{ $post->slug }}
                    </small>

                </td>

                <td>

                    {{ $categoryName ?? '-' }}

                </td>

                <td>

                    @if($post->tags->count())

                        @foreach($post->tags as $tag)

                            @php
                                $tagVi = $tag->translations
                                    ->firstWhere('locale', 'vi');
                            @endphp

                            <span class="label label-info"
                                  style="display:inline-block;margin-bottom:4px;">

                                {{ $tagVi->name ?? $tag->slug }}

                            </span>

                        @endforeach

                    @else

                        -

                    @endif

                </td>

                <td>

                    @if($post->is_featured)

                        <span class="label label-success">
                            Có
                        </span>

                    @else

                        <span class="label label-default">
                            Không
                        </span>

                    @endif

                </td>

                <td>

                    @if($post->is_active)

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

                    @if($post->published_at)

                        {{ $post->published_at->format('d/m/Y') }}

                    @else

                        -

                    @endif

                </td>

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

            <th>Danh mục</th>

            <th>Tags</th>

            <th>Nổi bật</th>

            <th>Trạng thái</th>

            <th>Ngày đăng</th>

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

    var $table = $("#table-posts");

    var table = $table.DataTable({

        "aLengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],

        "order": [[0, "desc"]],

        "columnDefs": [
            { "orderable": false, "targets": [1, 4, 8] },
            { "searchable": false, "targets": [1, 8] }
        ]

    });

    $table.closest('.dataTables_wrapper')
        .find('select')
        .select2({
            minimumResultsForSearch: -1
        });

    $('#table-posts tfoot th').each(function () {

        var title = $('#table-posts thead th')
            .eq($(this).index())
            .text();

        if (
            title !== 'Ảnh'
            && title !== 'Thao tác'
        ) {

            $(this).html(
                '<input type="text" class="form-control" placeholder="Search ' + title + '" />'
            );

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
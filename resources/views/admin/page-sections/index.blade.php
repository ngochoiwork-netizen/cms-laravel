@extends('admin.layouts.master-layouts')

@section('content')

@php
    $pageVi = optional($page->translations->firstWhere('locale', 'vi'));
@endphp

<h2>
    Quản lý Sections:
    {{ $pageVi->title ?? $page->slug }}
</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="text-right" style="margin-bottom: 15px;">

    <a href="{{ route('admin.pages.edit', $page->id) }}"
       class="btn btn-default">
        <i class="entypo-left"></i>
        Quay lại Page
    </a>

    <a href="{{ route('admin.pages.sections.create', $page->id) }}"
       class="btn btn-primary">
        <i class="entypo-plus"></i>
        Thêm Section
    </a>

</div>

<table class="table table-bordered table-striped datatable">

    <thead>
        <tr>
            <th width="80">Ảnh</th>
            <th>Key</th>
            <th>Type</th>
            <th>Tiêu đề</th>
            <th>Layout</th>
            <th>Thứ tự</th>
            <th>Trạng thái</th>
            <th width="180">Thao tác</th>
        </tr>
    </thead>

    <tbody>

        @foreach($sections as $section)

            @php
                $vi = $section->translations->firstWhere('locale', 'vi');
            @endphp

            <tr>

                <td>
                    @if($section->image)
                        <img src="{{ asset('storage/' . $section->image->file_path) }}"
                             style="width:70px;height:55px;object-fit:cover;border-radius:4px;">
                    @else
                        <span class="text-muted">No image</span>
                    @endif
                </td>

                <td>
                    <strong>{{ $section->key }}</strong>
                </td>

                <td>
                    <span class="label label-info">
                        {{ $section->type }}
                    </span>
                </td>

                <td>
                    {{ $vi->title ?? '-' }}
                </td>

                <td>
                    {{ $section->layout ?? '-' }}
                </td>

                <td>
                    {{ $section->sort_order }}
                </td>

                <td>
                    @if($section->is_active)
                        <span class="label label-success">
                            Hiển thị
                        </span>
                    @else
                        <span class="label label-danger">
                            Ẩn
                        </span>
                    @endif
                </td>

                <td>

                    <a href="{{ route('admin.page-sections.edit', $section->id) }}"
                       class="btn btn-info btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.page-sections.destroy', $section->id) }}"
                          method="POST"
                          style="display:inline-block;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa section này?');">

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

</table>

@endsection
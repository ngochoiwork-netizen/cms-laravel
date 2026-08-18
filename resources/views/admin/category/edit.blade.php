@extends('admin.layouts.master-layouts')

@section('content')

<h3>Cập nhật danh mục</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.categories.update', $category->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.category._form', [
        'category' => $category,
        'categories' => $categories
    ])

</form>

@endsection

@section('js')
    @include('admin.category._script')
@endsection
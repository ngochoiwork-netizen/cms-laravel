@extends('admin.layouts.master-layouts')

@section('content')

<h3>Thêm danh mục</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.categories.store') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.category._form', [
        'category' => null,
        'categories' => $categories
    ])

</form>

@endsection

@section('js')
    @include('admin.category._script')
@endsection
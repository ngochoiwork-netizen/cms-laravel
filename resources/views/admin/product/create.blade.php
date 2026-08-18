@extends('admin.layouts.master-layouts')

@section('content')

<h3>Thêm sản phẩm</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.products.store') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.product._form', [
        'product' => null,
        'categories' => $categories,
        'tags' => $tags
    ])

</form>

@endsection

@section('js')
    @include('admin.product._script')
@endsection
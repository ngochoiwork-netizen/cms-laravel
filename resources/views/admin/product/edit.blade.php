@extends('admin.layouts.master-layouts')

@section('content')

<h3>Cập nhật sản phẩm</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.products.update', $product->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.product._form', [
        'product' => $product,
        'categories' => $categories,
        'tags' => $tags
    ])

</form>

@endsection

@section('js')
    @include('admin.product._script')
@endsection
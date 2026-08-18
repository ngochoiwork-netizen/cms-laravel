@extends('admin.layouts.master-layouts')

@section('content')

<h3>Thêm trang</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.pages.store') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.pages._form', [
        'page' => null,
        'translations' => collect()
    ])

</form>

@endsection

@section('js')
    @include('admin.pages._script')
@endsection
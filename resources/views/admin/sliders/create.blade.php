@extends('admin.layouts.master-layouts')

@section('content')

<h2>Thêm Slider</h2>

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.sliders.store') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.sliders._form', [
        'slider' => null
    ])

</form>

@endsection

@section('js')
    @include('admin.sliders._script')
@endsection
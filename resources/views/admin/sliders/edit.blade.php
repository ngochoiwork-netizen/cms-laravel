@extends('admin.layouts.master-layouts')

@section('content')

<h2>Sửa Slider</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.sliders.update', $slider->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.sliders._form', [
        'slider' => $slider
    ])

</form>

@endsection

@section('js')
    @include('admin.sliders._script')
@endsection
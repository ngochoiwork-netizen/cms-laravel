@extends('admin.layouts.master-layouts')

@section('content')

<h3>Sửa khách sạn</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.hotels.update', $hotel->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.hotels._form', [
        'hotel' => $hotel,
        'countries' => $countries,
        'provinces' => $provinces,
        'destinations' => $destinations
    ])

</form>

@endsection

@section('js')
    @include('admin.hotels._script')
@endsection
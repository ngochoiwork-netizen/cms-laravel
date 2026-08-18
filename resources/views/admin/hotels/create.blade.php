@extends('admin.layouts.master-layouts')

@section('content')

<h3>Thêm khách sạn</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.hotels.store') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.hotels._form', [
        'hotel' => null,
        'countries' => $countries,
        'provinces' => $provinces,
        'destinations' => $destinations
    ])

</form>

@endsection

@section('js')
    @include('admin.hotels._script')
@endsection
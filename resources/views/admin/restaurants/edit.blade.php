@extends('admin.layouts.master-layouts')

@section('content')

<h3>Cập nhật quán ăn</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.restaurants.update', $restaurant->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.restaurants._form', [
        'restaurant' => $restaurant,
        'countries' => $countries,
        'provinces' => $provinces,
        'destinations' => $destinations
    ])

</form>

@endsection

@section('js')
    @include('admin.restaurants._script')
@endsection
@extends('admin.layouts.master-layouts')

@section('content')

<h3>Thêm điểm tham quan</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.attractions.store') }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.attractions._form', [
        'attraction' => null,
        'countries' => $countries,
        'provinces' => $provinces,
        'destinations' => $destinations
    ])

</form>

@endsection

@section('js')
    @include('admin.attractions._script')
@endsection
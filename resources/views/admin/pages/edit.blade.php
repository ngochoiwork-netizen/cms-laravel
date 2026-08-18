@extends('admin.layouts.master-layouts')

@section('content')

<h3>Chỉnh sửa trang</h3>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.pages.update', $page->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.pages._form', [
        'page' => $page,
        'translations' => $translations
    ])

</form>

@endsection

@section('js')
    @include('admin.pages._script')
@endsection 
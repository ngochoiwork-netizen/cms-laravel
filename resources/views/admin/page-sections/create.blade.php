@extends('admin.layouts.master-layouts')

@section('content')

<h2>Thêm Section</h2>

<form action="{{ route('admin.pages.sections.store', $page->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf

    @include('admin.page-sections._form')

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Lưu Section
            </button>

            <a href="{{ route('admin.pages.sections.index', $page->id) }}"
               class="btn btn-default">
                Quay lại
            </a>
        </div>
    </div>

</form>

@include('admin.page-sections._script')

@endsection
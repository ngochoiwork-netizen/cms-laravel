@extends('admin.layouts.master-layouts')

@section('content')

<h2>Thêm quốc gia</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.countries.store') }}" method="POST" class="form-horizontal form-groups-bordered">
    @csrf

    @include('admin.countries._form', [
        'country' => null
    ])

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary">
                <i class="entypo-check"></i>
                Lưu quốc gia
            </button>

            <a href="{{ route('admin.countries.index') }}" class="btn btn-default">
                Quay lại
            </a>
        </div>
    </div>
</form>

@endsection

@section('js')
<script>
function openMediaWindow(inputId) {
    window.open(
        '{{ route('admin.media.popup') }}?select=1&input=' + inputId,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeCategoryImage(inputId) {
    document.getElementById(inputId).value = '';

    var preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>
@endsection
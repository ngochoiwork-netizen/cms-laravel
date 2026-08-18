@extends('admin.layouts.master-layouts')

@section('content')

<h3>Sửa điểm đến</h3>
<br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif

<form action="{{ route('admin.destinations.update', $destination->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.destinations._form', [
        'destination' => $destination,
        'countries' => $countries,
        'provinces' => $provinces
    ])

</form>

@endsection

@section('js')

<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace('vi_description', {
    height: 500,
    allowedContent: true,
});

CKEDITOR.replace('en_description', {
    height: 500,
    allowedContent: true,
});
</script>

<script>
function openMediaWindow(inputId) {
    window.open(
        '{{ route('admin.media.popup') }}?select=1&input=' + inputId,
        'MediaLibrary',
        'width=1100,height=750'
    );
}

function removeMedia(inputId) {
    document.getElementById(inputId).value = '';

    var preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>

@endsection
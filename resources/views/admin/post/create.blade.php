@extends('admin.layouts.master-layouts')
@section('content')
<h3>Thêm bài viết</h3>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra lại dữ liệu nhập.
    </div>
@endif
<form action="{{ route('admin.posts.store') }}" method="POST" class="form-horizontal form-groups-bordered">
    @csrf

    @include('admin.post._form', [
        'post' => null,
        'categories' => $categories
    ])
</form>
@endsection
@section('js')
<script src="{{ asset('assets/admin/js/ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace('content', {
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

function removePostImage(inputId) {
    document.getElementById(inputId).value = '';

    var preview = document.getElementById(inputId + '_preview');

    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>
@endsection
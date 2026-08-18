@extends('admin.layouts.master-layouts')

@section('content')

<h3>Sửa bài viết</h3>
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

<form action="{{ route('admin.posts.update', $post->id) }}"
      method="POST"
      class="form-horizontal form-groups-bordered">

    @csrf
    @method('PUT')

    @include('admin.post._form', [
        'post' => $post,
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
    removePlugins: 'notification,notificationaggregator'
});

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
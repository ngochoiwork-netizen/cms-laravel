@extends('admin.layouts.master-layouts')

@section('content')

<h3>Cập nhật bài viết</h3>
<br>

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

    @include('admin.posts._form', [
        'post' => $post,
        'categories' => $categories,
        'tags' => $tags,
        'selectedTags' => $selectedTags
    ])

</form>

@endsection

@section('js')
    @include('admin.posts._script')
@endsection
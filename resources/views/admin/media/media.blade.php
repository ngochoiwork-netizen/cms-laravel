@extends('admin.layouts.master-layouts')
@section('content')
<ol class="breadcrumb bc-3">
	<li>
		<a href="index.html"><i class="fa-home"></i>Home</a>
	</li>
	<li class="active">
		<strong>Media</strong>
	</li>
</ol>
<div class="gallery-env">

	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-2">
					<h3>
						Quản Lý Ảnh
					</h3>
				</div>
				<div class="col-sm-10 text-right">
					<h3>
						<form id="uploadForm"
						      action="{{ route('admin.media.upload') }}"
						      method="POST"
						      enctype="multipart/form-data"
						      style="margin: 0;">
						    @csrf

						    <input type="file" name="images[]" id="uploadInput" multiple hidden style="display: none;">
						    <button type="button"
						            class="btn btn-default"
						            onclick="document.getElementById('uploadInput').click();">
						        Upload Image
						    </button>
						</form>
					</h3>
				</div>
			</div>
			<hr>
		</div>
	</div>
	<div class="row">
		@forelse($media as $item)
		<div class="col-sm-2 col-xs-4" data-tag="1d">
			<article class="image-thumb">
					<a href="#" class="image">
						<img 
						style="cursor: {{ $selectMode ? 'pointer' : 'default' }};"
						@if($selectMode)
		                    onclick="selectMediaForParent(
							    '{{ $item->id }}',
							    '{{ asset('storage/' . $item->file_path) }}',
							    '{{ $item->file_name }}'
							)"
		                 @endif
						src="{{ asset('storage/' . $item->file_path) }} 
						">
						<h6>{{$item->file_name}}</h6>
					</a>
					<div class="image-options">
						<form id="delete-form-{{ $item->id }}"
					          action="{{ route('admin.media.destroy', $item->id) }}"
					          method="POST"
					          style="display:none;">
					        @csrf
					        @method('DELETE')
					    </form>
						<a href="#" class="delete" onclick="event.preventDefault(); confirmDelete({{ $item->id }});"><i class="entypo-cancel"></i></a>
					</div>
			</article>
		</div>
		@empty
		<div class="col-md-12">
            <p>Chưa có hình ảnh nào.</p>
        </div>
        @endforelse
	</div>
	
</div>
@endsection
@section('js')
<script>
	document.getElementById('uploadInput').addEventListener('change', function () {
	    if (this.files.length > 0) {
	        document.getElementById('uploadForm').submit();
	    }
	});
	function confirmDelete(id) {
	    if (confirm('Bạn có chắc muốn xóa ảnh này?')) {
	        document.getElementById('delete-form-' + id).submit();
	    }
	}
</script>
@if($selectMode)
<script>
function selectMediaForParent(id, url, alt = '') {
    const inputId = @json($input);
    const isCkeditor = @json(request()->has('ckeditor'));
    const ckeditorFuncNum = @json(request()->get('CKEditorFuncNum'));

    if (!window.opener) {
        return;
    }

    // Case 1: CKEditor Browse Server
    if (isCkeditor && ckeditorFuncNum) {
        window.opener.CKEDITOR.tools.callFunction(ckeditorFuncNum, url, function() {
            var element = this.getDialog().getContentElement('info', 'txtAlt');

            if (element) {
                element.setValue(alt || '');
            }
        });

        window.close();
        return;
    }

    // Case 2: input cũ như thumbnail_id, og_image_id, logo...
    if (inputId) {
        const input = window.opener.document.getElementById(inputId);
        const preview = window.opener.document.getElementById(inputId + '_preview');

        if (input) {
            input.value = id;
        }

        if (preview) {
            preview.src = url;
            preview.style.display = 'block';
        }

        window.close();
    }
}
</script>
@endif
@endsection

@section('css')
<style type="text/css">

	.gallery-env article.image-thumb {
	    overflow: hidden;
	}
</style>

@endsection

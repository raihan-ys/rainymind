@extends('layouts.app')
@section('title', 'Write Post')
@section('css')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.css"/>
@endsection

@section('content')
	<h1>Write Post</h1>
	<form action="{{ route('posts.store') }}" method="POST">
		@csrf
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
			
		</div>
		<div class="mb-3">
			<label for="content" class="form-label">Content</label>
			<textarea class="form-control" id="content" name="content" required></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a class="btn btn-secondary mt-3" href="{{ route('posts.index') }}">Back to Posts</a>
@endsection

@section('js')
<script src="{{ asset('libs/ckeditor5/ckeditor.js') }}"></script>
<script>
	ClassicEditor
		.create(document.getElementById('content'), {
			ckfinder: {
				uploadUrl: ""
			}
		})
		.then(editor => {	
			console.log(editor)
		})
		.catch(error => {
			console.log(error)
		});
</script>
@endsection

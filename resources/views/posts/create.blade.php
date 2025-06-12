@extends('layouts.app')
@section('title', 'Write Post')
@section('css')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.css"/>
@endsection

@section('content')
	<h1>Write Post</h1>

	{{-- error messages --}}
	@if($errors->any())
		<div class="alert mt-1" style="background-color: bg-danger">
			<span class="float-right text-white" id="closeAlert" style="cursor: pointer">&times;</span>
			<strong class="text-white">
				<i class="fas fa-exclamation-triangle"></i> 
				Terjadi Kesalahan!
			</strong><hr>
			<ul>
				@foreach($errors->all() as $error)
					<li class="text-white">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{{-- /.error messages --}}
	
	<form action="{{ route('posts.store') }}" method="POST">
		@csrf
		<div class="mb-3">

			{{-- created by --}}
			<input type="hidden" name="created_by" value="{{ auth()->user()->id }}">

	 		{{-- category --}}	
			<label for="category">Category</label>
			<select class="form-select" id="category" name="category_id" required>
				<option value="">Select Category</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
				
			{{-- title --}}
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
			@if($errors->has('title'))
				{{-- error message --}}
				<span class="text-danger">
					{{ $errors->first('title') }}
				</span>
			@endif
		</div>

		{{-- content --}}
		<div class="mb-3">
			<label for="content" class="form-label">Content</label>
			<textarea class="form-control" id="content" name="content"></textarea>
			@if($errors->has('content'))
				{{-- error message --}}
				<span class="text-danger">
					{{ $errors->first('content') }}
				</span>
			@endif
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

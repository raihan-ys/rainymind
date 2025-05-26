@extends('layouts.app')
@section('title', 'Write Post')

@section('content')
	<h1>Edit Post</h1>
	<form action="{{ route('posts.update', $post->id) }}" method="POST">
		@csrf
		@method('put')
		<div class="mb-3">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
		</div>
		<div class="mb-3">
			<label for="content" class="form-label">Content</label>
			<textarea class="form-control" id="content" name="content" rows="10" required>{{ $post->content }}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a class="btn btn-secondary mt-3" href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
	
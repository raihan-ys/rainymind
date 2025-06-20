@extends('layouts.app')
@section('title', 'View Post')

@section('content')
	<h1>{{ $post->title }}</h1>
	<p>{{ $post->content }}</p>
	<p><strong>Created At:</strong> {{ $post->created_at->format('Y-m-d H:i') }}</p>
	<a class="btn btn-secondary" href="{{ route('posts.index') }}">Back to Posts</a>
	<a class="btn btn-warning" href="{{ route('posts.edit', $post) }}">Edit</a>
	<form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
@endsection

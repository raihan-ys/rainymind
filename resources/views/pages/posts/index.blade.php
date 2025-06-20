@extends('layouts.app')
@section('title', 'Posts')

@section('content')
	<h1>Posts</h1>
	<a class="btn btn-danger" href="{{ route('posts.create') }}">New Post</a>
	<table class="table table-striped mt-3">
		<thead>
			<tr>
				<th>Title</th>
				<th>Created At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
					<td>
						<a class="btn btn-info btn-sm" href="{{ route('posts.show', $post) }}">View</a>
						<a class="btn btn-warning btn-sm" href="{{ route('posts.edit', $post) }}">Edit</a>
						<form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

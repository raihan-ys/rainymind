@extends('layouts.app')
@section('title', 'User Details')

@section('content')
	<h1>
		<i class="fas fa-user"></i>
		@if (strlen($user->username) > 20)
			User Details: {{ substr($user->username, 0, 20).'...' }}
		@else
			User Details: {{ $user->username }}
		@endif
	</h1>
	<div class="card mt-3">
		<div class="card-body">
			<p class="card-text">Name: {{ $user->name }}</p>
			<p class="card-text">Email: {{ $user->email }}</p>
			<p class="card-text">Birthdate: {{$user->birthdate}}</p>
			<p class="card-text">Registered at: {{ $user->created_at->format('Y-m-d H:i') }}</p>
			<a href="{{ route('users.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back to Users</a>
			<form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete User</button>
			</form>
		</div>
	</div>
@endsection
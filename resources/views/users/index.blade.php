@extends('layouts.app')
@section('title', 'Users')
@section('css')
	<style>
		/* dataTables style */
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			background-color: #007bff;
			color: #fff !important;
			border-radius: 5px;
		}
		.dataTables_wrapper .dataTables_filter input {
			border: 1px solid #007bff;
			border-radius: 5px;
		}
	</style>
@endsection

@section('content')
	<h1>
		<i class="fas fa-users"></i>
		User Lists
	</h1>
	<p>Here you can view or delete registered users. <span class="text-danger">Be cautious when you try to delete a user.</span></p>
	<table class="table table-striped mt-3 table-bordered" id="usersTable">
		<caption>List of users</caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
					<td>
						<a class="btn btn-info btn-sm" href="{{ route('users.show', $user) }}"><i class="fas fa-eye"></i></a>
						<form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		// Initialize DataTable
    $('#usersTable').DataTable();
  });
</script>
@endsection

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="RainyMind - AI blog application">
		<title>@yield('title') - {{ config('app.name', 'RainyMind') }}</title>
		{{-- Bootstrap CSS --}}
		<link href="{{ asset('libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
		@yield('css')
	</head>
	<body>
		<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
			<div class="container">
				<a class="navbar-brand" href="{{ route('posts.index') }}">RainyMind</a>
				<a class="btn btn-primary" href="{{ route('posts.create') }}">New Post</a>
    	</div>
		</nav>

		<!-- content -->
		<div class="container">
			@yield('content')
		</div>

		<!-- scripts -->
		<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
		@yield('js')
	</body>
</html>

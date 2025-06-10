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
				<a class="navbar-brand" href="{{ route('home') }}">RainyMind</a>
				@guest
					<a class="btn btn-outline-primary" href="{{ route('login') }}">
						<i class="fas fa-key"></i> Login
					</a>
				@else
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
						@csrf
						<button type="submit" class="btn btn-danger">
							<i class="fas fa-power-off"></i> Logout
						</button>
					</form>
				@endguest
    	</div>
		</nav>

		<!-- content -->
		<div class="container">
			@yield('content')
		</div>

		{{-- jQuery JS --}}
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
		{{-- Bootstrap JS --}}
		<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
		@yield('js')
	</body>
</html>

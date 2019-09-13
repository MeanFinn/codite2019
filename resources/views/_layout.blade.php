<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>CODITE</title>
	@include('_styles')
	@yield('styles')
</head>
<body>
	<main>
		<div class="container-fluid pb-1">
			<div class="row justify-content-center">
				<div class="col-12 col-md-11 px-0">
					@yield('body')
				</div>
			</div>
		</div>
	</main>
	@if(!Request::is('login') && (!Request::is('logs')))
	<footer class="page-footer pt-0 mt-2">
		<div class="footer-copyright">
			<div class="container">
				Copyright ©{{ \Carbon\Carbon::parse($year, 'UTC')->isoFormat('YYYY') }}. Research and Development Unit.
			</div>
		</div>
	</footer>
	@endif
	@include('_scripts')
	@yield('scripts')
</body>
</html>
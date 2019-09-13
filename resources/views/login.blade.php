@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
@endsection

@section('body')
<div class="valign-center">
	<div class="container-fluid px-0">
		<div class="row justify-content-center mt-5 pt-3">
			<div class="col-12 col-sm-8 col-lg-5 px-0">
				<div class="card z-depth-3">
					<div class="container-fluid px-0">
						<div class="row justify-content-center">
							<div class="col-10 px-0">
								<h4 class="center-align mt-3">Login</h4>
								<form method="POST">
									{{ csrf_field() }}
									<div class="input-field">
										<input type="text" id="username" class="form-control validate" name="username" required>
										<label for="username">Username</label>
									</div>
									<div class="input-field mt-2">
										<input type="password" id="password" class="form-control validate" name="password" required>
										<label for="password">Password</label>
									</div>
									@if($message != NULL)
									<small style="color: red"><i class="fas fa-exclamation-triangle pr-2"></i>{{ $message }}</small>
									@endif
									<button class="btn mt-3 float-right" type="submit">Sign in</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
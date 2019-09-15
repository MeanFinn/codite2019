@extends('_layout')

@section('body')
<div class="card mt-3 mb-3 z-depth-3">
	<div class="card-header">
		<div class="row">
			<div class="col-8">
				<h3 class="ml-3">List of All Guests (Total: {{ number_format(count($total), 0, '.', ',') }})</h3>
			</div>
			<div class="col-4 align-middle">
				<a href="{{ url('/logout') }}" class="btn btn-danger float-right mb-2"><i class="fas fa-sign-out-alt pr-1"></i>Sign out</a>
				<a href="{{ url('/report') }}" class="btn btn-success float-right mr-2" title="Generate Report Document"><i class="fas fa-file-alt pr-1"></i>Report</a>
			</div>
		</div>
	</div>
	<div class="card-body px-0">
		<div class="container-fluid px-0">
			<div class="row justify-content-center">
				<div class="col-11">
					<form method="POST" class="form-inline justify-content-center">
						{{ csrf_field() }}
						<div class="input-group w-100 mb-3">
							<input type="text" name="search" class="form-control w-75" value="{{ $request->search }}" placeholder="Search...">
							<button class="btn btn-success" type="submit" title="Search"><i class="fas fa-search"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">School</th>
						<th scope="col">Position</th>
						<th scope="col">Time Registered</th>
					</tr>
				</thead>
				<tbody>
					@if(count($guests) > 0)
					@foreach($guests as $guest)
					<tr>
						<td>{{ $guest->last_name }}, {{ $guest->first_name }} @if($guest->middle_initial != NULL){{ $guest->middle_initial }}@endif</td>
						<td>{{ $guest->School }}</td>
						<td>@switch($guest->Position)
							@case('undefined')
							Not Specified (Ticket)
							@break
							@case('dean')
							Dean
							@break
							@case('assocdean')
							Associate Dean
							@break
							@case('deptchair')
							Department Chair
							@break
							@case('faculty')
							Faculty
							@break
							@case('others')
							Others
							@break
							@endswitch
						</td>
						<td>{{ \Carbon\Carbon::parse($guest->created_at, 'UTC')->isoFormat('MMMM D, YYYY - h:mm a') }}</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td><h5>No Guests Found.</h5></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	@if($page == 0)
	<div class="card-footer pb-0">
		<div class="container-fluid px-0">
			<div class="row float-right">
				<div class="col-12 col-md-10">
					{{ $guests->links() }}
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
@endsection

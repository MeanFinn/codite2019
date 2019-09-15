<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>School</th>
			<th>Position</th>
		
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $guest)
		<tr>
			<td>{{ $guest->last_name }}</td>
			<td>{{ $guest->first_name }}</td>
			<td>{{ $guest->middle_initial }}</td>
			<td>{{ $guest->school }}</td>
			<td>{{ $guest->position }}</td>
			<td>{{ \Carbon\Carbon::parse($guest->created_at)->isoFormat('MMMM D, YYYY') }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
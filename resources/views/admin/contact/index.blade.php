@extends('layouts.admin')

@section('title', 'Contacts')
@section('content')

	@if (session('success'))
		<div class="alert alert-success">
			<p>{{ session('success') }}</p>
		</div>
	@endif


	<table class="table-striped table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">E-mail</th>
				<th scope="col">Control</th>
			</tr>
		</thead>
		<tbody>
			@php $i = 0 @endphp
			@foreach ($contacts as $contact)
				<tr>
					<th scope="row">{{ ++$i }}</th>
					<td>{{ $contact->name }}</td>
					<td>{{ $contact->email }}</td>
					<td>

						<div class="container">
							<div class="row">
								<div class="col-sm">
									<a class='btn btn-dark' href="{{ route('contacts.show', $contact->id) }}"> Show </a>
								</div>
								<div class="col-sm">
									<form action="{{ route('contacts.delete', $contact->id) }}" method="post">
										@csrf
										@method('delete')
										<button class='btn btn-danger' type="submit">Delete</button>
									</form>
								</div>

							</div>
						</div>

					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection

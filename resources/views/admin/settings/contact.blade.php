@extends('layouts.admin')

@section('title', 'Settings')
@section('content')

	@if (session('success'))
		<div class="alert alert-success">
			<p>{{ session('success') }}</p>
		</div>
	@endif

	<form action="{{ route('settings.edit') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="md-3">
			<h3>Contact Settings</h3>
		</div>
		<div class="mb-3">
			<label for="contact-image" class="form-label">Contact Image</label>
			<input type="file" name="config[app.contact-image]" class="form-control" id="contact-image"
				placeholder="Contact image">
			@if (config('app.contact-image'))
				<img width="100" src="{{ asset('storage/' . config('app.contact-image')) }}" alt="" title="contact Image">
			@endif
            @error("config[app.contact-image]")
            <p class="text-danger">{{ $message }} </p>
            @enderror
        </div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>



	</form>


@endsection

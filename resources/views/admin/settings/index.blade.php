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

		<hr>
		<div class="md-3">
			<h3>App Setting</h3>
		</div>

		<div class="mb-3">
			<label for="app_name" class="form-label">App Name</label>
			<input type="text" name="config[app.name]" class="form-control" id="app.name" placeholder="App Name"
				value="{{ config('app.name') }}">
			@error('config[app.name]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>




		<div class="mb-3">
			<label for="description" class="form-label">App Description</label>
			<textarea class="form-control" name="config[app.description]" id="app.description" rows="3">{{ config('app.description') }}</textarea>
			@error('config[app.description]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>







		<div class="mb-3">
			<label for="main-title" class="form-label">App Title</label>
			<input type="text" name="config[app.main-title]" class="form-control" id="main-title" placeholder="App Title"
				value="{{ config('app.main-title') }}">
			@error('config[app.main-title]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>



		<div class="mb-3">
			<label for="contact-text" class="form-label">Contact Text</label>
			<textarea class="form-control" name="config[app.contact-text]" id="contact-text" rows="3">{{ config('app.contact-text') }}</textarea>
			@error('config[app.contact-text]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>

		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input" type="radio" name="config[app.locale]" id="arabic" value="ar"  @if(config('app.locale') == 'ar') checked @endif>
				<label class="form-check-label" for="arabic">
					Arabic
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="config[app.locale]" id="english" value="en" @if(config('app.locale') == 'en') checked @endif>
				<label class="form-check-label" for="english">
					English
				</label>
			</div>
			@error('config[app.locale]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>


		<div class="mb-3">
			<label for="cover-image" class="form-label">Main Image</label>
			<input type="file" name="config[app.cover-image]" class="form-control" id="cover-image" placeholder="Cover image">
			@if (config('app.cover-image'))
				<img width="100" src="{{ asset('storage/' . config('app.cover-image')) }}" alt="" title="Cover Image">
			@endif
			@error('config[app.cover-image]')
				<p class="text-danger">{{ $message }} </p>
			@enderror
		</div>



		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>


	</form>
@endsection

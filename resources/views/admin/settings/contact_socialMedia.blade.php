@extends('layouts.admin')

@section('title', 'Settings')
@section('content')

	@if (session('success'))
		<div class="alert alert-success">
			<p>{{ session('success') }}</p>
		</div>
	@endif

	<form action="{{ route('settings.edit') }}" method="post">
		@csrf

		<hr>
		<div class="md-3">
			<h3>Contact And Social Media Setting</h3>
		</div>

        <div class="mb-3">
			<label for="address" class="form-label">Address</label>
			<input type="text" name="config[app.address]" class="form-control" id="app.address" placeholder="Address"
				value="{{ config('app.address') }}">
			@error('config[app.address]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>


        <div class="mb-3">
			<label for="email" class="form-label">E-mail</label>
			<input type="email" name="config[app.email]" class="form-control" id="email" placeholder="E-mail"
				value="{{ config('app.email') }}">
			@error('config[app.email]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>


        <div class="mb-3">
			<label for="phone" class="form-label">Phone</label>
			<input type="text" name="config[app.phone]" class="form-control" id="phone" placeholder="phone"
				value="{{ config('app.phone') }}">

			@error('config[app.phone]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>




        <div class="md-3">
			<h3>Social Media Setting</h3>
		</div>

		<div class="mb-3">
			<label for="facebook" class="form-label">Facebook</label>
			<input type="text" name="config[app.facebook]" class="form-control" id="facebook" placeholder="Facebook"
				value="{{ config('app.facebook') }}">
			@error('config[app.facebook]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>


		<div class="mb-3">
			<label for="twitter" class="form-label">twitter</label>
			<input type="text" name="config[app.twitter]" class="form-control" id="twitter" placeholder="twitter"
				value="{{ config('app.twitter') }}">
			@error('config[app.twitter]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>


		<div class="mb-3">
			<label for="github" class="form-label">github</label>
			<input type="text" name="config[app.github]" class="form-control" id="github" placeholder="github"
				value="{{ config('app.github') }}">
			@error('config[app.github]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>


		<div class="mb-3">
			<label for="linkedin" class="form-label">linkedin</label>
			<input type="text" name="config[app.linkedin]" class="form-control" id="linkedin" placeholder="linkedin"
				value="{{ config('app.linkedin') }}">
			@error('config[app.linkedin]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>
		<hr>




		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>



    </form>


@endsection

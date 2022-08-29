@extends('layouts.admin')

@section('title', 'About Settings')
@section('content')

	@if (session('success'))
		<div class="alert alert-success">
			<p>{{ session('success') }}</p>
		</div>
	@endif

	<form action="{{ route('settings.edit') }}" method="post" enctype="multipart/form-data">
		@csrf

        <div class="mb-3">
			<label for="about-text" class="form-label">About Text</label>
			<textarea class="form-control" name="config[app.about-text]" id="about-text" rows="3">{{ config('app.about-text') }}</textarea>
			@error('config[app.about-text]')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>

        <div class="mb-3">
			<label for="about-image" class="form-label">About Image</label>
			<input type="file" name="config[app.about-image]" class="form-control" id="about-image" placeholder="About image">

			@if (config('app.about-image'))
				<img width="100" src="{{ asset('storage/' . config('app.about-image')) }}" alt="" title="about Image">
			@endif
            @error('config[app.about-image]')
            <p class="text-danger">{{ $message }} </p>
            @enderror
        </div>


		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>

    </form>


@endsection

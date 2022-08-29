@extends('layouts.front')

@section('content')
@include('front.includes._about')
	<!-- Main Content-->
	<main class="mb-4">
		<div class="px-lg-5 container px-4">
			<div class="row gx-4 gx-lg-5 justify-content-center">
				<div class="col-md-10 col-lg-8 col-xl-7">
					<p>{{ config('app.about-text') }}</p>
				</div>
			</div>
		</div>
	</main>
@endsection

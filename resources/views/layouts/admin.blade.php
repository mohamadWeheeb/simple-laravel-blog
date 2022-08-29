<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.101.0">
	<title>@yield('title' , 'Title')</title>




	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >



	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		.b-example-divider {
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
		}

		.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
		}

		.bi {
			vertical-align: -.125em;
			fill: currentColor;
		}

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}
	</style>


	<!-- Custom styles for this template -->
	<link href="{{ asset('dashboard\dashboard.css') }}" rel="stylesheet">
</head>

<body>

	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 fs-6 px-3" href="{{ route('admin.home') }}">{{ config('app.name') }}</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
			data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
			aria-label="Search">
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
                <form action="{{ route('logout') }}" id="formId" method="post">
                @csrf
                </form>
				<a class="nav-link px-3" href="javascript:" onclick="document.getElementById('formId').submit();" >Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="position-sticky sidebar-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<h6>Wellcome , {{ Auth::user()->name }} </h6>
						</li>


                        <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">
								<span data-feather="home" class="align-text-bottom"></span>
								Dashboard
							</a>
						</li>


						<li class="nav-item">
							<a class="nav-link" href="{{ route('articles.index') }}">
								<span data-feather="file" class="align-text-bottom"></span>
								Articles
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('categories.index') }}">
								<span data-feather="shopping-cart" class="align-text-bottom"></span>
								Categories
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('tags.index') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								Tags
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="{{ route('contacts.index') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								Contacts
							</a>
						</li>

                        <hr>
                        <p>Geniral Settings </p>
                        <li class="nav-item">
							<a class="nav-link" href="{{ route('settings.index') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								App Settings
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="{{ route('settings.socialMedia') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								Contact & Social Media
							</a>
						</li>

                        <hr>
                        <p>Pages Settings</p>
                        <li class="nav-item">
							<a class="nav-link" href="{{ route('settings.about') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								About Page Settings
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="{{ route('settings.contact') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								Contact Page Settings
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" target="_blank" href="{{ route('front.home') }}">
								<span data-feather="users" class="align-text-bottom"></span>
								Viset Website
							</a>
						</li>

                        {{-- <form action="{{ route('logout') }}" id="formId" method="post">
                            @csrf
                            </form>
                            <a class="nav-link px-3" href="javascript:" onclick="document.getElementById('formId').submit();" >Sign out</a> --}}


                        <li class="nav-item">
							<a class="nav-link" href="javascript:" onclick="document.getElementById('formId').submit();" >
								<span data-feather="users" class="align-text-bottom"></span>
								Logout
							</a>
						</li>


					</ul>

				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div
					class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
					<h1 class="h2">Dashboard</h1>
					<div class="btn-toolbar mb-md-0 mb-2">
						<div class="btn-group me-2">
							<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
							<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
						</div>
						<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
							<span data-feather="calendar" class="align-text-bottom"></span>
							This week
						</button>
					</div>
				</div>

                <h2>@yield('title' , 'Title')</h2>

				@yield('content')
			</main>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" >

	</script>

</body>

</html>

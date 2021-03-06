<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="regional-name" content="{{ LaravelLocalization::getCurrentLocaleRegional() }}">
	<meta name="lang" content="{{ app()->getLocale() }}">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">--}}

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<i class="fas fa-user"></i>{{ Auth::user()->name }} <span
											class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('profile') }}">
										{{ __('Profile') }}
									</a>
									<a class="dropdown-item" href="{{ route('view.later') }}">
										{{ __('View later list') }}
									</a>

									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
							{{--<li class="nav-item">--}}
								{{--<a class="nav-link" href="{{ route('logout') }}"--}}
								   {{--onclick="event.preventDefault();--}}
													 {{--document.getElementById('logout-form').submit();">--}}
									{{--{{ __('Logout') }}--}}
								{{--</a>--}}

								{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
									{{--@csrf--}}
								{{--</form>--}}
							{{--</li>--}}
						@endguest
						<li class="nav-item dropdown">

							<a id="navbarDropdownLang" class="nav-link dropdown-toggle language" href="#"
							   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<i class="fas fa-globe"></i>{{ __('Language') }} <span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLang">
								@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
									<a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
										{{ $properties['native'] }}
									</a>
								@endforeach
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		@guest
			<main class="py-4">
				@yield('content')
			</main>
		@else
			<main class="py-4-cover">
				@yield('content')
			</main>
		@endguest
	</div>
</body>
</html>

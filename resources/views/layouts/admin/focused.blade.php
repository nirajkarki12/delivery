<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<title>@yield('title') | {{ Setting::get('site_name', 'Laravel') }}</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Admin Dashboard">
	<link rel="shortcut icon" href=" @if(Setting::get('site_icon')) {{ Setting::get('site_icon') }} @else {{asset('favicon.png') }} @endif">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@yield('styles')

</head>

<body>
	<!-- Loader -->
{{--	<div id="preloader">--}}
{{--		<div id="status">--}}
{{--			<div class="spinner">--}}
{{--				<div class="rect1"></div>--}}
{{--				<div class="rect2"></div>--}}
{{--				<div class="rect3"></div>--}}
{{--				<div class="rect4"></div>--}}
{{--				<div class="rect5"></div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
	<!-- Begin page -->
	<div class="account-pages">
		<div class="container">
			<div class="row">
				<div class="col-md-12 align-items-center">
					<div class="col-lg-5" style="margin: 0 auto;">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-2">
									<h4 class="text-muted float-right font-18 mt-4">@yield('content-title')</h4>
									<div>
										<a href="{{route('admin.login')}}" class="logo logo-admin">
											<img src="@if(Setting::get('site_logo')) {{Setting::get('site_logo')}} @else {{asset('images/logo_white.png')}} @endif" height="40" alt="logo">
										</a>
									</div>
								</div>
								<div class="p-2">
									@yield('content')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{asset('template/js/modernizr.min.js')}}"></script>
	<script src="{{asset('template/js/waves.js')}}"></script>
	<script src="{{asset('template/js/app.js')}}"></script>

	@yield('scripts')

</body>

</html>


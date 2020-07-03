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
	<!-- Begin page -->
	<div class="accountbg"></div>
		<div class="wrapper-page">
			<div class="card">

				<div class="card-body">
					<h3 class="text-center m-t-0 m-b-15">
						<a href="{{route('admin.login')}}" class="logo"><img src="@if(Setting::get('site_logo')) {{Setting::get('site_logo')}} @else {{asset('images/logo_white.png')}} @endif" alt="logo-img"></a>
					</h3>
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{asset('template/js/modernizr.min.js')}}"></script>
	<script src="{{asset('template/js/detect.js')}}"></script>
	<script src="{{asset('template/js/fastclick.js')}}"></script>
	<script src="{{asset('template/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('template/js/jquery.blockUI.js')}}"></script>
	<script src="{{asset('template/js/waves.js')}}"></script>
	<script src="{{asset('template/js/wow.min.js')}}"></script>
	<script src="{{asset('template/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('template/js/jquery.scrollTo.min.js')}}"></script>
	<script src="{{asset('template/js/app.js')}}"></script>

	@yield('scripts')

</body>

</html>


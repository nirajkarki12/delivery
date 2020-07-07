<!Doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<title>@yield('title') | {{ Setting::get('site_name', 'Laravel') }}</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Admin Dashboard">
	<link rel="shortcut icon" href=" @if(Setting::get('site_icon')) {{ Setting::get('site_icon') }} @else {{asset('favicon.png') }} @endif">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	@yield('styles')

</head>

<body>
	<!-- Loader -->
	<div id="preloader">
		<div id="status">
			<div class="spinner">
				<div class="rect1"></div>
				<div class="rect2"></div>
				<div class="rect3"></div>
				<div class="rect4"></div>
				<div class="rect5"></div>
			</div>
		</div>
	</div>

	<div class="header-bg">
		<!-- Navigation Bar-->
		<header id="topnav">
			@include('layouts.admin.header')
			@include('layouts.admin.nav')
		</header>
	</div>

	<div class="wrapper">
		<div class="container-fluid">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<div class="page-title-box">
						<div class="row align-items-center">
							<div class="col-md-8">
								<h4 class="page-title m-0">@yield('title')</h4>
							</div>
							<div class="col-md-4">
								<div class="float-right d-none d-md-block">
									@yield('right-info')
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->
			@include('notification.notify')
			@yield('content')
		</div> <!-- end container-fluid -->
    </div> <!-- END wrapper -->
	@include('layouts.admin.footer')

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
{{--	<script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>--}}
	<script src="{{asset('template/js/modernizr.min.js')}}"></script>
	<script src="{{asset('template/js/waves.js')}}"></script>
	<script src="{{asset('template/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('template/js/app.js')}}"></script>

{{--	<script src="{{asset('template/js/fastclick.js')}}"></script>--}}
{{--	 <script src="{{asset('template/js/jquery.blockUI.js')}}"></script>--}}
{{--	 <script src="{{asset('template/js/wow.min.js')}}"></script>--}}
{{--	 <script src="{{asset('template/js/jquery.nicescroll.js')}}"></script>--}}
{{--	 <script src="{{asset('template/js/jquery.scrollTo.min.js')}}"></script>--}}

    @yield('scripts')
</body>
</html>

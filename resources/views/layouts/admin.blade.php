<!Doctype html>
<html class="no-js" lang="">
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

<body class="fixed-left">
	<!-- Begin page -->
	<div id="wrapper">
        @include('layouts.admin.header')

        @include('layouts.admin.nav')

		  <!-- Start right Content here -->
        <div class="content-page">

			  <!-- Start content -->
			  <div class="content">
				  <div class="">
					  <div class="page-header-title">
						  <h4 class="page-title">@yield('title')</h4>
					  </div>
				  </div>

					<!-- Main content -->
					<div class="page-content-wrapper">
						<div class="container-fluid">
							@yield('content')
						</div>
					</div>  <!-- Page content Wrapper -->
		  		</div> <!-- content -->

			  @include('layouts.admin.footer')

		  </div> <!-- End Right content here -->

    </div> <!-- END wrapper -->

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

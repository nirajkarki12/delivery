<div class="topbar-main">
	<div class="container-fluid">
		<!-- Logo-->
		<div>
			<a href="{{route('admin.dashboard')}}" class="logo">
				<img src="@if( Setting::get('site_logo')) {{ Setting::get('site_logo') }} @else {{asset('images/logo.png')}} @endif" alt="" height="26">
			</a>

		</div>
		<!-- End Logo-->

		<div class="menu-extras topbar-custom navbar p-0">

			<ul class="list-inline d-none d-lg-block mb-0">
				<li class="list-inline-item dropdown notification-list">
					<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="false" aria-expanded="false">
						Create New <i class="mdi mdi-plus"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-animated">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Separated link</a>
					</div>
				</li>
				<li class="list-inline-item notification-list">
					<a href="#" class="nav-link waves-effect">
						Activity
					</a>
				</li>

			</ul>

			<ul class="list-inline ml-auto mb-0">

				<!-- notification-->

				<li class="list-inline-item dropdown notification-list">
					<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="false" aria-expanded="false">
						<i class="mdi mdi-bell-outline noti-icon"></i>
						<span class="badge badge-pill noti-icon-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
						<!-- item-->
						<div class="dropdown-item noti-title">
							<h5>Notification (3)</h5>
						</div>

						<div class="slimscroll-noti">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item active">
								<div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
								<p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
								<p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
								<p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
								<p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
								<p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
							</a>

						</div>

						<!-- All-->
						<a href="javascript:void(0);" class="dropdown-item notify-all">
							View All
						</a>

					</div>
				</li>
				<!-- User-->
				<li class="list-inline-item dropdown notification-list nav-user">
					<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="false" aria-expanded="false">
						<img src="@if(Auth::guard('admin')->user()->picture){{Auth::guard('admin')->user()->picture}} @else {{asset('images/placeholder.jpg')}} @endif" alt="user" class="rounded-circle">
						<span class="d-none d-md-inline-block ml-1">{{Auth::guard('admin')->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
						<a class="dropdown-item" href="{{route('admin.profile')}}"><i class="dripicons-user text-muted"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
						<a class="dropdown-item" href="{{route('admin.config')}}"><span class="badge badge-success float-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
						<a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{route('admin.logout')}}"><i class="dripicons-exit text-muted"></i> Logout</a>

				<li class="menu-item list-inline-item">
					<!-- Mobile menu toggle-->
					<a class="navbar-toggle nav-link">
						<div class="lines">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
					<!-- End mobile menu toggle-->
				</li>

			</ul>

		</div>
		<!-- end menu-extras -->

		<div class="clearfix"></div>

	</div> <!-- end container -->
</div>
<!-- end topbar-main -->

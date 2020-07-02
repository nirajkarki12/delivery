<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">

		<!-- Sidebar user panel -->
{{--		<div class="user-panel">--}}
{{--			<div class="pull-left image">--}}
{{--				<img src="@if(Auth::guard('admin')->user()->picture){{Auth::guard('admin')->user()->picture}} @else {{asset('images/placeholder.jpg')}} @endif" class="img-circle" alt="User Image">--}}
{{--			</div>--}}
{{--			<div class="pull-left info">--}}
{{--				<p>{{Auth::guard('admin')->user()->name}}</p>--}}
{{--				<a href="{{route('admin.profile')}}">{{Auth::guard('admin')->user()->email}}</a>--}}
{{--			</div>--}}
{{--		</div>--}}

		<div id="sidebar-menu">
			<ul>
				<li class="menu-title">Menu</li>
				<li>
					<a href="{{route('admin.dashboard')}}" class="waves-effect"><i class="mdi mdi-home"></i><span> Dashboard </span></a>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> UI Elements </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="ui-components.html">Components</a></li>
						<li><a href="ui-buttons.html">Buttons</a></li>
						<li><a href="ui-cards.html">Cards</a></li>
						<li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
						<li><a href="ui-modals.html">Modals</a></li>
						<li><a href="ui-progressbars.html">Progress Bars</a></li>
						<li><a href="ui-alerts.html">Alerts</a></li>
						<li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
						<li><a href="ui-grid.html">Grid</a></li>
					</ul>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Forms </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="form-elements.html">General Elements</a></li>
						<li><a href="form-validation.html">Form Validation</a></li>
						<li><a href="form-advanced.html">Advanced Form</a></li>
						<li><a href="form-wysiwyg.html">WYSIWYG Editor</a></li>
						<li><a href="form-uploads.html">Multiple File Upload</a></li>
					</ul>
				</li>

				<li>
					<a href="typography.html" class="waves-effect"><i class="mdi mdi-diamond"></i><span> Typography <span class="badge badge-primary badge-pill float-right">4</span></span></a>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table"></i><span> Tables </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="tables-basic.html">Basic Tables</a></li>
						<li><a href="tables-datatable.html">Data Table</a></li>
						<li><a href="tables-responsive.html">Responsive Table</a></li>
						<li><a href="tables-editable.html">Editable Table</a></li>
					</ul>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-pie"></i><span> Charts </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="charts-morris.html">Morris Chart</a></li>
						<li><a href="charts-chartjs.html">Chartjs</a></li>
						<li><a href="charts-flot.html">Flot Chart</a></li>
						<li><a href="charts-other.html">Other Chart</a></li>
					</ul>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-opacity"></i> <span> Icons </span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="icons-material.html">Material Design</a></li>
						<li><a href="icons-ion.html">Ion Icons</a></li>
						<li><a href="icons-fontawesome.html">Font awesome</a></li>
						<li><a href="icons-themify.html">Themify Icons</a></li>
					</ul>
				</li>

				<li class="menu-title">Features</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-map"></i><span> Maps </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="maps-google.html"> Google Map</a></li>
						<li><a href="maps-vector.html"> Vector Map</a></li>
					</ul>
				</li>

				<li>
					<a href="calendar.html" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar <span class="badge badge-primary badge-pill float-right">NEW</span></span></a>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-assistant"></i><span> Layouts </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="layouts-collapse.html">Menu Collapse</a></li>
						<li><a href="layouts-smallmenu.html">Menu Small</a></li>
						<li><a href="layouts-menu2.html">Menu Style 2</a></li>
					</ul>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> Pages </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="pages-login.html">Login</a></li>
						<li><a href="pages-register.html">Register</a></li>
						<li><a href="pages-recoverpw.html">Recover Password</a></li>
						<li><a href="pages-lock-screen.html">Lock Screen</a></li>
						<li><a href="pages-blank.html">Blank Page</a></li>
						<li><a href="pages-404.html">Error 404</a></li>
						<li><a href="pages-500.html">Error 500</a></li>
						<li><a href="pages-timeline.html">Timeline</a></li>
						<li><a href="pages-invoice.html">Invoice</a></li>
						<li><a href="pages-directory.html">Directory</a></li>
					</ul>
				</li>

				<li class="has_sub">
					<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-share-variant"></i><span>Multi Menu </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
					<ul>
						<li class="has_sub">
							<a href="javascript:void(0);" class="waves-effect"><span>Menu Item 1.1</span> <span class="float-right"><i class="mdi mdi-plus"></i></span></a>
							<ul>
								<li><a href="javascript:void(0);"><span>Menu Item 2.1</span></a></li>
								<li><a href="javascript:void(0);"><span>Menu Item 2.2</span></a></li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);"><span>Menu Item 1.2</span></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->

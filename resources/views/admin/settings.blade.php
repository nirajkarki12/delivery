@extends('layouts.admin')

@section('title', 'Settings')

@section('content-header', 'Site Configuration')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active"><i class="fa fa-cogs"></i> Settings</li>
@endsection

@section('content')

@include('notification.notify')


    <div class="row">

        <div class="col-md-4">

			  <div class="card card-fill bg-dark text-white">
				  <div class="card-body">
					  <img class="profile-user-img img-responsive img-circle" src="@if( Setting::get('site_logo')) {{ Setting::get('site_logo') }} @else {{asset('images/logo.png')}} @endif">

					  <h3 class="profile-username text-center">{{ Setting::get('site_name', 'Laravel') }}</h3>
					  <p class="text-muted text-center">All Settings</p>

					  <ul class="list-group">
							<li class="list-group-item d-flex justify-content-between align-items-center">
								 <b>APIs Doc</b> <a href="{{route('apidoc')}}" class="pull-right" target="_new" title="APIs Docs">View</a>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								 <b>General Settings</b> <a class="pull-right">Site Name, Tagline, Description</a>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
								 <b>Data Format</b> <a class="pull-right">Data Per Page, Date Format, Time Format</a>
							</li>

					  </ul>
				 </div>
				</div>
        </div>

         <div class="col-md-8">
				 <ul class="nav nav-tabs" role="tablist">
					 <li class="nav-item">
						 <a class="nav-link active" data-toggle="tab" href="#generalConfig" role="tab">
							 <span class="d-none d-sm-block">General</span>
						 </a>
					 </li>

					 <li class="nav-item">
						 <a class="nav-link" data-toggle="tab" href="#dataConfig" role="tab">
							 <span class="d-none d-sm-block">Data Format</span>
						 </a>
					 </li>

					 <li class="nav-item">
						 <a class="nav-link" data-toggle="tab" href="#logoConfig" role="tab">
							 <span class="d-none d-sm-block">Logo/Icons</span>
						 </a>
					 </li>
				 </ul>

				 <div class="tab-content">

					  <div class=" tab-pane fade show active" id="generalConfig">

							<form class="form-horizontal" action="{{route('admin.config.save')}}" method="POST" role="form">
								 {{ csrf_field() }}
								 <div class="form-group">
									  <label for="site_name" required class="col-sm-2 control-label">Site Name</label>

									  <div class="col-sm-10">
										 <input type="text" class="form-control" id="site_name"  name="site_name" value="{{ Setting::get('site_name', 'Laravel') }}" placeholder="Site Name">
									  </div>
								 </div>

								 <div class="form-group">
									  <label for="site_tagline" class="col-sm-2 control-label">Tagline</label>

									  <div class="col-sm-10">
										 <input type="text" id="site_tagline" name="site_tagline" value="{{ Setting::get('site_tagline', 'App') }}" class="form-control" placeholder="Tagline">
									  </div>
								 </div>

								 <div class="form-group">
									  <label for="site_description" class="col-sm-2 control-label">Description</label>

									  <div class="col-sm-10">
											<textarea id="site_description" name="site_description" class="form-control" placeholder="Short Description">{{ Setting::get('site_description', '') }}</textarea>
									  </div>
								 </div>


								 <div class="form-group">
									  <div class="col-sm-offset-2 col-sm-10">
										 <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
									  </div>
								 </div>

							</form>
					  </div>

					  <div class="tab-pane fade" id="logoConfig">

							<form class="form-horizontal" action="{{route('admin.config.save')}}" method="POST" enctype="multipart/form-data" role="form">

								 {{ csrf_field() }}
								 <div class="form-group">
									  <label for="site_logo" required class="col-sm-2 control-label">Logo</label>

									  <div class="col-sm-10">
											<img class="img-responsive d-block" src="@if( Setting::get('site_logo')) {{ Setting::get('site_logo') }} @else {{asset('images/logo.png')}} @endif" style="margin-bottom:10px;width:150px;">

											<input type="file" accept="image/png, image/jpeg, image/jpg" id="site_logo" name="site_logo">
											<p class="help-block">Please enter .png .jpeg .jpg images only.</p>
									  </div>
								 </div>

								 <div class="form-group">
									  <label for="site_icon" required class="col-sm-2 control-label">Icon</label>

									  <div class="col-sm-10">
											<img class="img-responsive d-block" src="@if( Setting::get('site_icon')) {{ Setting::get('site_icon') }} @else {{asset('images/logo.png')}} @endif" style="margin-bottom:10px;width:150px;">

											<input type="file" accept="image/png, image/jpeg, image/jpg" id="site_icon" name="site_icon">
											<p class="help-block">Please enter .png .jpeg .jpg images only.</p>
									  </div>
								 </div>

								 <div class="form-group">
									  <div class="col-sm-offset-2 col-sm-10">
										 <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
									  </div>
								 </div>

							</form>
					  </div>

					  <div class="tab-pane fade" id="dataConfig">
							<form class="form-horizontal" action="{{route('admin.config.save')}}" method="POST" role="form">
								 {{ csrf_field() }}
								 <div class="form-group">
									  <label for="data_per_page" required class="col-sm-2 control-label">Data Per Page</label>

									  <div class="col-sm-10">
											<select class="form-control" id="data_per_page" name="data_per_page">
												 <option @if(Setting::get('data_per_page') == '10') selected @endif value="10">10</option>
												 <option @if(Setting::get('data_per_page') == '25') selected @endif value="25">25</option>
												 <option @if(Setting::get('data_per_page') == '50') selected @endif value="50">50</option>
												 <option @if(Setting::get('data_per_page') == '100') selected @endif value="100">100</option>
											</select>
									  </div>
								 </div>

								 <div class="form-group">
									  <label for="date_format" class="col-sm-2 control-label">Date Format</label>

									  <div class="col-sm-10">
											<select class="form-control" id="date_format" name="date_format">
												 <option @if(Setting::get('date_format') == 'j F, Y') selected @endif value="j F, Y">{{ date('j F, Y') }}</option>
												 <option @if(Setting::get('date_format') == 'd/m/Y') selected @endif value="d/m/Y">{{ date('d/m/Y') }}</option>
												 <option @if(Setting::get('date_format') == 'd-m-Y') selected @endif value="d-m-Y">{{ date('d-m-Y') }}</option>
												 <option @if(Setting::get('date_format') == 'y/m/d') selected @endif value="y/m/d">{{ date('y/m/d') }}</option>
												 <option @if(Setting::get('date_format') == 'Y/m/d') selected @endif value="Y/m/d">{{ date('Y/m/d') }}</option>
												 <option @if(Setting::get('date_format') == 'Y-m-d') selected @endif value="Y-m-d">{{ date('Y-m-d') }}</option>
											</select>
									  </div>
								 </div>

								 <div class="form-group">
									  <label for="time_format" class="col-sm-2 control-label">Time Format</label>

									  <div class="col-sm-10">
											<select class="form-control" id="time_format" name="time_format">
												 <option @if(Setting::get('time_format') == 'H:i') selected @endif value="H:i">{{ date('H:i') }}</option>
												 <option @if(Setting::get('time_format') == 'h:i a') selected @endif value="h:i a">{{ date('h:i a') }}</option>
												 <option @if(Setting::get('time_format') == 'h:i A') selected @endif value="h:i A">{{ date('h:i A') }}</option>
											</select>
									  </div>
								 </div>

								 <div class="form-group">
									  <div class="col-sm-offset-2 col-sm-10">
										 <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
									  </div>
								 </div>

							</form>
					  </div>

				 </div>

        </div>

    </div>

@endsection

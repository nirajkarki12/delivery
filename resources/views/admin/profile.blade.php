@extends('layouts.admin')

@section('title', 'Profile')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">

					<div class="col-md-4">
						<div class="card bg-dark text-white m-b-30">
							<div class="card-body">
								<img class="profile-user-img img-responsive" src="@if( $admin->picture) {{ $admin->picture}} @else {{asset('images/placeholder.jpg')}} @endif" alt="User profile picture">
								<h3 class="profile-username text-center">{{ $admin->name }}</h3>
								<p class="text-muted text-center">Admin</p>

								<ul class="list-group text-dark">
									<li class="list-group-item d-flex justify-content-between">
										<b>Full Name</b> <a class="pull-right">{{ $admin->name}}</a>
									</li>
									<li class="list-group-item d-flex justify-content-between">
										<b>Email</b> <a class="pull-right">{{ $admin->email}}</a>
									</li>

								</ul>
							</div>
						</div>

					</div>

					<div class="col-md-8">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#update-profile" role="tab">
									<span class="d-none d-md-block">Update Profile</span>
									<span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#change-password" role="tab">
									<span class="d-none d-md-block">Change Password</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active p-3" id="update-profile" role="tabpanel">
								<form class="form-horizontal" action="{{route('admin.profile.save')}}" method="POST" enctype="multipart/form-data" role="form">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{ $admin->id}}">

									<div class="form-group">
										<label for="name" required class="col-sm-2 control-label">Full Name</label>

										<div class="col-sm-10">
											<input type="text" class="form-control" id="name"  name="name" value="{{ $admin->name}}" placeholder="Full Name">
										</div>
									</div>

									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Email</label>

										<div class="col-sm-10">
											<input type="email" required value="{{ $admin->email}}" name="email" class="form-control" id="email" placeholder="Email">
										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
										</div>
									</div>

								</form>
							</div>
							<div class="tab-pane p-3" id="change-password" role="tabpanel">
								<form class="form-horizontal" action="{{route('admin.change.password')}}" method="POST" enctype="multipart/form-data" role="form">
									{{ csrf_field() }}

									<input type="hidden" name="id" value="{{ $admin->id}}">

									<div class="form-group">
										<label for="old_password" class="col-sm-3 control-label">Old Password</label>

										<div class="col-sm-8">
											<input required type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
										</div>
									</div>

									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">New Password</label>

										<div class="col-sm-8">
											<input required type="password" class="form-control" name="password" id="password" placeholder="New Password">
										</div>
									</div>

									<div class="form-group">
										<label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>

										<div class="col-sm-8">
											<input required type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
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

			</div>
		</div>
	</div>
</div>


@endsection

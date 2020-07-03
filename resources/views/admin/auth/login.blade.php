@extends('layouts.admin.focused')

@section('title', 'Login')

@section('content')
	<h4 class="text-muted text-center m-t-0"><b>Sign in</b></h4>

	<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('admin.login.post') }}">
		{{ csrf_field() }}

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<div class="col-12">
				<input type="email" class="form-control" name="email" placeholder="Email" value="{{Setting::get('demo_admin_email')}}">
				@if ($errors->has('email'))
					<span class="help-block">
						 <strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<div class="col-12">
				<input type="password" class="form-control" name="password" placeholder="Password" value="{{Setting::get('demo_admin_password')}}">
				@if ($errors->has('password'))
					<span class="help-block">
						 <strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-12">
				<div class="checkbox checkbox-primary">
					<input id="checkbox-signup" type="checkbox" checked>
					<label for="checkbox-signup">
						Remember me
					</label>
				</div>
			</div>
		</div>

		<div class="form-group text-center m-t-40">
			<div class="col-12">
				<button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
			</div>
		</div>
	</form>

@endsection

@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Password Reset</h3>
	</div>
	<div class="box-body">
		<form action="{{route('password_reset.update')}}" method="post" >
		{{ csrf_field() }}
			<div class="form-group">
				<label for="old_password">Current Password</label>
				<input type="password" id="old_password" class="form-control" name="old_password" placeholder="Password">
				@if ($errors->has('old_password'))
				<span class="text-danger">
					<strong>{{ $errors->first('old_password') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" id="password" name="password" class="form-control" placeholder="New password" required>
				@if ($errors->has('password'))
				<span class="text-danger">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<label for="password-confirm">Re-type New Password</label>
				<input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Retype password">
			</div>
			<div class="col-lg-12">
				<center>
					<button type="submit" value="Submit" class="btn btn-default">Reset</button>
				</center>
			</div>
		</form>
	</div>
</div>
@endsection
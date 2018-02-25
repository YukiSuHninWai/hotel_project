@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Create a New User</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<form action="{{route('user.store')}}" method="post" >
			{{ csrf_field() }}
			<div class="form-group">
				<label>User Name</label>
				<div class="input-group">
					<input type="text" id="name" class="form-control" name="name" placeholder="Name">
				</div>
				@if ($errors->has('name'))
				<span class=" text-danger">*
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group ">
				<label>Email</label>
				<div class="input-group date">
					<input type="email" id="email" class="form-control" name="email" placeholder="Email">
				</div>
				@if ($errors->has('email'))
				<span class="text-danger">*
					<strong class=>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
                <div class="input-group">
                  <label>
                    User Role
                  </label>
                  <select class="form-control" id="role" name="role">
                    <option value="super">Super</option>
                    <option value="admin">Hotel Admin</option>
                  </select>
                </div>
              </div>
			<div class="form-group ">
				<label>Password</label>
				<div class="input-group date">
					<input type="password" id="password" class="form-control" name="password" placeholder="Password">
				</div>
				@if ($errors->has('password'))
				<span class="text-danger">*
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group">
				<label>Password</label>
				<div class="input-group date">
					<input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Retype password">
				</div>
			</div>
			<div class="col-sm-12">
				<center>
					<button type="submit" value="Submit" class="btn btn-default">Create</button>
				</center>
			</div>
		</form>
	</div>
</div>
@endsection
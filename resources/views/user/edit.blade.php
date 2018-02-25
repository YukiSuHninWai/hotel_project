@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Edit your profile</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<form action="{{route('user.update',$user->id)}}" method="post" >
			{{ csrf_field() }}
			{{method_field('patch')}}
			<div class="form-group">
				<input id=name type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
				@if ($errors->has('name'))
				<span class="text-danger">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</div>
			<div class="form-group has-feedback">
				<input type="password" id="password-confirm" class="form-control" name="password_confirmation" required placeholder="Retype password">
			</div>
			<center>
				<button type="submit" value="Submit" class="btn btn-default">Edit</button>
			</center>
		</form>
	</div>
</div>
@endsection
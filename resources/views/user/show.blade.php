@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><span class="fa fa-user"> Your profile</span></h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class="table table-bordered table-striped datatable">
			<tr>
				<td> User Name</td>
				<td>{{$user->name}}</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>{{$user->email}}</td>
			</tr>
			<tr>
				<td>Role</td>
				<td>{{$user->role}}</td>
			</tr>					
		</table>
		<div class="col-lg-12">
			<center>
				<form action="{{ route('user.edit',$user->id) }}" method="get"> 
					{{ csrf_field() }} 
					{{method_field('patch')}}
					<button type="Submit" class="btn btn-default"><span class="fa fa-edit">Edit</span></button>
				</form>
			</center>
		</div>
	</div>
</div>
@endsection
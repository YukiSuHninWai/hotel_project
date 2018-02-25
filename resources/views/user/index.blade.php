@extends('layouts.master')
@section('content')
@if (Session::has('message'))
<div class="callout callout-info">
	<h4>Tip!</h4>
	<p>{{ Session::get('message') }}</p>
</div>
@endif
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped datatable">
					<a href="{{route('user.create')}}">
						<button class="btn btn-app">
							<i class="fa fa-plus"></i> Add User
						</button>
					</a>
					<thead>
						<tr>
							<th>No.</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Role</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
						<?php $i=0; ?>			
						@foreach($users as $user)
						<tr>
							<td>{{++$i}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->role}}</td>
							<td>
								<form action="{{ route('user.destroy',$user->id) }}" method="POST"> 
									{{ csrf_field() }} 
									{{method_field('delete')}}
									<button type="Submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
								</form>
							</td>
						</tr>
						@endforeach				
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
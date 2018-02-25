@extends('layouts.master')
@section('content')
@if (Session::has('message'))
<div class="alert {{ Session::get('alert-class', 'alert-success') }}">
	<div class="alert alert-success">
		{{ Session::get('message') }}
	</div>
</div>
@endif
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Reservation List</h3>
	</div>
	<div class="box-body">
		<table class="table table-bordered table-striped datatable">
			<a href="{{route('reservation.create')}}"><button class="btn btn-app">
				<i class="fa fa-plus"></i> Add Reservation
			</button></a>
			<thead>
				<tr>
					<th>No.</th>
					<th>Room Name</th>
					<th>User Name</th>
					<th>Check-in Date</th>
					<th>Check-out Date</th>
					<th>Reserved Date</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@foreach($reservations as $reservation)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$reservation->room->first()->roomName}}</td>
					<td>{{$reservation->user->first()->name}}</td>
					<td>{{$reservation->checkIn}}</td>
					<td>{{$reservation->checkOut}}</td>
					<td>{{$reservation->created_at}}</td>
					<td>
						<form action="{{ route('reservation.edit', $reservation->id) }}" method="get">
							{{ csrf_field() }}
							{{ method_field('edit') }}
							<button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button>
						</form>						
					</td>
					<td>
						<form action="{{ route('reservation.destroy', $reservation->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- /.box -->
	</div> 
</div>
</section>
</div>
</div>
@endsection
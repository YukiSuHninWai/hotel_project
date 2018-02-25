@extends('layouts.frontend')
@section('content')
<section class="rooms mt50">
	<div class="container">
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
							<th>Hotel</th>
							<th>Room Name</th>
							<th>User Name</th>
							<th>Check-in Date</th>
							<th>Check-out Date</th>
							<th>Reserved Date</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					@if(count($reservations)>0)
					<tbody>
						<?php $i=1; ?>
						@foreach($reservations as $reservation)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$reservation->hotel1->first()->hotelName}}</td>
							<td>{{$reservation->room->first()->roomName}}</td>
							<td>{{$reservation->user->first()->name}}</td>
							<td>{{$reservation->checkIn}}</td>
							<td>{{$reservation->checkOut}}</td>
							<td>{{$reservation->created_at}}</td>
							<td>
								<form action="{{ route('reservation.destroy', $reservation->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button class="btn btn-danger">Cancel Booking</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
					@else
					<tbody>
						<tr>
						<td colspan="9">
								No Booking Yet
							</td>
						</tr>
					</tbody>
					@endif
				</table>
				<!-- /.box -->
			</div> 
		</div>
	</section>
</div>
</div>
</section>
@endsection
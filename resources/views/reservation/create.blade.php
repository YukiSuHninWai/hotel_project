@extends('layouts.master')
@section('content')

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Reservation Edit</h3>
	</div>
	<div class="box-body">
		<form action="{{route('reservation.store')}}" method="post" >
			{{ csrf_field() }}
			<div class="form-group col-sm-4">
				<label> Room Name</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-pencil"></i>
					</div>
					<select name="roomId" class="form-control">
						@foreach ($rooms as $room)
						<option value='{{ $room->id }}'>{{ $room->roomName }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group col-sm-4">
				<label>Check In Date</label>

				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="date" class="form-control pull-right datepicker" name="checkIn" placeholder="Check-in Date">
				</div>
				<!-- /.input group -->
			</div>
			<div class="form-group col-sm-4">
				<label>Check Out Date</label>

				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="date" class="form-control pull-right datepicker" name="checkOut" placeholder="Check-out Date">
				</div>
			</div>
			<div class="col-sm-12">
				<center>
					<button type="submit" value="Submit" class="btn btn-default">Reserve</button>
				</center>
			</div>
		</form>
	</div>
</div>
<script>

</script>
@endsection
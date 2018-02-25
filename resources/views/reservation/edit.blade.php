</script>
<script type="text/javascript">
	$(function() {
		var temp={{ $reservation->roomId? $reservation->roomId:old('roomId')}}; 
		$("#roomId").val(temp);
	});
	$(function(){
		$('.datepicker').attr('min', maxDate);
	});

</script>
@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Reservation Edit</h3>
	</div>
	<div class="box-body">
		<form action="{{route('reservation.update',$reservation->id)}}" method="post" >
			{{ csrf_field() }}
			{{ method_field("patch")}}
			<div class="form-group col-sm-4">
				<label> Room Name</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-pencil"></i>
					</div>
					<select name="roomId" id="roomId" class="form-control">
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
					<input type="date" class="form-control pull-right datepicker" name="checkIn" value="{{ $reservation->checkIn? $reservation->checkIn:old('checkIn')}}">
				</div>
				<!-- /.input group -->
			</div>
			<div class="form-group col-sm-4">
				<label>Check Out Date</label>

				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="date" class="form-control pull-right datepicker" name="checkOut" value="{{ $reservation->checkOut? $reservation->checkOut:old('checkOut')}}">
				</div>
			</div>
			<center>
				<button type="submit" value="Submit" class="btn btn-default">Edit</button>
			</center>
		</form>
	</div>
</div>
<script>

</script>
@endsection
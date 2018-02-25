@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Room Type Edit</h3>
	</div>
	<div class="box-body">
		<form action="{{route('room_type.store')}}" method="post" >
			{{ csrf_field() }}
			<div class="form-group col-sm-4">
				<label>Room Type</label>
					<input type="text" class="form-control" name="type" placeholder="Room Type">
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
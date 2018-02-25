@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Room Type Edit</h3>
	</div>
	<div class="box-body">
		<form action="{{route('room_type.update',$room_type->id)}}" method="post" >
			{{ csrf_field() }}
			{{ method_field("patch")}}
			<div class="form-group col-sm-4">
				<label>Room Type</label>				
				<input type="text" class="form-control" name="type" value="{{ $room_type->type ? $room_type->type : old('type') }}">
			</div>
			<div class="col-lg-12">
				<center>
					<button type="submit" value="Submit" class="btn btn-default">Edit</button>
				</center>
			</div>			
		</form>
	</div>
</div>
@endsection
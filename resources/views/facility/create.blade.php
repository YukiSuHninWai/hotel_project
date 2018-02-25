@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Facility Edit</h3>
	</div>
	<div class="box-body">
		<form action="{{route('facility.store')}}" method="post" >
			{{ csrf_field() }}
			<div class="form-group col-sm-4">
				<label>Facility</label>
					<input type="text" class="form-control" name="facility" placeholder="Facility">
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
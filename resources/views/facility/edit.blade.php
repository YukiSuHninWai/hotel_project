@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Facility Edit</h3>
	</div>
	<div class="box-body">
		<form action="{{route('facility.update',$facility->id)}}" method="post" >
			{{ csrf_field() }}
			{{ method_field("patch")}}
			<div class="form-group col-sm-4">
				<label>Facility</label>				
				<input type="text" class="form-control" name="facility" value="{{ $facility->facility ? $facility->facility : old('facility') }}">
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
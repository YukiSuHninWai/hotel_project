@extends("layouts.master")

@section("content")
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Create a New Room</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="{{ route('rooms.store') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="roomName">Room Name</label>
						<input name="roomName" type="text" class="form-control" id="roomName" placeholder="Room Name">
						@if($errors->has('roomName'))
						<label class="text-danger" for="type"><small>{{ $errors->first('roomName') }}</small></label>
						@endif
					</div>
					<div class="form-group">
						<label for="type">Room Type</label>
						<select name="type" class="form-control">
							@foreach ($room_types as $key=>$value)
							<option value='{{ $key}}'>{{ $value }}</option>
							@endforeach
						</select>
						@if($errors->has('type'))
						<label class="text-danger" for="type"><small>{{ $errors->first('type') }}</small></label>
						@endif
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<input name="description" type="text" class="form-control" id="description" placeholder="Room Description">
						@if($errors->has('description'))
						<label class="text-danger" for="type"><small>{{ $errors->first('description') }}</small></label>
						@endif
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input name="price" type="text" class="form-control" id="price" placeholder="Price">
					</div>
					<div class="col-lg-12">	
						<center>	
							<button type="submit" class="btn btn-default">Submit</button>
						</center>	
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
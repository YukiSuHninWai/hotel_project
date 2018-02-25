@extends("layouts.master")
@section("content")
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Room List</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<form action="{{ route('rooms.update', $room->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field("patch")}}
					<div class="form-group">
						<label for="roomName">Room Name</label>
						<input name="roomName" type="text" class="form-control" id="roomName"  value="{{ $room->roomName ? $room->roomName : old('roomName') }}">
						@if($errors->has('roomName'))
						<label class="text-danger" for="roomName"><small>{{ $errors->first('roomName') }}</small></label>
						@endif
					</div>
					<div class="form-group">
						<label class="control-label" for="type">Room Type</label>
						<br>
						<select name="type" id="type" class="form-control">
							@foreach ($room_type as $rt)
							<option value='{{ $rt->id }}'>{{ $rt->type }}</option>
							@endforeach
						</select>
						@if($errors->has('type'))
						<label class="text-danger" for="type"><small>{{ $errors->first('type') }}</small></label>
						@endif
					</div>
					<div class="form-group">
						<label class="control-label" for="description">Description</label>
						<br>
						@if($errors->has('description'))
						<label class="text-danger" for="description"><small>{{ $errors->first('description') }}</small></label>
						@endif
						<input class="form-control" type="text" name="description" value="{{ $room->description ? $room->description : old('description') }}" />
					</div>
					<div class="form-group">
						<label class="control-label" for="price">Price</label>
						<br>
						@if($errors->has('price'))
						<label class="text-danger" for="price"><small>{{ $errors->first('price') }}</small></label>
						@endif
						<input class="form-control" type="text" name="price" value="{{ $room->price ? $room->price : old('price') }}" />
					</div>
					<div class="col-lg-10">
						<center>
							<button type="submit" class="btn btn-primary">Update</button>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<script type="text/javascript">
	$(function() {
		var temp={{ $room->type? $room->type:old('type')}}; 
		$("#type").val(temp);
	});
</script>
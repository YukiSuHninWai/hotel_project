@extends("layouts.master")

@section("content")
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Room List</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<a href="{{route('rooms.create')}}">
				<button class="btn btn-app">
				<i class="fa fa-plus"></i> Add New Room
				</button>
			</a>
		</div>

		<div class="box-footer no-padding col-md-4">
			<ul class="nav nav-stacked">
			@foreach($room_count as $count)
				<li><a href="#">{{$count->room_type1->type}} <span class="pull-right badge bg-red">{{$count->total}}</span></a></li>
			@endforeach
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-stripped datatable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Type</th>
							<th>Description</th>
							<th>Price</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=1; ?>
						@foreach($rooms as $room)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $room->room_type1->type }}</td>
							<td>{{ $room->description }}</td>
							<td>{{ $room->price }}</td>
							<td>
								<form action="{{ route('rooms.edit', $room->id) }}" method="get">
									{{ csrf_field() }}
									{{ method_field('edit') }}
									<button class="btn btn-primary">Edit</button>
								</form>
								<!-- <a class="btn btn-default" href="{{ route('rooms.edit',$room->id) }}">Edit</a> -->
							</td>
							<td>
								<form action="{{ route('rooms.destroy', $room->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button class="btn btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
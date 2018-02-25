@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Room Type</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		
		<a href="{{route('room_type.create')}}"><button class="btn btn-app">
			<i class="fa fa-plus"></i> New Room Type
		</button></a>
		@if($room_type->count() > 0)
		<?php $count=1; ?>
		<table class="table table-hover table-bordered table-striped">

			<thead>
				<th>Id</th>
				<th>Room Type</th>
			</thead>
			<tbody>
				@foreach($room_type as $rt)
				<tr>
					<td>{{$count++}}</td>
					<td>{{$rt->type}}<td>
						<td>
							<form action="{{ route('room_type.edit', $rt->id) }}" method="get">
								{{ csrf_field() }}
								{{ method_field('edit') }}
								<button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button>
							</form>	
						</td>
						<td>
							<form action="{{ route('room_type.destroy', $rt->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
							</form>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
			{{ $room_type->links() }}
			@endif
		</div>
	</div>
@endsection
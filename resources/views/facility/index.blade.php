@extends('layouts.master')
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">General Facilities</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">		
		<a href="{{route('facility.create')}}"><button class="btn btn-app">
			<i class="fa fa-plus"></i> Add Facility
		</button></a>
		<?php $count=1; ?>
		<table class="table table-hover table-bordered table-striped datatable">

			<thead>
				<th>Id</th>
				<th>Facility</th>
			</thead>
			<tbody>
				@foreach($facilities as $facility)
				<tr>
					<td>{{$count++}}</td>
					<td>{{$facility->facility}}<td>
						<td>
							<form action="{{ route('facility.edit', $facility->id) }}" method="get">
								{{ csrf_field() }}
								{{ method_field('edit') }}
								<button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button>
							</form>	
						</td>
						<td>
							<form action="{{ route('facility.destroy', $facility->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
							</form>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	@endsection
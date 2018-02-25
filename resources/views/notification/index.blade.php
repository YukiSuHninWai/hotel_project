@extends("layouts.master")
@section("content")
<div class="row">
	<div class="col-md-12">
		<!-- The time line -->
		@if(count($notifications) < 1)
		<h1>No Notification</h1>
		@else
		<ul class="timeline">
			@foreach($notifications as $notification)
			<li>
				<i class="fa fa-bell bg-aqua"></i>
				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> {{$notification->created_at}}</span>
					<h3 class="timeline-header no-border">{{$notification->content}}</h3>
				</div>
			</li>
			@endforeach
			<!-- END timeline item -->
			<li>
				<i class="fa fa-clock-o bg-gray"></i>
			</li>
		</ul>
		@endif
	</div>
	<!-- /.col -->
</div>

@endsection
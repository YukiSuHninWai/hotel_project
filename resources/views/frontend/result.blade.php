@extends('layouts.frontend')
@section('content')
@if(count($results)>0)
<section class="rooms mt50">
	<div class="container">
		<div class="row">
			@foreach($results as $result)
			<div class="col-lg-4 col-sm-4">
				@if(count($result->image)>0)
				<?php $image_name = $result->image->first()->image_name.".".$result->image->first()->image_extension?>
				<div class="room-thumb"> <img src="{{asset('imgs/'.$image_name)}}" alt="room 2" class="img-responsive" />
					@else
					<div class="room-thumb"> <img src="frontend/images/rooms/356x228.gif" alt="Photo Not Available" class="img-responsive" />
						@endif
						<div class="mask">
							<div class="main">
								<h5>{{$result->hotelName }}</h5>								
								<span class="text-info">
									({{$result->room_count->count()-$result->room->count()}} rooms left)
								</span>
								<div class="price">{{$result->room->avg('price')}}<span>average per night</span></div>
							</div>
							<div class="content"><p>
								{{$result->description}}
							</p>
							<div class="row">
								@if(count($result->facility)>0)
								<div class="col-xs-12">
									<ul class="list-unstyled">
										@foreach($result->facility as $facility)
										<div class="col-xs-6">
											<li><i class="fa fa-check-circle">{{$facility->facility}}</i></li>
										</div>
										@endforeach
									</ul>
								</div>
								@endif
							</div>
							<div class="footer">
								<div class="col-sm-12 col-lg-12">
									<form action="{{ route('view.show', $result->id)}}" method="get">
										<button type="submit" class="btn btn-primary btn-block">View Hotel</span></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach	
			@else
			<h1>No Match with our desination</h1>
			@endif
		</div>
	</div>
</section>
@endsection
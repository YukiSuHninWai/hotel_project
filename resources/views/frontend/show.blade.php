@extends('layouts.frontend')
@section('content')
<!-- Parallax Effect -->
<script type="text/javascript">$(document).ready(function(){$('#parallax-pagetitle').parallax("50%", -0.55);});</script>
<section class="parallax-effect">
	<div id="parallax-pagetitle" style="background-image: url({{asset('img/parallax/1900x911.gif')}});">
		<div class="color-overlay"> 
			<!-- Page title -->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>{{$hotel->hotelName}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container mt50">
		<div class="row"> 
			<!-- Slider -->
			<section class="standard-slider room-slider">
				<div class=" col-md-8">
					<div id="owl-standard" class="owl-carousel">
						@if(count($hotel->images)>0)
						@foreach($hotel->images as $image)
						<?php $image_name = $image->image_name.".".$image->image_extension?>
						<div class="item"> <a href="frontend/images/rooms/slider/750x481.gif" data-rel="prettyPhoto[gallery1]"><img src="{{asset('imgs/'.$image_name)}}" alt="room 2" class="img-responsive" /></a> </div>
						@endforeach
						@else
						<div class="item"> <a href="frontend/images/rooms/slider/750x481.gif" data-rel="prettyPhoto[gallery1]"><img src="{{asset('frontend/images/rooms/slider/750x481.gif')}}" alt="room 2" class="img-responsive" /></a> </div>
						@endif
					</div>
				</div>
				<div class=" col-md-4">
					<h2 class="lined-heading"><span>Information</span></h2>
					<table class="table table-striped">
						<tr>
							<td>Address</td>
							<td>{{$hotel->street_number}},{{$hotel->route}},{{$hotel->city}},{{$hotel->state}}</td>
						</tr>
						<tr>
							<td>Country</td>
							<td>{{$hotel->country}}</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>{{$hotel->phoneNumber}}</td>
						</tr>
						<tr>
							<td>Star Rating</td>
							<td>
								@for($i = 0; $i<$hotel->starRating;$i++)
								<span class="fa fa-star-o"></span>
								@endfor
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!-- Room Content -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 mt50">
					<h2 class="lined-heading"><span>Facilities</span></h2>
					@if(count($hotel->facility)>0)
					<div class="col-xs-12">
						<ul class="list-unstyled">
							@foreach($hotel->facility as $facility)
							<div class="col-xs-4">
								<li><i class="fa fa-check-circle">{{$facility->facility}}</i></li>
							</div>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="col-sm-12 mt50">
					<h2 class="lined-heading"><span>Description</span></h2>
					<p class="mt50">{{$hotel->description}}</p>
				</div>
				<div class="col-sm-12 mt50">
					<h2 class="lined-heading"><span>Avaiable Room At Your Date</span></h2>
					<p class="mt50">
						<div class="alert alert-success">
							{{$hotel->room_count->count()-$hotel->room->count()}} {{$room_type->first()->type}} rooms left for your date
						</div>
					</p>
				</div> 
				<div class="row">
					<h2 class="lined-heading"><span>All Available rooms on your date</span></h2>
					<p class="mt50">
						<div class="col-sm-8">					
							@if(count($rooms)>0)
							<table class="table table-striped">
								<tr>
									<th></th>
									<th>Room Type</th>
									<th>Price</th>
									<th>Description</th>
									<th></th>
								</tr>
								<?php $i=1; ?>
								@foreach($rooms as $room)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$room->room_type1->type}}</td>
									<td>{{$room->price}} {{$room->unit}}</td>
									<td>{{$room->description}}</td>
									<td>
										<!-- <input type="checkbox" id="{{$room->id}}" name="{{$room->id}}" value="{{$room->id}}"> -->
										@if(\Auth::user())	
										<form action="{{ route('userReservation') }}" method="post">
											{{ csrf_field() }}
											<input type="hidden" name="room_id" id="room_id" value="{{$room->id}}"/>
											<button class="btn btn-default"><span class="fa fa-edit"></span></button>
										</form>	
										@endif
									</td>
								</tr>
								@endforeach
							</table>
							@else
							No More Room Avaialbe
							@endif
						</p>
					</div>
				</div>         
			</section>
		</div>
	</div>
	@endsection
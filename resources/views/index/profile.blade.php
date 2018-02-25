@extends('layouts.master')
@section('content')
<div class="box box-primary">
  <!-- /.box-header -->
  <div class="box-header with-border">
    <h3 class="box-title">Profile</h3>
  </div>
  <div class="box-body">
    <div class="panel panel-primary">
      <div class="panel-heading">{{$hotel->hotelName}}</div>
      <div class="panel-body">
        <table class="table table-striped">
          <tr><th>Star Rating </th><td>{{$hotel->starRating}}</td></tr>
          <tr><th>Address</th><td>{{$hotel->street_number}},{{$hotel->route}},{{$hotel->state}},{{$hotel->city}},{{$hotel->country}}</td></tr>
          <tr><th>Description</th><td>{{$hotel->description}}</td></tr>
          <tr><th>Phone Number</th><td>{{$hotel->phoneNumber}}</td></tr>
        </table>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Facility</div>
      <div class="panel-body">
        @foreach ($hotel->facility as $facility)
        <div class="col-md-3"> 
          <span id="{{$facility->pivot->facility_id}}" class="facility{{$facility->pivot->data}}"> </span>
          {{$facility->facility}}
        </div>
        @endforeach
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Room</div>
      <div class="panel-body">
        <table class="table table-striped">
          @foreach($room_count as $count)
          <tr><th>{{$count->room_type1->type}} Room </th><td>{{$count->total}}</td></tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">Images</div>
      <div class="panel-body">     
       @if(count($images)>0)
       <table class="table table-hover table-bordered table-striped">
        <thead>
         <th>Image</th>
         <th>Name</th>
         <th>Date Created</th>
       </thead>
       <tbody>
         @foreach($images as $hotelImage)
         <tr>
          <?php $image_name="thumb-".$hotelImage->image_name.".".$hotelImage->image_extension ?>
          <td><img src="{{asset('imgs/thumbnail/'.$image_name)}}"></td>
          <td>{{ $hotelImage->image_name }}.{{ $hotelImage->image_extension }}</td>
          <td>{{ $hotelImage->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
      @else
      <h5>No Images Availbale</h5>
      @endif        
    </table>
  </div>
</div>
</div>
</div>
@endsection
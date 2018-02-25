@extends('layouts.master')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">General Facilities</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form action="{{route('hotel_facility.update',$hotel->id)}}" method="post">
      {{ csrf_field() }}
      {{ method_field("patch")}}
      @foreach ($hotel->facility as $facility)
      <div class="col-md-3">
       <input type="hidden" id="{{$facility->pivot->facility_id}}" name="{{$facility->pivot->facility_id}}" value="0">
       <input type="checkbox" id="{{$facility->pivot->facility_id}}" name="{{$facility->pivot->facility_id}}" value="1" class="check{{$facility->pivot->data}}">{{$facility->facility}}
     </div>
     @endforeach

     <div class="col-sm-12">
       <p align="center">
        <button type="submit" value="Submit"><i class="fa fa-edit"></i>Update</button>
      </p>
    </div>
  </div>
</div>
</div>
</form>

@endsection
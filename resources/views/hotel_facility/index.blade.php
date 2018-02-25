@extends('layouts.master')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">General Facilities</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @foreach ($hotel->facility as $facility)
    <div class="col-md-3"> 
      <span id="{{$facility->pivot->facility_id}}" class="facility{{$facility->pivot->data}}"> </span>
      {{$facility->facility}}
    </div>
    @endforeach
    <div class="col-sm-12">
     <p align="center">
      <a  href="{{ route('hotel_facility.edit',$hotel->id) }}"><button class="btn btn-primary">
        <i class="fa fa-edit"></i>
        Update</button></a>
      </p>
    </div>
  </div>
</div>


@endsection
 <style type="text/css">
  #map {
    width: 200px;
    height: 200px;
    border: 1px solid blue;
  }
  .profile-panel-body {
   padding: 10;
   border: 1px solid #4d9ebc;
 }
 div.input-group div.input-group-addon{
  background-color: #4d9ebc;
  color : #FFFFFF;        
  border: 1px solid #4d9ebc;
}
.input-group{
  margin-bottom: 10px;
  width: 100%;
}
</style> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>



@extends('layouts.master')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Profile</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-addon">Hotel name</div>
          <div class="profile-panel-body">
            {{ $hotel->hotelName}}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-addon">Phone Number</div>
          <div class="profile-panel-body">
            {{ $hotel->phoneNumber}}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-addon">Number of Room</div>
          <div class="profile-panel-body">
            {{ $hotel->noOfRoom}}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-addon">StarRating</div>
          <div class="profile-panel-body">
            {{ $hotel->starRating}}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-addon">Description</div>
          <div class="profile-panel-body">
            {{ $hotel->description}}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-sm-4">
              <div class="input-group">
                <div class="input-group-addon">Address</div>
                <div class="profile-panel-body">
                  {{ $hotel->street_number}},{{$hotel->route}},{{$hotel->locality}}
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="input-group-addon">City</div>
                <div class="profile-panel-body">
                  {{ $hotel->city}}
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="input-group-addon">State</div>
                <div class="profile-panel-body">
                  {{ $hotel->state}}
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group">
                <div class="input-group-addon">Country</div>
                <div class="profile-panel-body">
                  {{ $hotel->country}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <center>
        <a  href="{{ route('index.edit',$hotel->id) }}"><button class="btn btn-primary">
          <i class="fa fa-edit"></i>
          Update</button></a>
        </center>
      </div>
    </div>
  </div>
  @endsection
  
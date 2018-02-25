  <style type="text/css">
    #map {
      width: 500px;
      height: 400px;
      border: 1px solid blue;
    }
    .rating {
      float:left;
      width:300px;
    }
    .rating {
      display: inline-block;
      position: absolute;
      height: 30px;
      line-height: 30px;
      font-size: 30px;
    }

    .rating label {
      position: absolute;
      top: 0;
      left: p;
      height: 100%;
      cursor: pointer;
    }

    .rating label:last-child {
      position: static;
    }

    .rating label:nth-child(1) {
      z-index: 5;
    }

    .rating label:nth-child(2) {
      z-index: 4;
    }

    .rating label:nth-child(3) {
      z-index: 3;
    }

    .rating label:nth-child(4) {
      z-index: 2;
    }

    .rating label:nth-child(5) {
      z-index: 1;
    }

    .rating label input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
    }

    .rating label .icon {
      float: left;
      color: transparent;
    }

    .rating label:last-child .icon {
      color: #999;
    }

    .rating:not(:hover) label input:checked ~ .icon,
    .rating:hover label:hover input ~ .icon {
      color: #ff0;
    }

    .rating label input:focus:not(:checked) ~ .icon:last-child {
      color: #ddd;
      text-shadow: 0 0 5px #ff0;
    }
    textarea{
      border-bottom: 
      a}
      .card {
        display: inline-block;
        position: relative;
        width: 100%;
        margin: 25px 0;
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
        border-radius: 3px;
        color: rgba(0,0,0, 0.87);
        background: #fff;
        padding: 10px;
      }
      table{


        margin-top: 10px;
      }
      .card-header{
        box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        margin: -20px 15px 0;
        border-radius: 3px;
        padding: 15px;
        background-color: #2286ff;
      }
      div.tablepadding{
        box-shadow: 0px 2px 4px rgba(99,99,99,0.5);
        padding: 15px;
        border-radius: 10px;
      }
      div.input-group div.input-group-addon{
        background-color: #4d9ebc;
        color : #FFFFFF;
      }
    </style> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(function() {
        var temp={{ $hotel->starRating? $hotel->starRating:old('starRating')}}; 
        $("#starRating").val(temp);
      });

    </script>
    @extends('layouts.master')

    @section('content')


    <form action="{{route('index.update',$hotel->id)}}" method="post">
      {{ csrf_field() }}
      {{ method_field("patch")}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Profile</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    Hotel Name
                  </div>
                  <input id="hotelname" name="hotelname" class="form-control" placeholder="Hotel Name" value="{{ $hotel->hotelName? $hotel->hotelName:old('hotelName')}}">   
                </div><!-- /.input group -->
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    Phone Number
                  </div>
                  <input class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $hotel->phoneNumber? $hotel->phoneNumber:old('phoneNumber')}}">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    Number of Room
                  </div>
                  <input id="noOfRoom" name="noOfRoom" class="form-control" placeholder="Number of Room"
                  value="{{ $hotel->noOfRoom? $hotel->noOfRoom:old('noOfRoom')}}"> 
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    StarRating
                  </div>
                  <select class="form-control" id="starRating" name="starRating">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    Description about your hotel:
                  </div>
                  <textarea id="description" name="description" class="form-control">
                    {{$hotel->description? $hotel->description:old('description')}}
                  </textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="container-fluid">
              <div class="panel panel-default">
                <div class="panel-body" id="address">
                  <div id="locationField">
                    <label>Enter Your address</label>
                    <input id="autocomplete" class="form-control" placeholder="Enter your address"
                    onFocus="geolocate()" type="text"></input>
                  </div>
                  <p></p><p></p>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          Street Number
                        </div>
                        <input class="form-control" name="street_number" id="street_number" disabled="true" >
                        @if ($errors->has('street_number'))
                        <span class=" text-danger">*
                          <strong>{{ $errors->first('street_number') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          Route
                        </div>
                        <input class="form-control" name="route" id="route" disabled="true" value="{{$hotel->route? $hotel->route:old('route')}}">
                        @if ($errors->has('route'))
                        <span class=" text-danger">*
                          <strong>{{ $errors->first('route') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          City
                        </div>
                        <input class="form-control" name="city" id="locality" disabled="true" value="{{$hotel->city? $hotel->city:old('city')}}" ></input>
                        @if ($errors->has('city'))
                        <span class=" text-danger">*
                          <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          State
                        </div>
                        <input class="form-control" name="state" id="administrative_area_level_1" disabled="true" value="{{$hotel->state? $hotel->state:old('state')}}">
                        @if ($errors->has('state'))
                        <span class=" text-danger">*
                          <strong>{{ $errors->first('state') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          Country
                        </div>
                        <input class="form-control" name="country" id="country" disabled="true" value="{{$hotel->country? $hotel->country:old('country')}}">
                        @if ($errors->has('country'))
                        <span class=" text-danger">*
                          <strong>{{ $errors->first('country') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          Zip Code
                        </div>
                        <input class="form-control" name="zip_code" id="postal_code" disabled="true" value="{{$hotel->zip_code? $hotel->zip_code:old('zip_code')}}">
                        @if ($errors->has('zip_code'))
                        <span class=" text-danger">*
                          <strong>{{ $errors->first('zip_code') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <center>
              <button type="submit" value="Submit" class="btn btn-primary">Update</button>
            </center>
            <p style="padding-bottom: : 101px;">
            </div>
          </div>
        </form>
      </section>
    </div>
    @endsection
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPMTaxyJTJhbk7Yp91Mo9mT9DhE0MTV-A&libraries=places&callback=initAutocomplete"
    async defer>
  </script>
  <script>
    var placeSearch, autocomplete;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
          {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(
          input, {placeIdOnly: true});
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var geocoder = new google.maps.Geocoder;
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();

          if (!place.place_id) {
            return;
          }
          geocoder.geocode({'placeId': place.place_id}, function(results, status) {

            if (status !== 'OK') {
              window.alert('Geocoder failed due to: ' + status);
              return;
            }
            map.setZoom(11);
            map.setCenter(results[0].geometry.location);
            // Set the position of the marker using the place ID and location.
            marker.setPlace({
              placeId: place.place_id,
              location: results[0].geometry.location
            });
            marker.setVisible(true);
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-id'].textContent = place.place_id;
            infowindowContent.children['place-address'].textContent =
            results[0].formatted_address;
            infowindow.open(map, marker);
          });
        });
      }
    </script>
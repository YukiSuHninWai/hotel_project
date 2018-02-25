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
    @extends('layouts.frontend')
    @section('content')
  <!-- Revolution Slider -->
  <section class="revolution-slider">
    <div class="bannercontainer">
      <div class="banner">
        <ul>
          <!-- Slide 1 -->
          <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" > 
            <!-- Main Image --> 
            <img src="{{asset('frontend/images/slides/slide.jpg')}}" style="opacity:0;" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat"> 
          </li>        
        </ul>
      </div>
    </div>
  </section>
  <!-- Reservation form -->
  <section id="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">         
          <form class="form-inline reservation-horizontal clearfix" method="post"  action="{{route('search')}}">
            {{ csrf_field() }}
            <div id="message"></div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="place">Destination place</label>
                  <div id="locationField">
                    <input id="autocomplete" name="place" placeholder="Enter your destination"
                    onFocus="geolocate()" class="form-control" type="text"></input>
                  </div>    
                  <table id="address">
                    <input class="field" name="street_number" type="hidden" id="street_number"></input>
                    <input class="field" name="route" type="hidden" id="route"></input>
                    <input class="field" name="locality" type="hidden" id="locality"></input>
                    <input class="field" name="state" type="hidden" id="administrative_area_level_1"></input>
                    <input class="form-control" name="zip_code" id="postal_code" type="hidden" disabled="true">
                    <input class="field" name="country" type="hidden" id="country"></input>
                  </table>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPMTaxyJTJhbk7Yp91Mo9mT9DhE0MTV-A&libraries=places&callback=initAutocomplete"
                  async defer>
                </script>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="checkin">Check-in</label>
                <input name="checkin" type="date" class="form-control" required />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="checkout">Check-out</label>
                <input name="checkout" type="date" class="form-control" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="room">Room Type</label>
                <select class="form-control" name="room" id="room">
                  @foreach($room_types as $room_type)
                  <option value="{{$room_type->id}}">{{$room_type->type}}</option>
                  @endforeach
                </select>
              </div>
            </div>              
            <div class="col-sm-1">
              <div class="form-group">
                <label for="count">Count</label>
                <select class="form-control" name="count" id="room">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <button type="submit" value="Submit" class="btn btn-primary btn-block">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Starhotel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="{{asset('frontend/favicon.ico')}}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/prettyPhoto.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/smoothness/jquery-ui-1.10.4.custom.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/rs-plugin/css/settings.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/colors/black.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

  <!-- Javascripts --> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery-1.11.0.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/bootstrap-hover-dropdown.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery.parallax-1.1.3.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/jquery.nicescroll.js')}}"></script>  
  <script type="text/javascript" src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery-ui-1.10.4.custom.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery.forms.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery.sticky.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/waypoints.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery.isotope.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/jquery.gmap.min.js')}}"></script> 
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="{{asset('frontend/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('frontend/js/custom.js')}}"></script> 
</head>

<body>

  <!-- Top header -->
  <div id="top-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <div class="th-text pull-left">
            <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> 05-460789986</a> </div>
            <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> MAIL@STARHOTEL.COM </a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href=# class="navbar-brand">         
            <!-- Logo -->
            <div id="logo"> <img id="default-logo" src="frontend/images/logo.png" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="frontend/images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
          </a> </div>
          <div id="navbar-collapse-grid" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown active"> <a href="{{route('homepage')}}">Home</a>
              </li>
              <li> <a href="#">Contact Us</a></li>
              @guest
              <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Sign in & Register<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('home')}}">Sign In </a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
              </li>
              @else              
              <li> <a href="{{route('reservation.index')}}">Your List</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
            @endguest             
          </ul>
        </div>
      </div>
    </div>
  </header>
  @yield('content')
  
  <!-- Go-top Button -->
  <div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
</html>
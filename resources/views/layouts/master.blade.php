<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hotel Reservation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">

  <!-- material font icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/project.css')}}">
  <link rel="stylesheet" href="{{'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="{{route('index.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><span class="fa fa-h-square fa-2x"></span></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><strong><span class="fa fa-h-square fa-2x"></span></strong>Hotel Dashboard</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="{{ url('/logout') }}" id="logout"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <span class="glyphicon glyphicon-log-out"></span>
                  Sign Out
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">Auth::user()->id
                  {{ csrf_field() }}
                  <input type="submit" value="logout" style="display: none;">
                </form>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li>
            <a href="{{ route('index.index') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->role == 'admin')
          @if(!empty(Auth::user()->hotel))
          <li>
            <a href="{{ route('hotel_facility.index') }}">
              <i class="glyphicon glyphicon-list"></i> <span>Facility</span>
            </a>
          </li>
          @endif
          @endif
          @if(Auth::user()->role == 'super')
          <li>
            <a href="{{ route('facility.index') }}">
              <i class="glyphicon glyphicon-list"></i> <span>Facility</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->role == 'admin')
          @if(!empty(Auth::user()->hotel))
          <li>
            <a href="{{ route('rooms.index') }}">
              <i class="glyphicon glyphicon-home"></i> <span>Room</span>
            </a>
          </li>
          @endif
          @endif
          @if(Auth::user()->role == 'admin')
          @if(!empty(Auth::user()->hotel))
          <li>
            <a href="{{ route('image.index') }}">
              <i class="fa fa-photo"></i> <span>Image</span>
            </a>
          </li>
          @endif
          @endif
          @if(Auth::user()->role == 'super')
          <li>
            <a href="{{ route('room_type.index') }}">
              <i class="fa fa-list-alt"></i> <span>Room Management</span>
            </a>
          </li>
          @endif
          @if(!empty(Auth::user()->hotel))
          <li>
            <a href="{{ route('notifications.index')}}">
              <i class="fa fa-bell"></i> <span>Notification</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->role == 'admin')
          @if(!empty(Auth::user()->hotel))
          <li>
            <a href="{{ route('reservation.index') }}">
              <i class="fa fa-book"></i> <span>Reservation</span>
            </a>
          </li>  
          @endif    
          @endif  
           @if(Auth::user()->role == 'admin')
          @if(!empty(Auth::user()->hotel))
          <li>
            <a href="{{ route('reservedRoom') }}">
              <i class="fa fa-calendar-check-o "></i> <span>Reserved Room</span>
            </a>
          </li>  
          @endif    
          @endif  
          @if(Auth::user()->role == 'super')
          <li>
            <a href="{{ route('user.index') }}">
              <i class="fa fa-users"></i> <span>User Management</span>
            </a>
          </li>  
          @endif
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Profile Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.show',\Auth::id())}}"><i class="fa fa-user"></i>Profile</a></li>
            <li><a href="{{route('reset_password')}}"><i class="fa fa-lock"></i>Reset Password</a></li>
          </ul>
        </li>   
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
       @yield("content")

     </section>
   </div>
   <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Hotel Reservation</strong> All rights
    reserved.
  </footer>

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<script src="{{asset('js/my.js')}}"></script>

<script src="{{asset('iCheck/icheck.min.js')}}"></script>

<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/calendar.js')}}"></script>
<!-- bootstrap datepicker -->

</body>
</html>

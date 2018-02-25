@extends('layouts.master')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Hotel List</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped datatable">
      <?php $i=1; ?>
      <thead>
        <th>No.</th>
        <th>User Name</th>
        <th>Hotel Name</th>
        <th>
          <span class="glyphicon glyphicon-star yellow"></span>
          <span class="glyphicon glyphicon-star yellow"></span>
          <span class="glyphicon glyphicon-star yellow"></span>
          <span class="glyphicon glyphicon-star yellow"></span>
          <span class="glyphicon glyphicon-star yellow"></span>
        </th>
        <th>Address</th>
        <th>Description</th>
        <th>Phone Number</th>
        <th></th>
      </thead>
      <tbody>      
        @foreach($hotels as $hotel)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$hotel->user->name}}</td>
          <td>{{$hotel->hotelName}}</td>
          <td>{{$hotel->starRating}}</td>
          <td>{{$hotel->street_number}},{{$hotel->route}},{{$hotel->city}},{{$hotel->state}}{{$hotel->country}}</td>
          <td>{{$hotel->description}}</td>
          <td>{{$hotel->phoneNumber}}</td>
          <td>
            <form action="{{ route('index.show', $hotel->id) }}" method="get">
              {{ csrf_field() }}
              <button class="btn btn-default">View More...</span><span class="glyphicon glyphicon-eye-open"></button>
            </form>           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection
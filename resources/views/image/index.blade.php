@extends('layouts.master')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Image List</h3>
    </div>
    <div class="box-body">

        <a href="{{route('image.create')}}"><button class="btn btn-app">
            <i class="fa fa-plus"></i> Add Image
        </button></a>
        <table class="table table-hover table-bordered table-striped datatable">
            
            <thead>
             <th>No.</th>
             <th>Thumbnail</th>
             <th>Name</th>
             <th>Date Created</th>
         </thead>

         <tbody>
            <?php $i=1; ?>
            @foreach($hotelImages as $hotelImage)

            <tr>
                <td>{{$i++}}</td>
                <td><a href="/image/{{ $hotelImage->id }}"><img src="{{ $hotelImage->showImage($hotelImage, $thumbnailPath) }}"></a></td>
                <td><a href="/image/{{ $hotelImage->id }}">{{ $hotelImage->image_name }}</a></td>
                <td>{{ $hotelImage->created_at }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>
</div>
</div>

@endsection
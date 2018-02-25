@extends('layouts.master')
@section('content')
@if (Session::has('message'))
<div class="alert {{ Session::get('alert-class', 'alert-success') }}">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('message') }}
</div>
@endif

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Image</h3>
    </div>
    <div class="box-body">
        <!-- Table -->
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Name:</th>
                <td>
                    {{ $hotelImage->image_name }}.{{ $hotelImage->image_extension }}
                </td>
            </tr>
            <tr>
                <th>Thumbnail</th>
                <td>
                    <img src="{{ $hotelImage->showImage($hotelImage, $thumbnailPath) }}">
                </td>
            </tr>
            <tr>
                <th>Primary Image:</th>
                <td>
                    <img src="{{ $hotelImage->showImage($hotelImage, $imagePath) }}" style="max-width: 600px;">
                </td>
            </tr>
        </table>
        <div class="col-lg-12">
            <div class="col-lg-6">
                <center>
                    <a href="{{route('image.edit',$hotelImage->id)}}">
                    <button type="button" class="btn btn-primary"><span class="fa fa-edit">Edit</span></button>
                    </a>
                </center>
            </div>
            <div class="col-lg-6">
                <center>
                    <form class="form" role="form" method="POST" action="{{ route('image.destroy',$hotelImage->id) }}">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                        <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">
                    </form>
                </center>
            </div>
        </div>
    </div>
    @endsection

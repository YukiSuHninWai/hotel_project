@extends('layouts.master')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $hotelImage->image_name. '.' . $hotelImage->image_extension }}</h3>
    </div>
    <div class="box-body">
        <form class="form" role="form" method="POST"
        action="{{ route('image.update',$hotelImage->id)}}"
        enctype="multipart/form-data">

        <input type="hidden" name="_method" value="patch">

        {{ csrf_field() }}

        <!-- is_active Form Input -->


        <div class="control-label">Thumbnail:</div>
        <!-- image thumbnail -->
        <div>

            <img src="{{ $hotelImage->showImage($hotelImage, $thumbnailPath) }}">

        </div>
        <!-- image file Form Input -->
        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <div class="form-group">
                <label class="control-label">Primary Image</label>
                <input type="file" name="image" id="image">
            </div>
            @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
            @endif                
            <!-- Submit Button -->
            <center>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        Update
                    </button>
                </div>
            </center>
        </div>
    </form>
</div>
</div>





@endsection
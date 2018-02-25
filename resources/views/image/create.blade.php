@extends('layouts.master')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Image</h3>
    </div>
    <div class="box-body">
        <form class="form" role="form" method="POST"
        action="{{ route('image.store') }}"
        enctype="multipart/form-data">
        {{ csrf_field() }}    
        <!-- image file Form Input -->
        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            <div class="form-group">
                <label class="control-label">Primary Image
                </label>
                <input type="file" name="image" id="image">
            </div>
            @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
            @endif
            <center>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        Create
                    </button>
                </div>
            </center>
        </div>
    </form>
</div>
</div>

@endsection
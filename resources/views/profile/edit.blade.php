@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Update Your Profile</h3>
            <hr>
            <form method="post" action="{{ route('profile.update') }}">
                <div class="form-group{{ ($errors->has('first_name')) ? ' has-error' : '' }}">
                    <label for="fname" class="control-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
                    @if($errors->has('first_name'))
                        <span class="help-block">
                            {{ $errors->first('first_name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ ($errors->has('last_name')) ? ' has-error' : '' }}">
                    <label for="lname" class="control-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
                    @if($errors->has('last_name'))
                        <span class="help-block">
                            {{ $errors->first('last_name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group{{ ($errors->has('location')) ? ' has-error' : '' }}">
                    <label for="location" class="control-label">Location</label>
                    <input type="text" name="location" class="form-control" id="location" placeholder="Location" value="{{ Request::old('location') ?: Auth::user()->location }}">
                    @if($errors->has('location'))
                        <span class="help-block">
                            {{ $errors->first('location') }}
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-default">Update</button>

                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
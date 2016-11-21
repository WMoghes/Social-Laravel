@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Create New Account</h3>
            <hr>
            <form method="post" action="{{ route('auth.signup') }}">
                <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Your email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ Request::old('email') ?: '' }}">
                    <span class="help-block">
                    {{ ($errors->has('email')) ? $errors->first('email') : ''}}
                    </span>

                </div>
                <div class="form-group{{ ($errors->has('username')) ? ' has-error' : '' }}">
                    <label for="username" class="control-label">Choose a username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" value="{{ Request::old('username') ?: '' }}">
                    <span class="help-block">
                        {{ ($errors->has('username')) ? $errors->first('username') : '' }}
                    </span>
                </div>
                <div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Choose a password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    <span class="help-block">
                        {{ ($errors->has('password')) ? $errors->first('password') : '' }}
                    </span>
                </div>

                <button type="submit" class="btn btn-default">Sign Up</button>

                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
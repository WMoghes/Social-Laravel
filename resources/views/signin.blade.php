@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign In</h3>
            <hr>
            <form method="post" action="{{ route('auth.signin') }}">
                <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Enter your email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ Request::old('email') ?: '' }}">
                    <span class="help-block">
                    {{ ($errors->has('email')) ? $errors->first('email') : ''}}
                    </span>

                </div>
                <div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Enter your password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    <span class="help-block">
                        {{ ($errors->has('password')) ? $errors->first('password') : '' }}
                    </span>
                </div>
                <div class="checkbox">
                    <label for="remember_me">
                        <input type="checkbox" name="remember" id="remember_me"> Remember Me
                    </label>
                </div>

                <button type="submit" class="btn btn-default">Sign In</button>

                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
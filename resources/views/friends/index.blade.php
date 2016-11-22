@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Your Friends</h3>
            <hr>
            @if($friends->count() > 0)
                @foreach($friends as $user)
                    @include('users.partials.userblock')
                @endforeach
            @else
                <p>You have no friends.</p>
            @endif
        </div>
        <div class="col-md-4 col-lg-offset-2">
            <h3>Requests</h3>
            <hr>
            @if(!$requests->count())
                <p>You have no friend requests</p>
            @else
                @foreach($requests as $user)
                    @include('users.partials.userblock')
                @endforeach
            @endif
        </div>
    </div>
@endsection


@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('users.partials.userblock')
            <hr>
        </div>
        <div class="col-md-4 col-lg-offset-2">

            @if(Auth::user()->hasFriendRequestPending($user))

                <p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>

            @elseif (Auth::user()->hasFriendRequestReceived($user))

                <a href="#" class="btn btn-primary">Accept Friend Request</a>

            @elseif (Auth::user()->isFriendsWith($user))

                <p>You and {{ $user->getNameOrUsername() }} are friends</p>

            @else

                <a href="#" class="btn btn-primary">Add as friend</a>

            @endif

            <h3>{{ $user->getFirstnameOrUsername() }}'s friends</h3>
            @if(!$user->friends()->count())
                <p>{{ $user->getFirstnameOrUsername() }} has no friends</p>
            @else
                @foreach($user->friends() as $user)
                    @include('users.partials.userblock')
                @endforeach
            @endif
        </div>
    </div>
@endsection


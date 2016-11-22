@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('users.partials.userblock')
            <hr>
        </div>
        <div class="col-md-4 col-lg-offset-2">
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


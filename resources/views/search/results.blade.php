@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Your search for "{{ Request::input('query') }}"</h2>
            <hr>
            @if(!$users->count())
                <p>Not found</p>
            @else
                <div class="row">
                    <div class="col-md-6">
                        @foreach($users as $user)
                            @include('users.partials.userblock')
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection

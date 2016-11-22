<div class="media">
    <a href="{{ route('profile', $user->username) }}" class="pull-left">
        <img src="{{ $user->getAvatar() }}" alt="{{ $user->getNameOrUsername() }}" class="media-object">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
            <h4><a href="{{ route('profile', $user->username) }}">{{ $user->getNameOrUsername() }}</a></h4>
            @if($user->location)
                <p>{{ $user->location }}</p>
            @endif
        </h4>
    </div>
</div>
<div class="media">
    <a href="" class="pull-left">
        <img src="{{ $user->getAvatar() }}" alt="{{ $user->getNameOrUsername() }}" class="media-object">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
            <h4><a href="">{{ $user->getFirstNameOrUsername() }}</a></h4>
            @if($user->location)
                <p>{{ $user->location }}</p>
            @endif
        </h4>
    </div>
</div>
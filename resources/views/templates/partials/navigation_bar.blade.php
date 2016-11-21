<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Social</a>
        </div>
        @if(Auth::user())
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Timeline <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Friends</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" method="post" action="{{ route('search.results') }}">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Finding people">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
                {{ csrf_field() }}
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Profile</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->getNameOrUsername() }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('auth.signout') }}">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        @else
            <!------------------------  Sign in and sign out buttons ------------------------------>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('auth.signup') }}">Sign Up</a></li>
                <li><a href="{{ route('auth.signin') }}">Sign In</a></li>
            </ul>
        @endif
    </div><!-- /.container-fluid -->
</nav>
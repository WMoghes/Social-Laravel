<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Social</title>
    <link rel="stylesheet" href="{{ URL::to('public/assets/css/bootstrap.min.css') }}">

</head>
<body>

@include('templates.partials.navigation_bar')

<div class="container">
    @include('templates.partials.alerts')
    @yield('content')
</div>

<script src="{{ URL::to('public/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::to('public/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
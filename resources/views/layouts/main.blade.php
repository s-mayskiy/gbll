<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Страница @show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@yield('menu')
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

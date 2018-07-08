<!DOCTYPE html>
<html lang="{{ config("app.locale") }}">

<head>
    <meta charset="UTF-8">
    <title>@yield("title",config("app.name"))</title>
    @include("layouts.partials.head")
    @yield("style")
</head>

<body id="commerce">
    @include('layouts.partials.navbar')
    @yield('content')
    @include('layouts.partials.footer')
    @yield("script")
</body>
</html>
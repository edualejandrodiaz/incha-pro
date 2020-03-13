<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('head')
</head>
<body class="bg-grey">
    <!-- navbar -->
    @yield('navbar')
    @yield('content')
    @yield('footer')
    @yield('javascripts')
</body>

</html>
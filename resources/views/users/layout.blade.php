<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/user.scss','resources/js/user.js'])
    </head>
    <body>
        @include('users.header')
        @yield('content')
        @include('users.footer')
    </body>
</html>
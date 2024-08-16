<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alumni | Elegant Public CBSE School Palakkad, Kerala</title>
        <link rel="icon" type="image/x-icon" href="https://theelegantpublicschool.com/wp-content/uploads/2021/07/Elegant-School-Icon-01.png">
        @vite(['resources/css/user.scss','resources/js/user.js'])
        
    </head>
    <body>
        @include('users.header')
        @yield('content')
        @include('users.footer')
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Elegant</title>
    <link rel="icon" type="image/x-icon" href="https://theelegantpublicschool.com/wp-content/uploads/2021/07/Elegant-School-Icon-01.png">
    @vite(['resources/css/app.scss','resources/js/admin.js'])
</head>
<body>
    @yield('mainContent')
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="descripcion" content="@yield('meta_description', 'default')">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title> @yield('title') </title>    
    @vite('resources/css/app.css')    
    @vite('resources/js/app.js')    
</head>
<body class="bg-gray-50">

    @include('layouts.header')

    @yield('content')

</body>
</html>
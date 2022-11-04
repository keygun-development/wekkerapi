<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wekker API</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    @vite('resources/js/app.js')
</head>
<body>
<div class="site-content" id="app">
    @yield('content')
</div>
</body>

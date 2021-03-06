<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flora.io') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/voy6oqb.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset ('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

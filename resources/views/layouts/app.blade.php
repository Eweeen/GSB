<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GSB') }}</title>
    
    <!--  -->
    <link rel="icon" href="{{ asset('img/gsb.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('libs/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @yield('nav')
    @yield('content')
    @yield('script')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bitcoin</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    </head>
    <body>
        <div class="container">
            @include('partials.nav')
            @yield('content')
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>

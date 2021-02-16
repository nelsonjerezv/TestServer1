<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Version Uno</title>

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <!-- css -->
        <link rel="stylesheet" href="{{ asset(mix('css/layout.css')) }}">

        <!-- scripts -->
        <script type="text/javascript" src="{{ asset(mix('js/bundle.js')) }}" ></script>
        
        @yield('styles')
        <div class="container">
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>
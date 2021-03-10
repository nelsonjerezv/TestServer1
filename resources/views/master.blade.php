<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Version Uno</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <!-- css -->
        <link rel="stylesheet" href="{{ asset(mix('css/layout.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/semantic.min.css')) }}">
        <!-- scripts -->
        <script>window.GLOBAL = {"URL": '{{ config('app.url') }}'}</script>
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?></script>
        <script type="text/javascript" src="{{ asset(mix('js/bundle.js')) }}" ></script>
        <script type="text/javascript" src="{{ url('lib/semantic/semantic.min.js') }}" ></script>

        @yield('styles')
        <div id="msgcontainer"></div>
        <div class="container">

            @yield('content')

        </div>

        @yield('scripts')
    </body>
</html>
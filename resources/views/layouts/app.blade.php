<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{config('app.name')}}</title>

    <link rel="stylesheet" href="{{ url('css/loader.css') }}">

    <script src="{{ url('js/vendors.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ url('js/application.js') }}"></script>
    <script src="{{ url('jquery-ui/jquery-ui.js') }}"></script>
</head>

<body>
    @include('components.loader')
    <div id="app">
        @include('components.navbar-top')
        @yield('content')
        @yield('javascript')
    </div>
    <link rel="stylesheet" href="{{ url('css/vendors.css') }}" id="bootswatch-print-id">
    <link rel="stylesheet" href="{{ url('css/application.css') }}">
    <link rel="stylesheet" href="{{ url('jquery-ui/jquery-ui.css') }}">
</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
</head>

<body>

    @include('../includes/main_nav')

    @yield('side_bar')

    <div class="main container-fluid">

        <div class="row d-flex justify-content-center mb-4">
            <div class="col-sm-9 col-lg-8">

                <nav class="docs_nav">
                    <ul class="no_bullet">
                        <li>
                            <a href="{{ route('docs.index') }}">Overview</a>
                        </li>
                        <li>
                            <a href="{{ route('docs.schema') }}">Database Schema</a>
                        </li>
                        <li>
                            <a href="{{ route('docs.api.ref') }}">API Reference</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

        @yield('content')

    </div>

</body>
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


    <style>
        .table-container
        {
            display: flex;
            flex-direction: row;
        }

        .animal
        {
            width: 30%;
        }

        .family
        {
            display: flex;
            flex-direction: column;
            width: 70%;
            height: 100%;
        }

        .parent
        {
            height: 50%;
            display: flex;
            flex-direction: row;
            width: 30%;
        }

        .parent > table
        {
            height: 100%;
        }

        .grandparents
        {
            display: flex;
            flex-direction: column;
            height: 50%;
            width: 30%;
        }

        .container-za-podatke
        {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

    </style>

</head>
<body>
    <div id="app">


        <main class="py-4 container-fluid">

            @yield('content')
        </main>
    </div>

</body>
</html>

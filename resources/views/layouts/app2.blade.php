<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="section-poll">
<head class="section-poll">
    {!! SEO::generate() !!}
    @include('layouts.modules.favicons')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{mix('css/app.css') }}" rel="stylesheet">



    <title>Голосование</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />



</head>
<body>
<div id="app">
{{--    @include('layouts.modules.navbar')--}}
{{--    @include('layouts.modules.breadcrumbs')--}}

    <main class=" gcont">
        @yield('content')
    </main>
</div>
<script src="{{ mix('js/app.js') }}" async></script>

</body>
</html>

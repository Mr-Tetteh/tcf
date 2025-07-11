<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>TCF::{{$title ??')' }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon.svg')}}" />
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}" />
    <link rel="manifest" href="{{asset('site.webmanifest')}}" />

    <!-- Add one of these options: -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!-- Option 1: If using Vite -->
    @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/script.js'])



    @livewireStyles

    @stack('styles')
</head>

<body class="index-page">

@include('layout.user.partials.website-header')

<main class="main">

    {{$slot}}

</main>

@include('layout.user.partials.website-footer')


<!-- Preloader -->
<div id="preloader"></div>



<!-- Main JS File -->
<script src="{{asset('website/assets/js/main.js')}}"></script>
@livewireScripts
@stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @php
            $home_logo = App\Models\WebConfig::where('name', 'home_logo')->first();
        @endphp
    </head>
    <body class="font-sans antialiased bg-primary text-white min-h-screen flex items-center flex-col">
        <main class="grid grid-cols-1 grid-rows-2 md:grid-cols-3 md:grid-rows-1 gap-4 w-full flex-1">
            <div class="flex justify-center items-center flex-col px-4">
                <img src="{{$home_logo->value}}" class="mb-9 w-auto h-60" alt="img">

                <a href="{{route('apartments')}}" class="text-white hover:text-gray-100 border border-gray-50 hover:bg-opacity-80 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-6 w-36">MÓDULOS</a>

                <a href="#" class="text-white hover:text-gray-100 border border-gray-50 hover:bg-opacity-80 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 w-36">LOCATION</a>
            </div>
            <div class="col-span-2 flex justify-center items-center px-2">
                <img src="/images/saiko-galery.png" class="w-auto md:max-w-md lg:max-w-xl h-auto" alt="imagen1">
            </div>
        </main>
        @include("layouts.footer")
    </body>
</html>
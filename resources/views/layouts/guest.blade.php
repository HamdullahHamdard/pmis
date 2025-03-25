<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>د ملی راډیوټلویزون د گدام د مدیریت سیستم</title>

        <!-- Favicons for different device and OS -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('/') }}/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::to('/') }}/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('/') }}/favicon/favicon-16x16.png">
        <link rel="manifest" href="{{ URL::to('/') }}/favicon/site.webmanifest">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Development Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Production Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-b36c5dcb.css') }}"> --}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex justify-center items-center bg-gray-100 dark:bg-gray-900 mx-auto w-full p-0">
            <div class="container mx-auto max-w-sm lg:max-w-4xl p-2">
                <div class="flex flex-col sm:flex-row rounded-lg shadow-lg overflow-hidden w-full">
                    <div class="w-full lg:w-1/2 py-8 px-2 sm:p-2 bg-cover flex flex-col justify-center items-center bg-[#018ac0]">
                        <img src="{{ URL::to('/') }}/logo/logo-light.png" alt="RTA New Logo" class="img-responsive w-28 sm:w-44 h-12 sm:h-20">
                        <div class="text-center text-gray-100 mt-6 mb-1 text-[16px] sm:text-xl sm:tracking-wide">
                            {{ __('د ملی راډیوټلویزیون د ګدام د مدیریتي سیستم') }}
                        </div>
                        <div class="text-center text-gray-100 text-[15px] sm:text-[19px]">
                            {{ __('سیستم مدیریت گدام رادیوتلویزیون ملی افغانستان') }}
                        </div>
                        {{-- <div class="mt-4 flex gap-4">
                            <a href=""><i data-feather="globe" class="ml-2 w-5 text-gray-300 hover:text-white"></i></a>
                            <a href=""><i data-feather="twitter" class="ml-2 w-5 text-gray-300 hover:text-white"></i></a>
                            <a href=""><i data-feather="youtube" class="ml-2 w-5 text-gray-300 hover:text-white"></i></a>
                            <a href=""><i data-feather="facebook" class="ml-2 w-5 text-gray-300 hover:text-white"></i></a>
                        </div> --}}
                    </div>
                    <div class="w-full px-4 py-4 sm:p-8 lg:w-1/2 bg-white dark:bg-gray-800">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Production Scripts -->
        {{-- <script src="{{ asset('build/assets/app-eef9311a.js') }}"></script> --}}
    </body>
</html>

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

        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col justify-between min-h-screen bg-gray-100 dark:bg-gray-900">
            <div>
                @include('layouts.navigation')
                @include('sweetalert::alert')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow dark:bg-gray-800">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

            </div>

            {{-- Footer --}}
            <div class="pt-12">
                <div class="w-full mx-auto ">
                    <div class="px-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg sm:px-8">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ __("© ۱۴۰۲ د افغانستان ملي راډیو ټلویزیون. د کاپي ټول حقوق خوندي دي.") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('selected-option').addEventListener('click', function() {
                const dropdown = document.getElementById('dropdown');
                const searchInput = document.getElementById('search');
                const options = document.getElementById('options-container').children;

                // Reset search input and show all options
                searchInput.value = '';
                for (let i = 0; i < options.length; i++) {
                    options[i].style.display = '';
                }

                dropdown.classList.toggle('hidden');
            });


            document.getElementById('search').addEventListener('input', function() {
                const searchValue = this.value.toLowerCase();
                const options = document.getElementById('options-container').children;

                for (let i = 0; i < options.length; i++) {
                    const optionText = options[i].textContent.toLowerCase();
                    options[i].style.display = optionText.includes(searchValue) ? '' : 'none';
                }
            });

            function selectOption(option, name) {
                document.getElementById('selected-option').value = option;

                // Show name to user
                document.getElementById('selected-name').value = name;
                document.getElementById('dropdown').classList.add('hidden');
            }

            $(document).ready(function () {
                // Attach a click event to the dropdown options
                $('#options-container div').on('click', function () {
                    const employeeId = $(this).data('employee-id'); // Get the employee ID
                    const employeeName = $(this).text(); // Get the employee name

                    // Update the visible input field with the employee name
                    $('#selected-option').val(employeeName);

                    // Update the hidden input field with the employee ID
                    $('#selected-option-id').val(employeeId);
                });
            });
            </script>
        <!-- Production Scripts -->
        {{-- <script src="{{ asset('build/assets/app-eef9311a.js') }}"></script> --}}
    </body>
</html>

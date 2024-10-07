<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg sm:text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ساخت راپور ماه وار و سالانه') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-4 sm:px-6 py-4 sm:py-8">
                    <div class="text-gray-900 dark:text-gray-100 text-2xl">
                        {{ __("Filters") }}
                    </div>

                        <a type="button" class="text-gray-100 bg-green-600 hover:bg-green-700 p-3 rounded-md text-center">
                            <i data-feather="list"></i>
                        </a>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 text-white">
                    Reports section
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

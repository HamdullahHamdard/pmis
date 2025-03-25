<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('تغییر دادن شفت کاری: ') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $employeeShift->name }}
                </span>
            </h2>

            <a href={{ route('empShifts') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" class="max-w-xl mx-auto" action="{{ url('employee/shifts/update/'.$employeeShift->id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('put')

                    <div x-init="init($refs.wysiwyg)">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('نوعیت وظیفه')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $employeeShift->name}}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button>
                                {{ __('ذخیره کردن') }}
                            </x-primary-button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

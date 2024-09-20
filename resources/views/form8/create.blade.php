<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن فورم اعاده تحویلخانه جدید') }}
            </h2>

            <a href={{ route('form8s.index') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div>
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">اعاده تحویلخانه</h1>
                </div>
                <form method="POST" class="w-full mx-auto" action="{{ url('forms/form8/store') }}" enctype='multipart/form-data'
                    id="app-form">
                    @csrf
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('تعداد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input min="0" id="total" class="block w-full mt-1" type="number" name="total" :value="old('total')" required autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- Unit -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="category" :value="__('واحد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="unit">
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" class="py-2">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="category" :value="__('واحد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="unit">
                            @foreach ($form5s as $form5)
                                <option value="{{ $form5->id }}" class="py-2">{{ $form5->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-8">
                        <x-primary-button>
                            {{ __('ثبت کردن فورم') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('تسلیم کردن جنس مصرفی جدید') }}
            </h2>

            <a href={{ route('usableSubmission') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/usable/submission/store') }}" enctype='multipart/form-data'
                id="app-form">
                @csrf

                    <!-- Department Name -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="depSubmission" :value="__(' اسم ریاست یا آمریت')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="depSubmission">
                            <option selected disabled class="py-2">انتخاب</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id}}" class="py-2">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Usable Item Name -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="name" :value="__('انتخاب جنس مصرفی')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="item">
                            <option selected disabled class="py-2">انتخاب</option>
                            @foreach ($usableItems as $item)
                                @if ($item->total > 0)
                                    <option value="{{ $item->id}}" class="py-2">{{$item->name}},  تعداد: {{$item->total}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <!-- Total Usable Item -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('تعداد یا مقدار')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="total" class="block w-full mt-1" type="text" name="total" :value="old('total')" required autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- Type -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="type" :value="__('نوعیت جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="type">
                            @foreach ($usableTypes as $type)
                                <option value="{{ $type->id}}" class="py-2">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <x-primary-button>
                            {{ __('اضافه کردن') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

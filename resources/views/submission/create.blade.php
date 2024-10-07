<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('اضافه کردن تسلیمی جدید') }}
            </h2>

            <a href={{ route('submission') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/submission/store') }}" enctype='multipart/form-data'
                id="app-form">
                @csrf

                    <!-- Employee Name -->
                    <div class="mt-4 employeeSelect">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="employeeName" :value="__('اسم کارمند')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="employeeName">
                            <option selected disabled class="py-2">انتخاب</option>

                            @if(auth()->user()->province_id == 13)
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" class="py-2">
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($employees as $employee)
                                    @if($employee->province_id == auth()->user()->province_id)
                                        <option value="{{ $employee->id }}" class="py-2">
                                        {{ $employee->name }}
                                    </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Item Name -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="item" :value="__('جنس گرفته شده')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="item">
                            <option selected disabled class="py-2">انتخاب</option>
                            @if(auth()->user()->province_id == 13)
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" class="py-2">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($items as $item)
                                    @if($item->province_id == auth()->user()->province_id)
                                        <option value="{{ $item->id }}" class="py-2">
                                        {{ $item->name }}
                                    </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Total Item -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="total" :value="__('تعداد')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <x-text-input id="total" class="block mt-1 w-full" type="text" name="total" :value="old('total')" required autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- Details -->
                    <div class="mt-3">
                        <x-input-label for="details" :value="__('معلومات اضافی')" />
                        <x-text-area id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" autofocus autocomplete="details" />
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- Province -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="province" :value="__('ولایت')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="province">
                            <option selected disabled class="py-2">انتخاب</option>
                            @if(auth()->user()->province_id == 13)
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" class="py-2">
                                    {{ $province->name }}
                                </option>
                                @endforeach
                            @else
                                @foreach ($provinces as $province)
                                    @if($province->id == auth()->user()->province_id)
                                        <option value="{{ $province->id }}" class="py-2">
                                        {{ $province->name }}
                                    </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Submission Status -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="status" :value="__('حالت واپسی')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="status" required>
                            <option value="0">
                                واپس نشده
                            </option>
                            <option value="1">
                                واپس شده
                            </option>
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

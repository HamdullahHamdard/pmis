<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('ایدیت کردن فورم ف س ۵') }}
            </h2>

            <a href={{ route('form5s.index') }}
                class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div>
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">اعاده تحویلخانه
                    </h1>
                </div>
                <form method="POST" class="mx-auto max-w-7xl" action="{{ route('form5s.update', $form5s->id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('PUT')
                    <!-- Header -->
                    <div class="flex justify-between w-full mt-4">
                        <div class="grid items-center grid-cols-4 gap-3">
                            <x-input-label for="formNumber" :value="__('درخواست کننده')"
                                class="col-span-1 text-lg text-gray-800" />
                            <select
                                class="block col-span-3 mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="department_id">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" class="py-2">
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid items-center grid-cols-4 gap-3">
                            <x-input-label for="form9_id" :value="__('ف س ۹ نمبر')" class="col-span-1 text-lg text-gray-800" />
                            <x-text-input id="form9_id" class="block w-full col-span-3 mt-1" type="number" name="form9_id" value="{{$form5s->form9s_id}}" required autofocus autocomplete="form9_id" />
                        <x-input-error :messages="$errors->get('form9_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="date" :value="__('تاریخ ف س ۹ ')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <div class="flex gap-3 mt-2">
                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="year">
                                <option selected disabled hidden>سال</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->name}}" class="py-2">{{$year->name}}</option>
                                @endforeach
                            </select>

                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="month">
                                <option hidden>ماه</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month->name}}" class="py-2">{{$month->name}}</option>
                                @endforeach
                            </select>

                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="day">
                                <option hidden>روز</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day->name}}" class="py-2">{{$day->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2" >

                        <x-input-label for="category" :value="__('توزیع به')" />

                        <div class="relative mt-2 dark:text-gray-300">
                            <span class="absolute inset-y-0 flex items-center pl-3 right-40">
                                <!-- Heroicon chevron-down icon -->
                                <input type="text" name="employee_name" id="selected-name" class="block w-full px-4 py-0 bg-white rounded-md dark:bg-gray-900 dark:border-gray-900 focus:rounded-sm focus:outline-none focus:ring-2 focus:border-gray-900 dark:focus:border-gray-900 " readonly>

                            </span>
                            <input type="text" name="employee_id" id="selected-option" placeholder="انتخاب کارمند" class="block w-full px-4 py-2 bg-white border rounded-md dark:bg-gray-900 dark:border-gray-700 focus:rounded-sm focus:outline-none focus:ring-2 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" readonly>
                            <div id="dropdown" class="absolute left-0 hidden w-full mt-1 overflow-y-auto bg-white border rounded-md shadow-lg max-h-64 dark:border-gray-700 dark:bg-gray-800 top-full">
                                <input type="text" id="search" placeholder="جستجو کنید ..." class="block w-full px-4 py-2 bg-white border rounded-md dark:bg-gray-900 dark:border-gray-700 focus:rounded-sm focus:outline-none focus:ring-2 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <div id="options-container">
                                    @foreach ($employees as $employee)
                                    <div class="px-4 py-2 bg-white border-b rounded-md cursor-pointer dark:border-gray-700 dark:bg-gray-800 hover:bg-indigo-600" onclick="selectOption('{{ $employee->id }}', '{{$employee->name}}')">{{ $employee->name }}</div>

                            @endforeach
                                </div>
                            </div>
                        </div>

                    {{-- <x-input-label for="category" :value="__('توزیع به')" />
                        <select
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="employee_id">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" class="py-2">
                                    {{ $employee->name }}</option>
                            @endforeach
                        </select> --}}

                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="warehouse" :value="__('تحویلخانه توزیع کننده ')" />
                            {{-- <span class="text-xl text-red-500">*</span> --}}
                        </div>
                        <x-text-input id="warehouse" class="block w-full mt-1" type="text" name="warehouse" value="{{ $form5s->distribution_warehouse }}" required autofocus autocomplete="warehouse" />
                        <x-input-error :messages="$errors->get('warehouse')" class="mt-2" />
                    </div>

                        <div class="mb-4">
                            <x-input-label for="details" :value="__('مشخصات ')" />
                            <x-text-area id="details" class="block w-full mt-1" type="text"
                                name="details" value="{{ $form5s->details }}" required autofocus
                                autocomplete="details" />
                            <x-input-error :messages="$errors->get('details')" class="mt-2" />
                        </div>



                                <button type="submit"
                                    class="w-full mt-4 text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">اضافه
                                    کردن</button>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>

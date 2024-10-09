<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن فورم رسیدات جدید') }}
            </h2>

            <a href={{ route('form9') }}
                class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div>
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">اعاده تحویلخانه
                    </h1>
                </div>
                <form method="POST" class="mx-auto max-w-7xl" action="{{ route('form9s.store') }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    <!-- Header -->
                    <div class="flex justify-between w-full mt-4">
                        <div class="grid items-center grid-cols-4 gap-4">
                            <x-input-label for="formNumber" :value="__('شعبه درخواست')"
                                class="col-span-1 text-lg text-gray-800" />

                            <x-text-input id="total" class="block col-span-3 mt-1" type="text" name="requested_management"
                                :value="old('total')" required autofocus autocomplete="total" />
                            <x-input-error :messages="$errors->get('total')" class="mt-2" />
                        </div>
                        <div class="grid items-center grid-cols-4 gap-3">
                            <x-input-label for="formDate" :value="__('کارمند')" class="col-span-1 text-lg text-gray-800" />
                            <select
                                class="block col-span-3 mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="employee_id">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" class="py-2">{{ $employee->id }} -
                                        {{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="mt-4">
                        <x-input-label for="category" :value="__('شعبه درخواست کننده')" />
                        <select data-twe-select-filter="true"
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" class="py-2">
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mt-4">



                        <x-input-label for="category" :value="__('نام امیر یا ریس')" />
                        <select
                            class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="manager_name">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->name }}" class="py-2">
                                    {{ $employee->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mt-4">

                        {{-- select with drop down --}}

                    </div>


                    <div class="mb-4">
                        <x-input-label for="details" :value="__('مشخصات اولی')" />
                        <x-text-area id="details" class="block w-full mt-1" type="text" name="first_details"
                            :value="old('details')" required autofocus autocomplete="details" />
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>




                    {{-- TODO:: Done Here --}}


                    {{-- <div class="relative flex mb-4 gap-x-3">
                        <div class="flex items-center h-6">
                            <input value="model" name="candidates" type="checkbox" id="toggleCheckbox"
                                class="w-4 h-4 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:text-white-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        </div>
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="candidates" :value="__('اجناس ګدام')"  />
                            <span class="text-xl text-red-500">*</span>

                        </div>
                    </div> --}}
                    {{-- <div id="div2" > --}}
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('نام جنس')" />
                        </div>
                        <x-text-input id="total" class="block w-full mt-1" type="text" name="item_name"
                            :value="old('total')" autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>
{{-- </div> --}}



                    {{-- <div id="div1" class="hidden">
                        <table id="userData" class="w-full mt-6 text-sm text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        اسم جنس
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        مقدار
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        واحد
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">

                                </tr>
                            </tbody>
                        </table> --}}

                        {{-- <div class="flex justify-center mt-6 border-b border-gray-100 dark:border-gray-700">
                            <button data-modal-target="form8-modal" data-modal-toggle="form8-modal" type="button"
                                class="p-3 font-medium text-center text-gray-600 rounded-md hover:text-black dark:text-gray-300 dark:hover:text-white">
                                <i data-feather="plus" class="w-8 h-8"></i>
                            </button>
                        </div>

                        <!-- Main modal -->
                        <div id="form8-modal" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                    <button type="button"
                                        class="absolute top-3 left-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="form8-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white">اضافه کردن
                                            جنس
                                            اعاده تحویلخانه</h3>
                                        <form class="space-y-6" action="#">



                                            <!-- Total -->
                                            <div class="mb-3">
                                                <x-input-label for="total" :value="__('مقدار')"
                                                    class="col-span-1 text-lg text-gray-800" />
                                                <x-text-input id="nameInput" class="block w-full col-span-3 mt-1"
                                                    type="number" name="total" :value="old('total')" required
                                                    autofocus autocomplete="total" />
                                                <x-input-error :messages="$errors->get('total')" class="mt-2" />
                                            </div>

                                            <!-- Units -->
                                            <div class="mb-3">
                                                <x-input-label for="category" :value="__('واحد')" />
                                                <select
                                                    class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                                    name="unit">
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->id }}" class="py-2">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                    </div>

                                    <button onclick="addData()"
                                        class="w-full mt-4 text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">اضافه
                                        کردن</button>

                                </div>
                            </div>
                        </div> --}}
                    {{-- </div> --}}


                    <div class="mt-4 mb-4">
                        <x-input-label for="details" :value="__('مشخصات دوهمی')" />
                        <x-text-area id="details" class="block w-full mt-1" type="text" name="second_details"
                            :value="old('details')" required autofocus autocomplete="details" />
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <x-primary-button>
                            {{ __('ثبت کردن فورم') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Submit Button -->

</x-app-layout>

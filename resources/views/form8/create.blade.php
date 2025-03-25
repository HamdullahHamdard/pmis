<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('اضافه کردن فورم اعاده تحویلخانه جدید') }}
            </h2>

            <a href={{ route('form8') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div>
                    <h1 class="text-center text-xl sm:text-2xl font-medium text-gray-800 dark:text-white">اعاده تحویلخانه</h1>
                </div>
                <form method="POST" class="w-full mx-auto" action="{{ url('forms/form8/store') }}" enctype='multipart/form-data'
                    id="app-form">
                    @csrf

                    <!-- Header -->
                    <div class="mt-4 w-full flex justify-between">
                        <div class="grid grid-cols-4 items-center gap-3">
                            <x-input-label for="formNumber" :value="__('شماره')" class="text-gray-800 text-lg col-span-1" />
                            <x-text-input id="formNumber" class="col-span-3 block mt-1" type="number" name="formNumber" :value="old('formNumber')" required autofocus autocomplete="formNumber" />
                            <x-input-error :messages="$errors->get('formNumber')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-4 items-center gap-3">
                            <x-input-label for="formDate" :value="__('تاریخ')" class="text-gray-800 text-lg col-span-1" />
                            <x-text-input id="formDate" class="col-span-3 block mt-1" type="date" name="formDate" :value="old('formDate')" required autofocus autocomplete="formDate" />
                            <x-input-error :messages="$errors->get('formDate')" class="mt-2" />
                        </div>
                    </div>

                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400 mt-6">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    اسم جنس
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    مشخصات
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    مقدار
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    واحد
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    قیمت
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    قیمت مجموع
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">

                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-6 flex justify-center border-b border-gray-100 dark:border-gray-700">
                        <button data-modal-target="form8-modal" data-modal-toggle="form8-modal" type="button" class="text-gray-600 hover:text-black dark:text-gray-300 dark:hover:text-white font-medium p-3 rounded-md text-center">
                            <i data-feather="plus" class="w-8 h-8"></i>
                        </button>
                    </div>

                    <!-- Main modal -->
                    <div id="form8-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                <button type="button" class="absolute top-3 left-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="form8-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white">اضافه کردن جنس اعاده تحویلخانه</h3>
                                    <form class="space-y-6" action="#">

                                        <!-- Item Name -->
                                        <div class="mb-3">
                                            <x-input-label for="itemName" :value="__('اسم جنس')" class="text-gray-800 text-lg col-span-1" />
                                            <x-text-input id="itemName" class="col-span-3 block mt-1 w-full" type="number" name="itemName" :value="old('itemName')" required autofocus autocomplete="itemName" />
                                            <x-input-error :messages="$errors->get('itemName')" class="mt-2" />
                                        </div>

                                        <!-- Item Details -->
                                        <div class="mb-6">
                                            <x-input-label for="details" :value="__('مشخصات جنس')" />
                                            <x-text-area id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" required autofocus autocomplete="details" />
                                            <x-input-error :messages="$errors->get('details')" class="mt-2" />
                                        </div>

                                        <!-- Total -->
                                        <div class="mb-3">
                                            <x-input-label for="total" :value="__('مقدار')" class="text-gray-800 text-lg col-span-1" />
                                            <x-text-input id="total" class="col-span-3 block mt-1 w-full" type="number" name="total" :value="old('total')" required autofocus autocomplete="total" />
                                            <x-input-error :messages="$errors->get('total')" class="mt-2" />
                                        </div>

                                        <!-- Units -->
                                        <div class="mb-3">
                                            <x-input-label for="category" :value="__('واحد')" />
                                            <select
                                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full mt-1"
                                                name="unit">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id}}" class="py-2">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Purchase Price -->
                                        <div class="mt-3">
                                            <x-input-label for="purchasePrice" :value="__('قیمت خرید')" />
                                            <x-text-input id="purchasePrice" class="block mt-1 w-full" type="text" name="purchasePrice" :value="old('purchasePrice')" required autofocus autocomplete="purchasePrice" />
                                            <x-input-error :messages="$errors->get('purchasePrice')" class="mt-2" />
                                        </div>

                                        <button type="submit" class="w-full mt-4 text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">اضافه کردن</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer>
                        <div>

                        </div>
                    </footer>

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

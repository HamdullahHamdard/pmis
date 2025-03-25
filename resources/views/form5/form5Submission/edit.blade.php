<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('جنس مربوط فورم نمبر') }}
                <span class="text-red-500"><b>{{$id}}</b></span>
            </h2>

            <a href={{ url('/formSubmission/'.$id) }}
                class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div>
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">جنس مربوط فورم
                    </h1>
                </div>
                <form method="POST" class="mx-auto max-w-7xl" action="{{ url('/formSubmission/update/'.$formItems->id.'/'.$id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('PUT')

                    <!-- Header -->
                    <div class="mt-3">

                        <div class="items-center gap-2">



                            <x-input-label for="item_id" :value="__('جنس')" class="text-lg text-gray-800 " />
                            <div class="relative w-full mt-2 dark:text-gray-300">
                                <span class="absolute inset-y-0 flex items-center pl-3 right-40">
                                    <!-- Heroicon chevron-down icon -->
                                    <input type="text" name="item_name" id="selected-name" class="block w-full px-4 py-0 bg-white rounded-md dark:bg-gray-900 dark:border-gray-900 focus:rounded-sm focus:outline-none focus:ring-2 focus:border-gray-900 dark:focus:border-gray-900 " readonly>

                                </span>
                                <input type="text"  name="item_id" id="selected-option" placeholder="انتخاب جنس" class="block w-full px-4 py-2 bg-white border rounded-md dark:bg-gray-900 dark:border-gray-700 focus:rounded-sm focus:outline-none focus:ring-2 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required readonly>
                                <x-input-error :messages="$errors->get('item_name')" class="mt-2" />
                                <div id="dropdown" class="absolute left-0 hidden w-full mt-1 overflow-y-auto bg-white border rounded-md shadow-lg max-h-64 dark:border-gray-700 dark:bg-gray-800 top-full">
                                    <input type="text" id="search" placeholder="جستجو کنید ..." class="block w-full px-4 py-2 bg-white border rounded-md dark:bg-gray-900 dark:border-gray-700 focus:rounded-sm focus:outline-none focus:ring-2 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                    <div id="options-container">
                                        @foreach ($items as $item)
                                        <div class="px-4 py-2 bg-white border-b rounded-md cursor-pointer dark:border-gray-700 dark:bg-gray-800 hover:bg-indigo-600" onclick="selectOption('{{$item->id}}','{{$item->name}}')">


                                            {{ $item->name }}
                                        </div>

                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="mt-3">
                        <div class="grid items-center gap-1">
                        <x-input-label for="formNumber" :value="__('مقدار جنس')"
                            class="col-span-1 text-lg text-gray-800" />
                            <x-text-input id="quantity" class="block w-full mt-1"
                            type="number" name="quantity" value="{{$submission->total}}" required autofocus
                            autocomplete="quantity" />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div></div>




                    <div class="flex items-center justify-end mt-52">
                        <x-primary-button class="border-indigo-500">
                            {{ __('ثبت کردن جنس') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>


</x-app-layout>

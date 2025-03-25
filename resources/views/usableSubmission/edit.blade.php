<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('تغییر دادن معلومات تسلیمی:') }}
                <span class="text-red-500 dark:text-red-400">
                    @foreach ($usableItems as $item)
                        @php
                            $showItemName = "";
                            if($submission->item_id == $item->id) {
                                $showItemName = $item->name;
                            }

                        @endphp
                            {{ $showItemName}}
                    @endforeach

                </span>
            </h2>

            <a href={{ route('usableSubmission') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/usable/submission/update/'.$submission->id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('put')

                    <!-- Department Name -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="depSubmission" :value="__(' اسم ریاست یا آمریت')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="depSubmission">
                            @foreach ($departments as $department)
                                @php
                                    $selected = "";
                                    if($submission->department_id == $department->id) {
                                        $selected = "selected";
                                    }
                                @endphp
                                <option {{ $selected }} value="{{ $department->id }}">
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Item Name -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="name" :value="__('انتخاب جنس مصرفی')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="item">
                            @foreach ($usableItems as $item)
                                @php
                                    $selected = "";
                                    if($submission->item_id == $item->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{ $item->id }}">
                                        {{ $item->name }},  تعداد: {{$item->total}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Total -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('تعداد یا مقدار')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="total" class="block w-full mt-1" type="text" name="total" value="{{ $submission->total }}" required autofocus autocomplete="total" />
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
                            {{ __('ذخیره کردن') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('تغییر دادن معلومات تسلیمی:') }}
                <span class="text-red-500 dark:text-red-400">
                    @foreach ($items as $item)
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

            <a href={{ route('submission') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/submission/update/'.$submission->id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('put')

                    <!-- Employee Name -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="empSubmission" :value="__('اسم کارمند')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="empSubmission">
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
                            <x-input-label for="name" :value="__('جنس گرفته شده')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="item">
                            @foreach ($items as $item)
                                @php
                                    $selected = "";
                                    if($submission->item_id == $item->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Total Item -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="total" :value="__('تعداد')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <x-text-input id="total" class="block mt-1 w-full" type="text" name="total" value="{{ $submission->total }}" required autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- Details -->
                    <div class="mt-3">
                        <x-input-label for="details" :value="__('معلومات اضافی')" />
                        <x-text-area id="details" class="block mt-1 w-full" type="text" name="details" value="{{ $submission->details }}" autofocus autocomplete="details" />
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
                                    @php
                                        $selected = "";
                                        if(auth()->user()->province_id == $province->id) {
                                            $selected = "selected";
                                        }
                                    @endphp
                                    <option {{ $selected }} value="{{    $province->id}}">
                                        {{$province->name}}
                                    </option>
                            @endforeach
                            @else
                                @foreach ($provinces as $province)
                                    @if($province->id == auth()->user()->province_id)
                                        <option selected value="{{$province->id}}">
                                            {{$province->name}}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Submission Status -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="name" :value="__('حالت واپسی')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="status" required>
                            @if ($submission->is_returned == 0)
                                <option value="0">
                                    واپس نشده
                                </option>
                                <option value="1">
                                    واپس شده
                                </option>
                            @elseif ($submission->is_returned == 1)
                                <option value="1">
                                    واپس شده
                                </option>
                                <option value="0">
                                    واپس نشده
                                </option>
                            @endif
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

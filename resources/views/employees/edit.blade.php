<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('تغییر دادن معلومات کارمند:') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $employee->name }}
                </span>
            </h2>

            <a href={{ route('employees') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form method="POST" class="max-w-xl mx-auto" action="{{ url('employees/update/'.$employee->id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('put')

                    <!-- Name -->
                    <div>
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="name" :value="__('اسم کارمند')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" value="{{ $employee->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Employee ID Number -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="employment_id" :value="__('آی دی نمبر')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="employment_id" class="block w-full mt-1" type="text" name="employment_id" value="{{ $employee->employment_id }}" required autocomplete="employment_id" />
                        <x-input-error :messages="$errors->get('employment_id')" class="mt-2" />
                    </div>

                    <!-- Employee Position -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="position" :value="__('وظیفه')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="position" class="block w-full mt-1" type="text" name="position" value="{{ $employee->position }}" required autofocus autocomplete="position" />
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <!-- Employee Type -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="employeeType" :value="__('نوعیت وظیفه')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="employeeType">
                            @foreach ($employeeTypes as $type)
                                @php
                                    $selected = "";
                                    if($empType == $type->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $type->id}}">
                                        {{$type->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Employee Shift -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="employeeShift" :value="__('شفت کاری')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="employeeShift">
                            @foreach ($employeeShifts as $shift)
                                @php
                                    $selected = "";
                                    if($empType == $shift->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $shift->id}}">
                                        {{$shift->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Province -->
                    {{-- <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="province" :value="__('ولایت')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="province">
                            @if(auth()->user()->province_id == 13)
                                @foreach ($provinces as $province)
                                    @php
                                        $selected = "";
                                        if($empProvince == $province->id) {
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
                    </div> --}}

                    <!-- Employee Contact -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="contact" :value="__('شماره تماس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="contact" class="block w-full mt-1" type="text" name="contact" value="{{ $employee->contact }}" required autofocus autocomplete="contact" />
                        <x-input-error :messages="$errors->get('contact')" class="mt-2" />
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

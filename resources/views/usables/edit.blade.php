<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('تغییر دادن معلومات:') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $item->name }}
                </span>
            </h2>

            <a href={{ route('usables') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/usables/update/'.$item->id) }}"
                    enctype='multipart/form-data' id="app-form">
                @csrf
                @method('put')

                    <!-- Name -->
                    <div>
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="name" :value="__('اسم جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" value="{{ $item->name }}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                                @php
                                    $selected = "";
                                    if($item->usable_type_id == $type->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $type->id}}">
                                        {{$type->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Unit -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="unit" :value="__('واحد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="unit">
                            @foreach ($units as $unit)
                                @php
                                    $selected = "";
                                    if($item->unit_id == $unit->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $unit->id}}">
                                        {{$unit->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Details -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="details" :value="__('مشخصات جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-area id="details" class="block w-full mt-1" name="details" :value="$item->details" autofocus autocomplete="details" />
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- Total -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('تعداد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input min="0" id="total" class="block w-full mt-1" type="number" name="total" value="{{ $item->total }}" autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- Unit Price -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="unitPrice" :value="__('قیمت فیات')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="unitPrice" class="block w-full mt-1" type="text" name="unitPrice" value="{{ $item->unit_price }}" autofocus autocomplete="unitPrice" />
                        <x-input-error :messages="$errors->get('unitPrice')" class="mt-2" />
                    </div>

                    <!-- Total Price -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="totalPrice" :value="__('مجموع قیمت')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="totalPrice" class="block w-full mt-1" type="text" name="totalPrice" value="{{ $item->total_price }}" autofocus autocomplete="totalPrice" />
                        <x-input-error :messages="$errors->get('totalPrice')" class="mt-2" />
                    </div>

                    <!-- Purchase Price Currency -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="purchasePriceCurrency" :value="__('واحد پولی قیمت خرید')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="purchasePriceCurrency">
                            @foreach ($currencies as $currency)
                                @php
                                    $selected = "";
                                    if($item->currency_id == $currency->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $currency->id}}">
                                        {{$currency->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Item Purchase Date -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="date" :value="__('تاریخ خرید جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <div class="flex gap-3 mt-1">
                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="purchaseYear">
                                @foreach ($years as $year)
                                    @php
                                        $selected = "";
                                        if($itemYear == $year->id) {
                                            $selected = "selected";
                                        }

                                    @endphp
                                        <option {{ $selected }} value="{{ $year->id }}" class="space-y-3 text-lg">
                                            {{ $year->name }}
                                        </option>
                                @endforeach
                            </select>

                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="purchaseMonth">
                                @foreach ($months as $month)
                                    @php
                                        $selected = "";
                                        if($itemMonth == $month->id) {
                                            $selected = "selected";
                                        }

                                    @endphp
                                        <option {{ $selected }} value="{{ $month->id }}" class="space-y-3 text-lg">
                                            {{ $month->name }}
                                        </option>
                                @endforeach
                            </select>

                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="purchaseDay">
                                @foreach ($days as $day)
                                    @php
                                        $selected = "";
                                        if($itemDay == $day->id) {
                                            $selected = "selected";
                                        }

                                    @endphp
                                        <option {{ $selected }} value="{{ $day->id }}" class="space-y-3 text-lg">
                                            {{ $day->name }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
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
                                        if($itemProvince == $province->id) {
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

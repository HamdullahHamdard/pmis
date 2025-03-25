<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('تغییر دادن معلومات:') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $item->name }}
                </span>
            </h2>

            <a href={{ route('items') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/items/update/'.$item->id) }}"
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

                    <!-- Total -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('تعداد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input min="0" id="total" class="block w-full mt-1" type="number" name="total" value="{{ $item->total }}" autofocus autocomplete="total" />
                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- Unit -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="category" :value="__('واحد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="unit">
                            @foreach ($units as $unit)
                                @php
                                    $selected = "";
                                    if($itemUnit == $unit->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $unit->id}}">
                                        {{$unit->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- M7 Form Number -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="m7Number" :value="__('نمبر فورم م۷')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input min="0" id="m7Number" class="block w-full mt-1" type="text" name="m7Number" value="{{ $item->m7number }}" autofocus autocomplete="m7Number" />
                        <x-input-error :messages="$errors->get('m7Number')" class="mt-2" />
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

                    <!-- In-Stock -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="inStock" :value="__('تعداد موجود در گدام')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="inStock" class="block w-full mt-1" type="text" name="inStock" value="{{ $item->in_stock }}" autofocus autocomplete="inStock" />
                        <x-input-error :messages="$errors->get('inStock')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="category" :value="__('کتگوری')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select
                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="category">
                            @foreach ($categories as $category)
                                @php
                                    $selected = "";
                                    if($itemCategory == $category->id) {
                                        $selected = "selected";
                                    }

                                @endphp
                                    <option {{ $selected }} value="{{    $category->id}}">
                                        {{$category->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Purchase Price -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="purchasePrice" :value="__('قیمت خرید فیات')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="purchasePrice" class="block w-full mt-1" type="text" name="purchasePrice" value="{{ $item->purchase_price }}" autofocus autocomplete="purchasePrice" />
                        <x-input-error :messages="$errors->get('purchasePrice')" class="mt-2" />
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
                                    if($itemCurrency == $currency->id) {
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

                    <!-- Item Stock Number -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="itemStockNumber" :value="__('نمبر جنس در گدام')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="itemStockNumber" class="block w-full mt-1" type="text" name="itemStockNumber" value="{{ $item->item_stock_number }}" autofocus autocomplete="itemStockNumber" />
                        <x-input-error :messages="$errors->get('itemStockNumber')" class="mt-2" />
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

                    <!-- Item Images -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="itemImages" :value="__('تصاویر جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <p class="mt-1 text-sm text-green-600 dark:text-green-500"> لطفآ سایز   تصاویر را کوچک نمائید تا زودتر اپلود شوند</p>

                        <x-text-input id="itemImages" class="block w-full mt-3" type="file" name="itemImages" />
                        <x-input-error :messages="$errors->get('itemImages')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <img src="{{url('/images/items/' . $item->images)}}" alt="{{ $item->name }}" class="mt-6 rounded-lg img-responsive"/>
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

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن جنس جدید') }}
            </h2>

            <a href={{ route('items') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

                <form method="POST" class="max-w-xl mx-auto" action="{{ url('stock/items/store') }}" enctype='multipart/form-data'
                id="app-form">
                @csrf

                    <!-- Name -->
                    <div>
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="name" :value="__('اسم جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Total -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="total" :value="__('تعداد')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input min="0" id="total" class="block w-full mt-1" type="number" name="total" :value="old('total')" required autofocus autocomplete="total" />
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
                                <option value="{{ $unit->id }}" class="py-2">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- M7 Form Number -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="m7Number" :value="__('نمبر فورم م۷')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input min="0" id="m7Number" class="block w-full mt-1" type="text" name="m7Number" :value="old('m7Number')" required autofocus autocomplete="m7Number" />
                        <x-input-error :messages="$errors->get('m7Number')" class="mt-2" />
                    </div>

                    <!-- Details -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="details" :value="__('مشخصات جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-area id="details" class="block w-full mt-1" type="text" name="details" :value="old('details')" required autofocus autocomplete="details" />
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- In-Stock -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="inStock" :value="__('تعداد موجود در گدام')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="inStock" class="block w-full mt-1" type="text" name="inStock" :value="old('inStock')" required autofocus autocomplete="inStock" />
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
                                <option value="{{ $category->id }}" class="py-2">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Purchase Price -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="purchasePrice" :value="__('قیمت خرید فیات')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <x-text-input id="purchasePrice" class="block w-full mt-1" type="text" name="purchasePrice" :value="old('purchasePrice')" required autofocus autocomplete="purchasePrice" />
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
                                <option value="{{ $currency->id }}" class="py-2">{{ $currency->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Item Purchase Date -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="date" :value="__('تاریخ خرید جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <div class="flex gap-3 mt-2">
                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="purchaseYear">
                                <option selected disabled hidden>سال</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id}}" class="py-2">{{$year->name}}</option>
                                @endforeach
                            </select>

                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="purchaseMonth">
                                <option hidden>ماه</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month->id}}" class="py-2">{{$month->name}}</option>
                                @endforeach
                            </select>

                            <select class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                name="purchaseDay">
                                <option hidden>روز</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day->id}}" class="py-2">{{$day->name}}</option>
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
                        <x-text-input id="itemStockNumber" class="block w-full mt-1" type="text" name="itemStockNumber" :value="old('itemStockNumber')" required autofocus autocomplete="itemStockNumber" />
                        <x-input-error :messages="$errors->get('itemStockNumber')" class="mt-2" />
                    </div>

                    <!-- Province -->
                    {{-- <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="province" :value="__('ولایت')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <select class="w-full text-lg text-gray-700 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                            name="province" required>
                            <option hidden class="py-2 text-gray-300">
                                انتخاب کنید
                            </option>

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
                    </div> --}}

                    <!-- Item Images -->
                    <div class="mt-3">
                        <div class="flex items-center justify-start text-center">
                            <x-input-label for="itemImages" :value="__('تصاویر جنس')" />
                            <span class="text-xl text-red-500">*</span>
                        </div>
                        <p class="mt-1 text-sm text-green-600 dark:text-green-500"> لطفآ سایز   تصاویر را کوچک نمائید تا زودتر اپلود شوند</p>

                        <x-text-input id="itemImages" class="block w-full mt-3" type="file" name="itemImages" :value="old('itemImages')" required autofocus autocomplete="itemImages" />
                        <x-input-error :messages="$errors->get('itemImages')" class="mt-2" />

                        {{-- <x-file-input class="block w-full mt-1" required autofocus autocomplete="itemImages" />
                        <x-input-error :messages="$errors->get('itemImages')" class="mt-2" /> --}}
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

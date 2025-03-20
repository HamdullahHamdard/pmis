<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن فورم اعاده تحویلخانه جدید') }}
            </h2>

            <a href={{ route('form8s.index') }}
                class="flex items-center text-gray-600 transition-colors dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6">
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">اعاده تحویلخانه</h1>
                </div>

                <!-- Display any error or success messages -->
                @if(session('error'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Step indicator -->
                <div class="flex items-center justify-center my-6">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-400 rounded-full shadow-md">
                            <span class="text-sm font-medium">1</span>
                        </div>
                        <div class="w-20 h-1 bg-indigo-200 dark:bg-indigo-800">
                            <div class="h-1 transition-all duration-300 bg-indigo-600" style="width: 100%"></div>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-600 rounded-full shadow-md">
                            <span class="text-sm font-medium">2</span>
                        </div>
                    </div>
                </div>

                <!-- Selected Form Info -->
                <div class="flex flex-row items-start gap-4 p-4 mb-6 rounded-lg bg-gray-50 dark:bg-gray-700 md:flex-col md:items-center">
                    <h3 class="font-medium text-gray-900 dark:text-white whitespace-nowrap">
                     انتخاب شوی فورم:
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300 whitespace-nowrap">
                        د توزیع  نمبر: {{ $selectedForm5->id }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300 whitespace-nowrap">
                        شخص: {{ $selectedForm5->form9s->employee->name }}
                    </p>
                </div>


                <!-- Add details form -->
                <form method="POST" action="{{ route('form8s.store') }}">
                    @csrf
                    <input type="hidden" name="form5_id" value="{{ $selectedForm5->id }}">

                    <div class="space-y-6">
                        @foreach($selectedSubmissions as $index => $submission)
                            <div class="transition-all rounded-lg shadow-sm hover:border-indigo-200 dark:hover:border-indigo-800">
                                <h3 class="font-medium text-gray-900 dark:text-white">
                                    {{ $index + 1 }}. {{ $submission->item->name ?? 'No Item Name' }}
                                </h3>
                                <h4 class="mb-4 font-medium text-gray-900 dark:text-white">
                                    {{ $index + 1 }}.     تسلیم شوی مقدار: {{ $submission->total ?? 'No Quantity Name' }}
                                </h4>


                                <input type="hidden" name="submission_ids[]" value="{{ $submission->id }}">

                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            قیمت جدید
                                        </label>
                                        <input type="number" name="new_prices[{{ $submission->id }}]" required
                                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                            placeholder="قیمت جدید را وارد کنید"
                                            value="{{ old('new_prices.' . $submission->id) }}">
                                        @error('new_prices.' . $submission->id)
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            مقدار
                                        </label>
                                        <input type="number" name="new_quantity[{{ $submission->id }}]" required
                                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                            placeholder="قیمت جدید را وارد کنید"
                                            value="{{ old('new_prices.' . $submission->id) }}">
                                        @error('new_prices.' . $submission->id)
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            قیمت جدید
                                        </label>
                                        <input type="number" name="new_year[{{ $submission->id }}]" required
                                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                            placeholder="قیمت جدید را وارد کنید"
                                            value="{{ old('new_prices.' . $submission->id) }}">
                                        @error('new_prices.' . $submission->id)
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            مقدار
                                        </label>
                                        <input type="number" name="new_quantity[{{ $submission->id }}]" required
                                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                            placeholder="قیمت جدید را وارد کنید"
                                            value="{{ old('new_prices.' . $submission->id) }}">
                                        @error('new_prices.' . $submission->id)
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            شخص تایید کننده
                                        </label>
                                        <input type="number" name="certified_persons[{{ $submission->id }}]" required
                                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                            placeholder="شخص جدید را وارد کنید"
                                            value="{{ old('certified_persons.' . $submission->id) }}">
                                        @error('certified_persons.' . $submission->id)
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                 د تسلیمی نمبر
                            </label>
                            <input type="text" name="form8_number" required
                                class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                placeholder="تسلیمی جدید را وارد کنید"
                                value="{{ old('form8_number') }}">
                            @error('form8_number.' . $submission->id)
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                 معتمد
                            </label>
                            <input type="text" name="trusted" required
                                class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                placeholder="معتمد جدید را وارد کنید"
                                value="{{ old('trusted') }}">
                            @error('trusted')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
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
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <a href="{{ route('form8s.select-items', ['form5_id' => $selectedForm5->id]) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 rtl:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            {{ __('برگشت') }}
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('ثبت کردن فورم') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

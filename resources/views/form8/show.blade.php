<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('فورم ۸ - اعاده تحویلخانه') }}
            </h1>

            <a href={{ route('form8s.index') }} class="flex items-center gap-2 text-gray-600 transition-colors dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">
                <span>برگشت به لیست</span>
                <i data-feather="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg dark:bg-gray-800 rounded-xl">
                <!-- Status Badge -->
                <div class="p-1 bg-gradient-to-r from-primary-500 to-primary-600"></div>

                <!-- Form8 Header Information -->
                <div class="p-6 md:p-8">
                    <div class="flex flex-col items-center justify-around gap-6 md:flex-row md:gap-10 md:items-center">
                        <div class="flex flex-row items-center">
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">شماره فورم ۸: </span>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $form8->form8_number }}</span>
                        </div>

                        <div class="flex flex-row items-center">
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">تاریخ ثبت: </span>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">
                                {{ $form8->day->name }} / {{ $form8->month->name }} / {{ $form8->year->name }}
                            </span>
                        </div>

                        <div class="flex flex-row items-center">
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">معتمد مسئول: </span>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ $form8->trusted }}</span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700"></div>

                <!-- Form5 Related Information -->
                <div class="p-6 md:p-8">
                    <h2 class="flex items-center gap-2 mb-6 text-xl font-bold text-gray-900 dark:text-white">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                            <i data-feather="link" class="w-4 h-4"></i>
                        </span>
                        معلومات فورم ۵ مرتبط
                    </h2>

                    <div class="grid grid-cols-1 gap-6 p-4 rounded-lg md:grid-cols-2 dark:bg-gray-700 bg-gray-50 dark:bg-gray-750">
                        <div class="flex flex-row items-center">
                            <span class="items-center ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">شماره فورم ۵: </span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $form8->form5_id }}</span>
                        </div>

                        @if($form8->form5)
                            <div class="flex flex-row items-center">
                                <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">تاریخ فورم ۵: </span>
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $form8->form5->distribution_date }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Returned Items -->
                <div class="p-6 md:p-8">
                    <h2 class="flex items-center gap-2 mb-6 text-xl font-bold text-gray-900 dark:text-white">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                            <i data-feather="package" class="w-4 h-4"></i>
                        </span>
                        اقلام اعاده شده
                    </h2>

                    <div class="overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-right">
                                <thead class=" bg-gray-50 dark:bg-gray-700">
                                    <tr >
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400">شماره</th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400">کارمند</th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400">نام جنس</th>
                                        <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400">مقدار اعاده شده</th>
                                        {{-- <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400">قیمت فی واحد</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @if($form8->form5 && $form8->form5->submissions)
                                        @foreach($form8->form8Submissions as $index => $submission)
                                            <tr class="transition-colors bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $submission->employee->name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ optional($submission->item)->name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $submission->total }}
                                                </td>
                                                {{-- <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    <span class="font-medium">{{ number_format(optional($submission->item)->purchase_price) }}</span> افغانی
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                                <div class="flex flex-col items-center justify-center gap-2">
                                                    <i data-feather="inbox" class="w-8 h-8 text-gray-400 dark:text-gray-500"></i>
                                                    <p>هیچ موردی یافت نشد</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col justify-end gap-4 p-6 border-t border-gray-200 sm:flex-row md:p-8 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('form8s.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-650 transition-colors">
                        <i data-feather="list" class="w-4 h-4 ml-2"></i>
                        برگشت به لیست
                    </a>
                </div>
            </div>

            <!-- Additional Information Card -->
            <div class="mt-6 overflow-hidden bg-white shadow-lg dark:bg-gray-800 rounded-xl">
                <div class="p-6 md:p-8">
                    <h2 class="flex items-center gap-2 mb-6 text-xl font-bold text-gray-900 dark:text-white">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-300">
                            <i data-feather="info" class="w-4 h-4"></i>
                        </span>
                        معلومات تکمیلی
                    </h2>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="flex flex-row items-center">
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">تاریخ آخرین بروزرسانی: </span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ now()->format('Y/m/d') }}
                            </span>
                        </div>

                        <div class="flex flex-row items-center">
                            <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">وضعیت پردازش: </span>
                            <span class="inline-flex items-center mt-1">

                                <span class="text-lg font-semibold text-gray-900 dark:text-white">تکمیل شده</span>
                                <span class="inline-block w-2 h-2 mr-2 bg-green-500 rounded-full"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

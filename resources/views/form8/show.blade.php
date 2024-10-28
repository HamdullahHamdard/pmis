<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('فورم ۸ - اعاده تحویلخانه') }} #{{ $form8->id }}
            </h2>

            <a href={{ route('form8s.index') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <!-- Form8 Header Information -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">شماره فورم ۸:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $form8->form8_number }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">تاریخ:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $form8->day->name }} / {{ $form8->month->name }} / {{ $form8->year->name }}
                            </span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">معتمد:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $form8->trusted }}</span>
                        </div>
                    </div>
                </div>

                <!-- Form5 Related Information -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="mb-4 text-xl font-semibold text-gray-800 dark:text-gray-200">معلومات فورم ۵ مرتبط</h3>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">شماره فورم ۵:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $form8->form5_id }}</span>
                        </div>
                        {{-- @if(optional($form8->form5)) --}}
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">تاریخ فورم ۵:</span>
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{$form8->day->name }} /
                                    {{ $form8->month->name }} /
                                    {{ $form8->year->name }}
                                </span>
                            </div>
                        {{-- @endif --}}
                    </div>
                </div>

                <!-- Returned Items -->
                <div class="p-6">
                    <h3 class="mb-4 text-xl font-semibold text-gray-800 dark:text-gray-200">اقلام اعاده شده</h3>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">شماره</th>
                                    <th scope="col" class="px-6 py-3">نام جنس</th>
                                    <th scope="col" class="px-6 py-3">واحد</th>
                                    <th scope="col" class="px-6 py-3">مقدار اصلی</th>
                                    <th scope="col" class="px-6 py-3">مقدار اعاده شده</th>
                                    <th scope="col" class="px-6 py-3">قیمت فی واحد</th>
                                    <th scope="col" class="px-6 py-3">قیمت مجموعی</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($form8->form5 && $form8->form5->submissions)
                                    @foreach($form8->form5->submissions as $index => $submission)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                {{ optional($submission->item)->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ optional($submission->unit)->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $submission->original_total ?? $submission->total }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $submission->is_returned ?
                                                    ($submission->original_total ?? $submission->total) :
                                                    ($submission->original_total - $submission->total) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ optional($submission->item)->purchase_price }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @php
                                                    $returnedQuantity = $submission->is_returned ?
                                                        ($submission->original_total ?? $submission->total) :
                                                        ($submission->original_total - $submission->total);
                                                    $totalPrice = $returnedQuantity * optional($submission->item)->purchase_price;
                                                @endphp
                                                {{ number_format($totalPrice, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            هیچ موردی یافت نشد
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" colspan="6" class="px-6 py-3 text-base text-left">مجموع کل</th>
                                    <td class="px-6 py-3">
                                        @php
                                            $grandTotal = 0;
                                            if($form8->form5 && $form8->form5->submissions) {
                                                foreach($form8->form5->submissions as $submission) {
                                                    $returnedQuantity = $submission->is_returned ?
                                                        ($submission->original_total ?? $submission->total) :
                                                        ($submission->original_total - $submission->total);
                                                    $grandTotal += $returnedQuantity * optional($submission->item)->purchase_price;
                                                }
                                            }
                                        @endphp
                                        {{ number_format($grandTotal, 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- Signatures Section -->
                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="flex flex-col items-center p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                            <span class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">تهیه کننده</span>
                            <div class="w-32 h-16 border-b-2 border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="flex flex-col items-center p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                            <span class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">معتمد</span>
                            <div class="w-32 h-16 border-b-2 border-gray-300 dark:border-gray-600"></div>
                            <span class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $form8->trusted }}</span>
                        </div>
                        <div class="flex flex-col items-center p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                            <span class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">آمر</span>
                            <div class="w-32 h-16 border-b-2 border-gray-300 dark:border-gray-600"></div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 p-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('form8s.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600">
                        برگشت به لیست
                    </a>
                    <a href="#" onclick="window.print()" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i data-feather="printer" class="inline w-4 h-4 mr-1"></i> چاپ
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Initialize Feather icons
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
    @endpush
</x-app-layout>

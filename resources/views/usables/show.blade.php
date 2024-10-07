
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('دیدن معلومات:') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $item->name }}
                </span>
            </h2>

            <a href={{ route('usables') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div x-data="{
                    printDiv() {
                        var printContents = this.$refs.container.innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                }"
                x-cloak
                x-ref="container" class="rounded overflow-hidden md:mx-0 lg:mx-0 mb-2 pb-8">
                <div class="px-6 text-dark dark:text-white hidden show-page-heading">
                        <div class="sm:grid grid-cols-2 show-item-top-heading">
                            <div class="flex gap-5 justify-start items-center">
                                <img src="{{ URL::to('/') }}/logo/iea-logo.jpg" alt="RTA New Logo" class="img-responsive w-28 h-[6.2rem]" loading="lazy">
                                <div class="text-[1rem] sm:text-xl font-medium space-y-0 sm:space-y-2 print:text-xs">
                                    <p>د افغانستـان اسلامي امارت</p>
                                    <p>د اطلاعاتو او فرهنگ وزارت</p>
                                </div>
                            </div>
                            <div class="flex gap-5 justify-start sm:justify-end items-center">
                                <div class="text-[1rem] sm:text-xl font-medium space-y-0 sm:space-y-2 print:text-xs">
                                    <p>امارت اسلامي افغانستـان</p>
                                    <p>وزارت اطلاعات و فرهنگ</p>
                                </div>
                                <img src="{{ URL::to('/') }}/logo/logo.png" alt="RTA New Logo" class="img-responsive w-24 sm:w-28 h-18" loading="lazy">
                            </div>
                        </div>
                        <div class=" sm:mt-0 flex flex-col items-center justify-center">
                            <div class="text-[1.1rem] sm:text-2xl font-medium space-y-1 sm:space-y-3 print:text-lg">
                                <p>د افـغـانستـان ملـي راډیـو ټلویزون لوی ریـاست</p>
                                <p>ریاست عمومی رادیو تلویزون ملی افغانستان</p>
                            </div>
                            <div class="text-[1rem] sm:text-[1.40rem] mt-2 text-center space-y-0 sm:space-y-2">
                                <p class="font-medium">سیستم مدیریت اجناس اداره</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-between px-6 pt-6">
                        <div class="flex">
                            <span class="text-gray-900 dark:text-gray-100 text-2xl">معلومات جنس</span>
                        </div>
                        @can('edit-usables')
                            <a href="{{ url('stock/usables/edit/'.$item->id) }}" class="px-2 cursor-pointer rounded show-edit-item">
                                <i data-feather="edit" class="hover:text-blue-400 text-gray-500 dark:text-gray-100"></i>
                            </a>
                        @endcan
                    </div>
                    <div class="px-6 py-3 pb-6">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-md text-right text-gray-500 dark:text-gray-400 font-sans">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        اسم جنس مصرفی
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        {{ $item->name}}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        نوعیت
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @foreach ($usableTypes as $type)
                                            @php
                                                $itemType = "";
                                                if($item->usable_type_id == $type->id) {
                                                    $itemType = $type->name;
                                                }

                                            @endphp
                                                {{ $itemType }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        واحد
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @foreach ($units as $unit)
                                            @php
                                                $itemUnit = "";
                                                if($item->unit_id == $unit->id) {
                                                    $itemUnit = $unit->name;
                                                }

                                            @endphp
                                                {{ $itemUnit}}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        مشخصات
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        {{ $item->details}}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        تعداد
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @php
                                            $itemTotal = number_format($item->total, 0, " ", ",");
                                        @endphp
                                        {{ $itemTotal}}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        قیمت فیات
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @php
                                            $itemUnitPrice = number_format($item->unit_price, 0, " ", ",");
                                        @endphp
                                        {{ $itemUnitPrice}}

                                        @foreach ($currencies as $currency)
                                            @php
                                                $itemCurrency = "";
                                                if($item->currency_id == $currency->id) {
                                                    $itemCurrency = $currency->name;
                                                }
                                            @endphp
                                                {{ $itemCurrency}}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        قیمت مجموع
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @php
                                            $itemTotalPrice = number_format($item->total_price, 0, " ", ",");
                                        @endphp
                                        {{ $itemTotalPrice}}

                                        @foreach ($currencies as $currency)
                                            @php
                                                $itemCurrency = "";
                                                if($item->currency_id == $currency->id) {
                                                    $itemCurrency = $currency->name;
                                                }
                                            @endphp
                                                {{ $itemCurrency}}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="bg-white border-b mb-4 dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        تاریخ خرید
                                    </th>
                                    <td scope="col" class="px-6 py-3" dir="rtl">
                                        @foreach ($days as $day)
                                            @php
                                                $showItemDay = "";
                                                if($item->purchaseDay_id == $day->id) {
                                                    $showItemDay = $day->name;
                                                }

                                            @endphp
                                                {{ $showItemDay}}
                                        @endforeach
                                        /
                                        @foreach ($months as $month)
                                            @php
                                                $showItemMonth = "";
                                                if($item->purchaseMonth_id == $month->id) {
                                                    $showItemMonth = $month->name;
                                                }

                                            @endphp
                                                {{ $showItemMonth}}
                                        @endforeach
                                        /
                                        @foreach ($years as $year)
                                            @php
                                                $showItemYear = "";
                                                if($item->purchaseYear_id == $year->id) {
                                                    $showItemYear = $year->name;
                                                }

                                            @endphp
                                                {{ $showItemYear}}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ولایت
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @foreach ($provinces as $province)
                                            @php
                                                $itemProvince = "";
                                                if($item->province_id == $province->id) {
                                                    $itemProvince = $province->name;
                                                }

                                            @endphp
                                                {{ $itemProvince}}
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="px-6 pt-6">
                        <span class="text-gray-900 dark:text-gray-100 text-2xl">لست ریاست/آمریت که این جنس را تسلیم شده اند</span>
                    </div>
                    <div class="relative overflow-x-auto sm:rounded-lg p-6">
                        <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        شماره
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        اسم ریاست/آمریت/کارمند
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        تعداد یا مقدار
                                    </th>
                                    <th scope="col" class="px-6 py-3 show-item-return">
                                        تاریخ درخواستی
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usableSubmissions as $submission)
                                    @if($item->id == $submission->item_id)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $submission->id }}
                                            </th>
                                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                @if ($submission->employee_id  != null)
                                                    @foreach ($employees as $employee)
                                                        @php
                                                            $showEmpName = "";
                                                            if($submission->employee_id == $employee->id) {
                                                                $showEmpName = $employee->name;
                                                            }

                                                        @endphp
                                                            {{ $showEmpName}}
                                                    @endforeach
                                                @elseif ($submission->department_id  != null)
                                                    @foreach ($departments as $department)
                                                        @php
                                                            $showDepName = "";
                                                            if($submission->department_id == $department->id) {
                                                                $showDepName = $department->name;
                                                            }

                                                        @endphp
                                                            {{ $showDepName}}
                                                    @endforeach
                                                @endif
                                            </th>
                                            <td class="px-6 py-4 text-lg font-medium">
                                                {{ $submission->total}}
                                            </td>
                                            <td class="px-6 py-4 text-lg font-medium">
                                                {{ $submission->created_at->format('M d, Y');}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-6 container mx-auto flex justify-center gap-4 show-cta">
                        <button type="button" x-on:click="printDiv()" class="flex justify-center items-center gap-3 text-xl bg-green-500 hover:bg-green-600 text-white w-32 rounded-md py-2">
                            <i data-feather="printer" class="w-5 h-5"></i>
                            پرنټ
                        </button>
                        <a href="{{ url('stock/usables/download/'.$item->id) }}"  class="flex justify-center items-center gap-3 text-xl border border-gray-400 dark:border-gray-500 hover:border-gray-600 dark:hover:border-gray-200 text-black dark:text-white w-32 rounded-md py-2">
                            <i data-feather="download" class="w-5 h-5"></i>
                            ډونلوډ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-lg sm:text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('دیدن معلومات کارمند:') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $employee->name }}
                </span>
            </h2>

            <a href={{ route('employees') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
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
                    <div class="p-6 text-dark dark:text-white hidden show-page-heading">
                        <div class="sm:grid grid-cols-2">
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
                        <div class="mt-4 sm:mt-0 flex flex-col items-center justify-center">
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
                            <span class="text-gray-900 dark:text-gray-100 text-2xl">معلومات کارمند</span>
                        </div>
                        @can('edit-employees')
                            <a href="{{ url('employees/edit/'.$employee->id) }}" class="px-2 cursor-pointer rounded show-edit-emp">
                                <i data-feather="edit" class="hover:text-blue-400 text-gray-500 dark:text-gray-100"></i>
                            </a>
                        @endcan
                    </div>
                    <div class="px-6 py-3 pb-6">
                        <div>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-md text-right text-gray-500 dark:text-gray-400 font-sans show-emp-table">
                                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 ">
                                                اسم کارمند
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                آی دی نمبر
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                وظیفه
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                نوعیت وظیفه
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                شفت کاری
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                ولایت
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left">
                                                شماره تماس
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $employee->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $employee->employment_id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $employee->position }}
                                            </td>
                                            <td class="px-6 py-4 text-center font-medium">
                                                @foreach ($employeeTypes as $type)
                                                    @php
                                                        $showEmpType = "";
                                                        if($employee->employee_type_id == $type->id) {
                                                            $showEmpType = $type->name;
                                                        }

                                                    @endphp
                                                        {{ $showEmpType}}
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 text-center font-medium">
                                                @foreach ($employeeShifts as $shift)
                                                    @php
                                                        $showEmpShift = "";
                                                        if($employee->employee_shift_id == $shift->id) {
                                                            $showEmpShift = $shift->name;
                                                        }

                                                    @endphp
                                                        {{ $showEmpShift}}
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4">
                                                @foreach ($provinces as $province)
                                                    @php
                                                        $showEmpProvince = "";
                                                        if($empProvince == $province->id) {
                                                            $showEmpProvince = $province->name;
                                                        }

                                                    @endphp
                                                        {{ $showEmpProvince}}
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 text-left">
                                                {{ $employee->contact }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            @can("view-submission")
                            <div class="sm:grid sm:grid-cols-3">
                                <div class="sm:col-span-2">
                                    <h2 class="mb-2 mt-6 text-2xl font-semibold text-gray-900 dark:text-white"> تاریخچه اجناس گرفته شده از گدام</h2>
                                </div>
                                <div class="py-4 text-center flex items-center sm:col-span-1">
                                    <p class="text-gray-600 dark:text-gray-200 text-md ml-2">تعداد اجناس گرفته شده</p>
                                    <a href={{url('stock/submission')}} type="button" class="text-gray-100 w-full bg-sky-600 hover:bg-sky-700 px-8 py-2.5 rounded-md text-center flex items-center justify-center"><span class="text-lg">{{ $submissions->count() }}</span><i data-feather="arrow-left" class="w-4 h-4 mr-2 text-gray-200"></i></a>
                                </div>
                            </div>
                            @endcan


                            @can("view-items")
                            <div class="sm:grid grid-cols-2 gap-4">
                                <div class="col-span-1">
                                    <h2 class="mb-3 mt-6 text-xl font-semibold text-gray-900 dark:text-gray-300">اجناس واپس نشده : <span class="font-semibold dark:text-white text-2xl">{{ $submissions->where('is_returned', false)->count() }}</span></h2>
                                    <ul class="text-gray-500 list-inside dark:text-gray-400 text-lg font-sans">
                                        @foreach ($submissions as $submission)
                                            @foreach ($items as $item)
                                                @if($item->id == $submission->item_id && $submission->is_returned == false)
                                                    <a href="{{ url('stock/items/show/'.$item->id) }}">
                                                        <li class="flex items-center px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md shadow-sm hover:bg-gray-300 dark:hover:bg-gray-900 hover:border-gray-100 dark:hover:border-gray-600 hover:underline mb-3">
                                                            <i data-feather="x-circle" class="text-red-500 dark:text-red-400 w-4 h-4 ml-1.5"></i>
                                                            {{ $item->name }}
                                                        </li>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-span-1">
                                    <h2 class="mb-3 mt-6 text-xl font-semibold text-gray-900 dark:text-gray-300">اجناس واپس شده : <span class="font-semibold dark:text-white text-2xl">{{ $submissions->where('is_returned', true)->count() }}</span></h2>
                                    <ul class="text-gray-500 dark:text-gray-400 text-lg font-sans w-full">
                                        @foreach ($submissions as $submission)
                                            @foreach ($items as $item)
                                                @if($item->id == $submission->item_id && $submission->is_returned == true)
                                                    <a href="{{ url('stock/items/show/'.$item->id) }}">
                                                        <li class="flex items-center px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md shadow-sm hover:bg-gray-300 dark:hover:bg-gray-900 hover:border-gray-100 dark:hover:border-gray-600 hover:underline mb-3">
                                                            <i data-feather="check-circle" class="text-green-500 dark:text-green-400 w-4 h-4 ml-1.5"></i>
                                                            {{ $item->name }}
                                                        </li>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endcan

                        </div>
                    </div>

                    <div class="pt-6 container mx-auto flex justify-center gap-4 show-cta">
                        <button type="button" x-on:click="printDiv()" class="flex justify-center items-center gap-3 text-xl bg-green-500 hover:bg-green-600 text-white w-32 rounded-md py-2">
                            <i data-feather="printer" class="w-5 h-5"></i>
                            پرنټ
                        </button>
                        <a href="#" class="flex justify-center items-center gap-3 text-xl border border-gray-400 dark:border-gray-500 hover:border-gray-600 dark:hover:border-gray-200 text-black dark:text-white w-32 rounded-md py-2">
                            <i data-feather="download" class="w-5 h-5"></i>
                            ډونلوډ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

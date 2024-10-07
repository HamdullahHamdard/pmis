
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __(' مشاهده تسلیمی') }}
                {{-- <span class="text-red-500 dark:text-red-400">
                    {{ $submission->name }}
                </span> --}}
            </h2>

            <a href={{ route('submission') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg">
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
                x-ref="container" class="pb-8 mb-2 overflow-hidden rounded md:mx-0 lg:mx-0">
                    <div class="hidden px-6 text-dark dark:text-white show-page-heading">
                        <div class="grid-cols-2 sm:grid show-item-top-heading">
                            <div class="flex items-center justify-start gap-5">
                                <img src="{{ URL::to('/') }}/logo/iea-logo.jpg" alt="RTA New Logo" class="img-responsive w-28 h-[6.2rem]" loading="lazy">
                                <div class="text-[1rem] sm:text-xl font-medium space-y-0 sm:space-y-2 print:text-xs">
                                    <p>د افغانستـان اسلامي امارت</p>
                                    <p>د اطلاعاتو او فرهنگ وزارت</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-start gap-5 sm:justify-end">
                                <div class="text-[1rem] sm:text-xl font-medium space-y-0 sm:space-y-2 print:text-xs">
                                    <p>امارت اسلامي افغانستـان</p>
                                    <p>وزارت اطلاعات و فرهنگ</p>
                                </div>
                                <img src="{{ URL::to('/') }}/logo/logo.png" alt="RTA New Logo" class="w-24 img-responsive sm:w-28 h-18" loading="lazy">
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center sm:mt-0">
                            <div class="text-[1.1rem] sm:text-2xl font-medium space-y-1 sm:space-y-3 print:text-lg">
                                <p>د افـغـانستـان ملـي راډیـو ټلویزون لوی ریـاست</p>
                                <p>ریاست عمومی رادیو تلویزون ملی افغانستان</p>
                            </div>
                            <div class="text-[1rem] sm:text-[1.40rem] mt-2 text-center space-y-0 sm:space-y-2">
                                <p class="font-medium">سیستم مدیریت اجناس اداره</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between w-full px-6 pt-6 mt-3">
                        <div class="flex">
                            <span class="text-2xl text-gray-900 dark:text-gray-100">معلومات تسلیمی جنس به کارمند اداره یا ریاست/آمریت مستقل</span>
                        </div>
                        {{-- @can('edit-submission')
                            <a href="{{ url('stock/submission/edit/'.$submission->id) }}" class="px-2 rounded cursor-pointer show-edit-item">
                                <i data-feather="edit" class="text-gray-500 hover:text-blue-400 dark:text-gray-100"></i>
                            </a>
                        @endcan --}}
                    </div>
                    <div class="px-6 py-3 pb-6">
                        <div class="relative overflow-x-auto">
                            <table class="w-full font-sans text-right text-gray-500 text-md dark:text-gray-400">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        اسم کارمند
                                    </th>
                                    <td scope="col" class="px-6 py-3">
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
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        جنس گرفته شده
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @foreach ($items as $item)
                                            @php
                                                $showItemName = "";
                                                if($submission->item_id == $item->id) {
                                                    $showItemName = $item->name;
                                                }

                                            @endphp
                                                {{ $showItemName}}
                                        @endforeach
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        تعداد
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        {{ $submission->total}}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        معلومات اضافی
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        {{ $submission->details }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        تاریخ تسلیمی
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        {{ $submission->created_at->format('M d, Y');}}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ولایت
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @foreach ($provinces as $province)
                                            @php
                                                $submissionProvince = "";
                                                if($submission->province_id == $province->id) {
                                                    $submissionProvince = $province->name;
                                                }

                                            @endphp
                                                {{ $submissionProvince}}
                                        @endforeach
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        حالت تسلیمی
                                    </th>
                                    <td scope="col" class="px-6 py-3">
                                        @if($submission->is_returned == true)
                                            <div class="flex justify-start">
                                                <i data-feather="check-circle" class="text-green-500 dark:text-green-400 w-6 h-6 ml-1.5"></i>
                                            </div>
                                        @elseif($submission->is_returned == false)
                                            <div class="flex justify-start">
                                                <i data-feather="x-circle" class="text-red-500 dark:text-red-400 w-6 h-6 ml-1.5"></i>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="container flex justify-center gap-4 pt-6 mx-auto show-cta">
                        <button type="button" x-on:click="printDiv()" class="flex items-center justify-center w-32 gap-3 py-2 text-xl text-white bg-green-500 rounded-md hover:bg-green-600">
                            <i data-feather="printer" class="w-5 h-5"></i>
                            پرنټ
                        </button>
                        <a href="{{ url('stock/submission/downloadSingle/'.$submission->id) }}" class="flex items-center justify-center w-32 gap-3 py-2 text-xl text-black border border-gray-400 rounded-md dark:border-gray-500 hover:border-gray-600 dark:hover:border-gray-200 dark:text-white">
                            <i data-feather="download" class="w-5 h-5"></i>
                            ډونلوډ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

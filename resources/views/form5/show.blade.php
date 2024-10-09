<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('فورم ف س ۵:') }}
                <span class="text-red-500 dark:text-red-400">
                    نمبر تکیت توزیع {{ $form->distribution_no }}
                </span>
            </h2>

            <a href={{ route('form5s.index') }}
                class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
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
                }" x-cloak x-ref="container"
                    class="pb-8 mb-2 overflow-hidden rounded md:mx-0 lg:mx-0">
                    <div class="hidden px-6 text-dark dark:text-white show-page-heading">
                        <div class="grid-cols-2 sm:grid show-item-top-heading">
                            <div class="flex items-center justify-start gap-5">
                                <img src="{{ URL::to('/') }}/logo/iea-logo.jpg" alt="RTA New Logo"
                                    class="w-20 img-responsive h-18" loading="lazy">
                                <div class="space-y-0 text-base font-bold sm:space-y-2 print:text-base">
                                    <p>د افغانستـان اسلامي امارت</p>
                                    <p>د اطلاعاتو او فرهنگ وزارت</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-start gap-5 sm:justify-end">
                                <div class="space-y-0 text-base font-bold sm:space-y-2 print:text-base">
                                    <p>امارت اسلامي افغانستـان</p>
                                    <p>وزارت اطلاعات و فرهنگ</p>
                                </div>
                                <img src="{{ URL::to('/') }}/logo/logo.png" alt="RTA New Logo"
                                    class="w-20 img-responsive h-18" loading="lazy">
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center sm:mt-0">
                            <div class="space-y-1 text-sm font-sm sm:space-y-3 print:text-sm">
                                {{-- <p>د افـغـانستـان ملـي راډیـو ټلویزون لوی ریـاست</p> --}}
                                <p>ریاست عمومی رادیو تلویزون ملی افغانستان</p>
                            </div>
                            <div class="mt-2 space-y-0 text-sm text-center print:text-sm sm:space-y-2">
                                <p class="font-medium">سیستم مدیریت اجناس اداره</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between w-full px-6 pt-6 mt-0">
                        <div class="flex">
                            <span class="text-xs text-gray-900 dark:text-gray-100 print:text-sm">فورمه ف – س (۵)</span>
                        </div>
                        @can('edit-submission')
                            <a href="#" class="px-2 rounded cursor-pointer show-edit-item">
                                <i data-feather="edit" class="text-gray-500 hover:text-blue-400 dark:text-gray-100"></i>
                            </a>
                        @endcan
                    </div>

                    {{-- Done it to here --}}
                    <div class="px-6 py-3 pb-6 ">
                        <div class="relative overflow-hidden dark:text-white">
                            <table class="w-full text-xs text-right border-collapse border-transparent print:text-xs">
                                <thead>
                                    <tr>
                                        <td class="p-1 text-right border">
                                            نمبر تکت توزیع: {{$form->id}}
                                        </td>
                                        <td class="p-1 text-right border">
                                            نمبرف س – ۹: {{ $form->form9s->form9s_number}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1 text-right border">
                                            تاریخ:   &nbsp; &nbsp; &nbsp;  {{$form->distribution_date}}
                                        </td>
                                        <td class="p-1 text-right border">
                                            تاریخ: {{$form->form9s->form_date}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1 text-right border">
                                            تحویلخانه توزیع کننده محترم: {{$form->distribution_warehouse}}
                                        </td>
                                        <td class="p-1 text-right border">
                                            شعبه درخواست کننده:

                                            {{$department->name}}
                                        </td>
                                    </tr>
                                </thead>
                            </table>

                            <table class="w-full text-xs text-left border table-auto print:text-xs">
                                <thead class="uppercase">
                                    <tr>
                                        <td class="w-10 p-1 text-center border"  >شماره
                                        </td>
                                        <td class="w-10 p-1 text-center border"  >مقدار
                                        </td>
                                        <td class="w-10 p-1 text-center border"  >تبصره
                                            ذخیره</td>
                                        <td class="p-1 text-center border w-96"  >
                                            تفصیـــــــــــــــــــــــــــــــــــــلات جنس</td>
                                        <td class="w-10 p-1 text-center border"  >قیمت
                                            واحد </td>
                                        <td class="w-10 p-1 text-center border"  >قیمت
                                            مجموعه</td>
                                        <td class="p-1 text-center border min-w-fit"  >بحساب
                                            معامله شده</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $totalPrice = 0;
                                        $itemNo = 0 ;
                                    @endphp
                                    @foreach ($formItems as $formItem)
                                    @foreach ($submissions as $submission)
                                        @if ($submission->id == $formItem->submission_id)
                                            @foreach ($items as $item)
                                                @if ($submission->item_id == $item->id)


                                    @php
                                        $itemNo = $itemNo + 1 ;
                                    @endphp

                                    <tr class="py-4">
                                        <td class="w-10 p-4 py-4 text-center border-l"  >{{$itemNo}}</td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  >
                                            {{ $submission->total }}
                                        </td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  >

                                            @foreach ($units as $unit)
                                                @if ($unit->id == $item->unit_id)
                                                {{$unit->name}}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td class="p-4 py-4 text-center border-l w-96"  >{{ $item->name}}</td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  >{{ $item->purchase_price}}</td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  >


                                            @php
                                                $totalPrice = $totalPrice + $item->purchase_price * $submission->total;
                                            @endphp

                                            {{ $item->purchase_price * $submission->total }}
                                        </td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  >افغانی</td>
                                    </tr>
                                    @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    @endforeach
                                    <tr class="py-4">
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="p-4 py-4 text-center border-l h-60 w-96"  >
                                            {{$form->details}} <br> <br>
                                            با احترام

                                        </td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                    </tr>
                                    <tr class="py-4">
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="p-4 py-4 text-center border-l w-96"  >
                                        </td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border-l"  ></td>
                                    </tr>
                                    <tr class="py-4">
                                        <td class="w-10 p-4 py-4 text-center border"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border"  ></td>
                                        <td class="p-4 py-4 text-center border w-96"  ></td>
                                        <td class="w-10 p-4 py-4 text-center border"  >مجموعه</td>
                                        <td class="w-10 p-4 py-4 text-center border"  >{{$totalPrice}}</td>
                                        <td class="w-10 p-4 py-4 text-center border"  >افغانی</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- This section is comloated --}}
                        <div class="mt-4 text-xs print:text-xs dark:text-white">
                            ۱۴-امضای امر تحویلخانه................................................... ۱۵- امضا
                            گیرنده<br><br>

                            ۱۶- اندراج تمام اجناس درکارت های ثبت ذخیره درج گردیده است.<br>
                            امضای
                            ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
                            تاریخ ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ<br>
                        </div>
                        <div class="relative overflow-hidden dark:text-white">
                            <table class="w-full text-xs text-right table-auto print:text-xs">
                                <thead>
                                    <tr>
                                        <td class="p-4 py-1" >کاتب اندراج</td>
                                        <td class="p-4 py-1">طبع مدیریت عمومی نشرات</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="py-1">
                                        <td class="p-4 py-1">توزیع فورمه دریک اصل ودوکاپی ترتیب شود.</td>
                                        <td class="p-4 py-1">ب: کاپی الف درتحویلخانه حفظ گردد.</td>
                                    </tr>
                                    <tr class="py-1">
                                        <td class="p-4 py-1">الف: اصل به درخواست کننده داده شود.</td>
                                        <td class="p-4 py-1">ج: کاپی دوم به شعبه محاسبه جنسی ارسال گردد</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container flex justify-center gap-4 pt-6 mx-auto show-cta">
                        <button type="button" x-on:click="printDiv()"
                            class="flex items-center justify-center w-32 gap-3 py-2 text-xl text-white bg-green-500 rounded-md hover:bg-green-600">
                            <i data-feather="printer" class="w-5 h-5"></i>
                            پرنټ
                        </button>
                        <a href=""
                            class="flex items-center justify-center w-32 gap-3 py-2 text-xl text-black border border-gray-400 rounded-md dark:border-gray-500 hover:border-gray-600 dark:hover:border-gray-200 dark:text-white">
                            <i data-feather="download" class="w-5 h-5"></i>
                            ډونلوډ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

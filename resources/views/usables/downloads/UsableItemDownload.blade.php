<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Report</title>

        <style>
            body {
                font-family: DejaVu Sans, sans-serif !important;
                direction: rtl !important;
                text-align: right;
            }
        </style>
    </head>
    <body style="font-family: Arial">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                    <div class="px-6 text-dark dark:text-white show-page-heading">
                        <div class="sm:grid grid-cols-2 show-item-top-heading">
                            <div class="flex gap-5 justify-start items-center">
                                {{-- <img src="{{ URL::to('/') }}/logo/iea-logo.jpg" alt="RTA New Logo" class="img-responsive w-28 h-[6.2rem]" loading="lazy"> --}}
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
                                {{-- <img src="{{ URL::to('/') }}/logo/logo.png" alt="RTA New Logo" class="img-responsive w-24 sm:w-28 h-18" loading="lazy"> --}}
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

                    {{ $output }}
                </div>
            </div>
        </div>
    </body>
</html>

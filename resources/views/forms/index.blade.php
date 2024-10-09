<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 sm:text-xl dark:text-gray-200">
            {{ __('موجودې فورمې') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-4 mb-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-6 py-4 mx-auto space-y-4 text-gray-700 max-w-7xl sm:px-6 lg:px-8 dark:text-gray-100 sm:space-y-0">
                    <div>
                        <h1 class="mb-4 text-2xl text-gray-600 dark:text-gray-100">د ملی راډیوټلویزیون د  اجناسو فورمونه</h1>
                    </div>
                </div>
                <div class="grid gap-4 px-6 py-4 mx-auto text-gray-700 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 lg:grid-cols-4 dark:text-gray-100">
                    <div class="py-4 text-center bg-gray-100 rounded-md dark:bg-gray-600 sm:py-6">
                        <div class="flex items-center justify-center mb-3">
                            <h5 class="text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                                فورمه ف س ۱
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700 dark:text-gray-200">
                            واگذاری اجناس داغمه
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/forms/form7") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-100 rounded-lg dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">باز کردن</span></a>
                        </div>
                    </div>
                    <div class="py-4 text-center bg-gray-100 rounded-md dark:bg-gray-600 sm:py-6">
                        <div class="flex items-center justify-center mb-3">
                            <h5 class="text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                                فورمه ف س ۵
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700 dark:text-gray-200">
                            تکت توزیع تحویلخانه
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ route("form5s.index") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-100 rounded-lg dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">باز کردن</span></a>
                        </div>
                    </div>
                    <div class="py-4 text-center bg-gray-100 rounded-md dark:bg-gray-600 sm:py-6">
                        <div class="flex items-center justify-center mb-3">
                            <h5 class="text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                                فورمه ف س ۷
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700 dark:text-gray-200">
                            راپور رسیدات
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/forms/form7") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-100 rounded-lg dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">باز کردن</span></a>
                        </div>
                    </div>
                    <div class="py-4 text-center bg-gray-100 rounded-md dark:bg-gray-600 sm:py-6">
                        <div class="flex items-center justify-center mb-3">
                            <h5 class="text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                                فورمه ف س ۸
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700 dark:text-gray-200">
                            اعاده تحویلخانه
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/forms/form8") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-100 rounded-lg dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">باز کردن</span></a>
                        </div>
                    </div>
                    <div class="py-4 text-center bg-gray-100 rounded-md dark:bg-gray-600 sm:py-6">
                        <div class="flex items-center justify-center mb-3">
                            <h5 class="text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                                فورمه ف س ۹
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700 dark:text-gray-200">
                            درخواست تحویلخانه
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/forms/form9") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-100 rounded-lg dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">باز کردن</span></a>
                        </div>
                    </div>
                    <div class="py-4 text-center bg-gray-100 rounded-md dark:bg-gray-600 sm:py-6">
                        <div class="flex items-center justify-center mb-3">
                            <h5 class="text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                                فورمه ثبت اجناس
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700 dark:text-gray-200">
                            اجناس مصرفی در داخل اداره
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/forms/form7") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-100 rounded-lg dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-900"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">باز کردن</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

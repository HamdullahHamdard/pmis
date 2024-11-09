<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 sm:text-xl dark:text-gray-200">
            {{ __('گدام عمومی رادیو تلویزیون ملی افغانستان') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="grid gap-4 px-6 py-4 mx-auto text-gray-700 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 lg:grid-cols-4 dark:text-gray-100">
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalItems }}</h1>
                <p>قلم جنس ثبت شده</p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/items") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalItemsInRTA }}</h1>
                <p>مجموع تمام اجناس موجود در اداره</p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/items") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalAvailableItems }}</h1>
                <p>مجموع تمام اجناس موجود در گدام</p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/items") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalDistributedItems }}</h1>
                <p>مجموع تمام اجناس توضع شده</p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/submission") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalItemsInAfn }}</h1>
                <p class="font-medium text-md sm:text-lg">
                    مجموع اجناس خریده شده به افغانی
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/items") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            <div class="flex flex-col justify-center py-4 text-center bg-white rounded-md dark:bg-gray-800 sm:col-span-3">
                <h1 class="flex flex-col justify-center gap-2 mb-4 text-3xl font-semibold sm:text-5xl sm:block">
                    @php
                        $totalAfn = 0;

                    foreach ($totalItemsInAfnForValue as $singleItem => $item) {
                        $purchasePrice = (float) $item->purchase_price; // Typecast to float
                        $totalQuantity = (int) $item->total; // Typecast to integer

                        $totalAfn += $purchasePrice * $totalQuantity;
                    }

                    $totalAfnFormatted = number_format($totalAfn, 2, ".", ",");
                    @endphp

                    {{ $totalAfn }}
                <span class="text-xl text-gray-400 sm:text-2xl">افغانی</span></h1>
                <p class="text-sm font-medium sm:text-md">
                    مجموعه ارزش تمام اجناس خریده شده به افغانی
                </p>
            </div>
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">
                    {{ $totalItemsInUsd }}
                </h1>
                <p class="font-medium text-md sm:text-lg">
                    مجموع اجناس خریده شده به دالر امریکایی
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/items") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            <div class="flex flex-col justify-center py-4 text-center bg-white rounded-md dark:bg-gray-800 sm:col-span-3">
                <h1 class="flex flex-col justify-center gap-2 mb-4 text-3xl font-semibold sm:text-5xl sm:block">
                    @php
                        $totalUsd = 0;

                        foreach ($totalItemsInUsdForValue as $singleItem => $item) {
                            $totalUsd+= $item->purchase_price * $item->total;
                        }

                        $totalUsd = number_format($totalUsd,
                            2,
                            ".",
                            ","
                        );
                    @endphp

                    ${{ $totalUsd }}
                <span class="text-xl text-gray-400 sm:text-2xl">دالر امریکایی</span></h1>
                <p class="text-sm font-medium sm:text-md">
                    مجموعه ارزش تمام اجناس خریده شده به دالر امریکایی
                </p>
            </div>

            @if(auth()->user()->province_id == 13)
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalEmployees }}</h1>
                <p>
                    کارمند ثبت شده اداره
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("employees") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endif

            @can('view-employeeTypes')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalEmployeeTypes }}</h1>
                <p>
                    نوعیت کارمند اداره
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("employee/types") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-employeeShifts')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalEmployeeShifts }}</h1>
                <p>
                    شفت کار ثبت شده
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("employee/shifts") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-categories')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalCategories }}</h1>
                <p>
                    کتگوری اجناس
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/categories") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-currencies')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalCurrencies }}</h1>
                <p>
                    نوع واحد پولی
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/currency") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-units')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalUnits }}</h1>
                <p>
                    واحد ثبت شده
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/units") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-usableTypes')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalUsableItemsTypes }}</h1>
                <p>
                    نوعیت جنس مصرفی
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("stock/usables/types") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-years')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalYears }}</h1>
                <p>
                    سال های هجرس شمسی
                </p>
                <div class="flex justify-center">
                    <a href="{{ url("/settings/years") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan
        </div>
        <div class="grid gap-4 px-6 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2">
            <div class="w-full h-full px-6 py-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <canvas id="itemsChart"></canvas>
            </div>
            <div class="w-full h-full px-6 py-4 mt-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg sm:mt-0">
                <canvas id="empChart"></canvas>
            </div>
        </div>
    </div>
    <script type="module">
        const rtaBarChart = document.getElementById('itemsChart');
        const itemsChart = new Chart(rtaBarChart, {
            type: 'bar',
            data: {
                labels: ['آی تی', 'اداری', 'تخنیکی', 'نشراتی', 'دیجیتال میدیا', "مصرفی"],
                datasets: [{
                    label: 'چارت اجناس به اساس کتگوری',
                    data: [{{ $totalItItems }}, {{ $totalOfficeItems }}, {{ $totalTechnicalItems }}, {{ $totalBroadcastingItems }}, {{ $totalDigitalMediaItems }}, {{ $totalUsedItems }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(255, 159, 64, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const rtaLineChart = document.getElementById('empChart');
        const empChart = new Chart(rtaLineChart, {
            type: 'pie',
            data: {
                labels: ['آی تی', 'اداری', 'تخنیکی', 'نشراتی', 'دیجیتال میدیا', "مصرفی"],
                datasets: [{
                    label: 'چارت اجناس به اساس کتگوری',
                    data: [{{ $totalItItems }}, {{ $totalOfficeItems }}, {{ $totalTechnicalItems }}, {{ $totalBroadcastingItems }}, {{ $totalDigitalMediaItems }}, {{ $totalUsedItems }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>

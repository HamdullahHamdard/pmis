<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 sm:text-xl dark:text-gray-200">
            {{ __('تنظیمات') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="grid gap-4 px-6 py-4 mx-auto text-gray-700 max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 lg:grid-cols-3 dark:text-gray-100">

            @can('view-employees')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalEmployees }}</h1>
                <p>کارکونکي</p>
                <div class="flex justify-center">
                    <a href="{{ url("/employees") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-employeeTypes')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalEmployeeTypes }}</h1>
                <p>د کارکونکو نوعیت</p>
                <div class="flex justify-center">
                    <a href="{{ url("/employee/types") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-employeeShifts')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalEmployeeShifts }}</h1>
                <p>د کارکونکو د دندې وخت</p>
                <div class="flex justify-center">
                    <a href="{{ url("/employee/shifts") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-roles')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalRoles }}</h1>
                <p>صلاحیتونه</p>
                <div class="flex justify-center">
                    <a href="{{ url("/roles") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-users')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalUsers }}</h1>
                <p>د سیستم کارونکي</p>
                <div class="flex justify-center">
                    <a href="{{ url("/users") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-years')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalYears }}</h1>
                <p>اضافه شوی کلونه</p>
                <div class="flex justify-center">
                    <a href="{{ url("/settings/years") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-months')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalMonths }}</h1>
                <p>اضافه شوې میاشتې</p>
                <div class="flex justify-center">
                    <a href="{{ url("/settings/months") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan

            @can('view-days')
            <div class="py-4 text-center bg-white rounded-md dark:bg-gray-800">
                <h1 class="mb-4 text-4xl font-semibold">{{ $totalDays }}</h1>
                <p>اضافه شوې ورځې</p>
                <div class="flex justify-center">
                    <a href="{{ url("/settings/days") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-gray-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                </div>
            </div>
            @endcan
        </div>
        <div class="grid grid-cols-2 gap-4 px-6 py-4 mx-auto mb-4 max-w-7xl">
            <div class="px-6 py-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <canvas id="settingsBarChart"></canvas>
            </div>
            <div class="px-6 py-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <canvas id="settingsLineChart"></canvas>
            </div>
        </div>
    </div>
    <script type="module">
        // Settings Bar Chart
        const settingsChart1 = document.getElementById('settingsBarChart');
        const settingsBarChart = new Chart(settingsChart1, {
            type: 'bar',
            data: {
                labels: ['کارکونکي', 'د کارکونکو نوعیت', 'د کارکونکو شفټ', 'صلاحیتونه',  'د سیستم کارونکي', 'اضافه شوی کلونه'],
                datasets: [{
                    label: 'تعداد به اساس چارت',
                    data: [{{ $totalEmployees }}, {{ $totalEmployeeTypes }}, {{ $totalEmployeeShifts }}, {{ $totalRoles }}, {{ $totalUsers }}, {{ $totalYears }}],
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

        // Settings Line Chart
        const settingsChart2 = document.getElementById('settingsLineChart');
        const settingsLineChart = new Chart(settingsChart2, {
            type: 'line',
            data: {
                labels: ['کارکونکي', 'د کارکونکو نوعیت', 'د کارکونکو شفټ', 'صلاحیتونه',  'د سیستم کارونکي', 'اضافه شوی کلونه'],
                datasets: [{
                    label: 'تعداد به اساس چارت',
                    data: [{{ $totalEmployees }}, {{ $totalEmployeeTypes }}, {{ $totalEmployeeShifts }}, {{ $totalRoles }}, {{ $totalUsers }}, {{ $totalYears }}],
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
    </script>
    @if (auth()->check() && auth()->user()->hasRole('Admin'))
    <div class="flex justify-center space-x-4">
        <a href="{{ url('/get-backup') }}"
            class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-green-600">
            <i data-feather="archive" class="w-5"></i>
            <span class="mr-2">بیک اپ اخیستل</span>
        </a>
        <span style="margin-right: 5px"></span>
        <a href="{{ url('/download-backup') }}"
            class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-red-600 border border-red-600 rounded-lg hover:bg-green-600">
            <i data-feather="download" class="w-5"></i>
            <span class="mr-2">دانلود بیک اپ</span>
        </a>
        <span style="margin-right: 5px"></span>
        <a href="{{ url('/delete-backup') }}"
            class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-gray-700 border border-gray-600 rounded-lg hover:bg-green-600">
            <i data-feather="trash" class="w-5"></i>
            <span class="mr-2">ټول بیک اپ ډیلیټ</span>
        </a>
    </div>
@endif
</x-app-layout>

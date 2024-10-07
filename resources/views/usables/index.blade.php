<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 sm:text-xl dark:text-gray-200">
            {{ __('بخش مصرفی گدام رایو تلویزون ملی افعانستان') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-100 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-4 py-4 sm:px-6 sm:py-8">
                    <div class="text-2xl text-gray-900 dark:text-gray-100">
                        {{ __("محاسبه اجناس مصرفی" ) }}
                    </div>
                    <div class="">
                        <a href={{ route('usableSubmission') }} class="flex px-3 py-2 text-gray-100 bg-gray-800 border border-gray-700 rounded-md shadow hover:bg-gray-700 shadow-gray-800 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <span class="hidden mr-2 sm:block">درخواست اجناس مصرفی</span>
                        </a>
                    </div>
                </div>

                <div class="grid gap-4 px-4 pb-8 text-gray-700 sm:grid-cols-2 lg:grid-cols-3 dark:text-gray-100 sm:px-6">
                    <div class="py-8 text-center bg-white rounded-md dark:bg-gray-700">
                        <h1 class="mb-4 text-4xl font-semibold">{{ $totalStationaryItems }}</h1>
                        <p>قلم جنس قرطاسیه موجود</p>
                    </div>

                    <div class="py-8 text-center bg-white rounded-md dark:bg-gray-700">
                        <h1 class="mb-4 text-4xl font-semibold">{{ $totalStationary }}</h1>
                        <p>مجموع اجناس قرطاسیه</p>
                    </div>

                    <div class="py-8 text-center bg-white rounded-md dark:bg-gray-700">
                        <h1 class="mb-4 text-4xl font-semibold">{{ $totalFood }}</h1>
                        <p>قلم جنس خوراکه موجود</p>
                    </div>

                    <div class="py-8 text-center bg-white rounded-md dark:bg-gray-700">
                        <h1 class="mb-4 text-4xl font-semibold">{{ $totalOil }}</h1>
                        <p>قلم جنس روغنیات موجود</p>
                    </div>

                    <div class="py-8 text-center bg-white rounded-md dark:bg-gray-700">
                        <h1 class="flex items-center justify-center gap-2 mb-4 text-3xl font-semibold sm:text-4xl sm:block"> {{ $totalUsableValue }} <span class="text-xl text-gray-400 sm:text-2xl">افغانی</span></h1>
                        <p>مجموع ازش اجناس مصرفی</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="pb-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="justify-between gap-10 px-4 py-4 space-y-4 sm:grid sm:grid-cols-6 sm:px-6 sm:py-8 sm:space-y-0">
                    <div class="col-span-2 text-2xl text-gray-900 dark:text-gray-100">
                        {{ __("اجناس مصرفی ثبت شده") }}
                    </div>
                    <div class="col-span-2">
                        <form action="{{ route('usables', request()->query()) }}">
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">لټون</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>

                                <input type="text" name="q" class="block w-full p-4 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="جستجو" value="{{ $searchParam }}" required>

                                <button type="submit" class="text-white absolute left-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">لټون</button>
                            </div>
                        </form>
                    </div>
                    <div class="flex justify-end col-span-2">
                        @can('create-usables')
                            <a data-popover-target="create-popover" href={{ url('stock/usables/create') }} type="button" class="flex items-center px-3 py-3 text-center text-gray-100 bg-green-600 rounded-md hover:bg-green-700 sm:px-4 sm:py-2">
                                <i data-feather="plus"></i>
                            </a>
                            <div data-popover id="create-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm w-28">
                                <div class="px-3 py-2">
                                    <p>جنس جدید</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="relative p-6 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                @if(auth()->user()->province_id == 13)
                                    <th scope="col" class="px-6 py-3">
                                        ولایت
                                    </th>
                                @endif

                                <th scope="col" class="px-6 py-3">
                                    <x-usable-column-header column-name="name" >
                                        جنس
                                    </x-usable-column-header>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <x-usable-column-header column-name="type" >
                                        نوعیت
                                    </x-usable-column-header>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <x-usable-column-header column-name="total" >
                                        تعداد ثبت شده
                                    </x-usable-column-header>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <x-usable-column-header column-name="total" >
                                        تعداد موجود در گدام
                                    </x-usable-column-header>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    تاریخ خرید
                                </th>

                                <th scope="col" class="float-left px-6 py-3">
                                    <x-usable-column-header column-name="action" >
                                        اقدام
                                    </x-usable-column-header>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usables as $usable)
                                @if(auth()->user()->province_id == $usable->province_id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                    @if(auth()->user()->province_id == 13)
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            @foreach ($provinces as $province)
                                                @php
                                                    $showProvince = "";
                                                    if($usable->province_id == $province->id) {
                                                        $showProvince = $province->name;
                                                    }

                                                @endphp
                                                    {{ $showProvince}}
                                            @endforeach
                                        </th>
                                    @endif
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $usable->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($usableTypes as $type)
                                            @php
                                                $showUsableType = "";
                                                if($usable->usable_type_id == $type->id) {
                                                    $showUsableType = $type->name;
                                                }

                                            @endphp
                                                {{ $showUsableType}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $usableTotal = number_format($usable->total, 0, " ", ",");
                                        @endphp
                                        {{ $usableTotal}}

                                        @foreach ($units as $unit)
                                            @php
                                                $showUsableUnit = "";
                                                if($usable->unit_id == $unit->id) {
                                                    $showUsableUnit = $unit->name;
                                                }

                                            @endphp
                                                {{ $showUsableUnit}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $usableTotal = number_format($usable->total, 0, " ", ",");
                                        @endphp
                                        {{ $usableTotal}}

                                        @foreach ($units as $unit)
                                            @php
                                                $showUsableUnit = "";
                                                if($usable->unit_id == $unit->id) {
                                                    $showUsableUnit = $unit->name;
                                                }

                                            @endphp
                                                {{ $showUsableUnit}}
                                        @endforeach
                                    </th>
                                    <td scope="col" class="px-6 py-3" dir="rtl">
                                        @foreach ($days as $day)
                                            @php
                                                $showItemDay = "";
                                                if($usable->purchaseDay_id == $day->id) {
                                                    $showItemDay = $day->name;
                                                }

                                            @endphp
                                                {{ $showItemDay}}
                                        @endforeach
                                        /
                                        @foreach ($months as $month)
                                            @php
                                                $showItemMonth = "";
                                                if($usable->purchaseMonth_id == $month->id) {
                                                    $showItemMonth = $month->name;
                                                }

                                            @endphp
                                                {{ $showItemMonth}}
                                        @endforeach
                                        /
                                        @foreach ($years as $year)
                                            @php
                                                $showItemYear = "";
                                                if($usable->purchaseYear_id == $year->id) {
                                                    $showItemYear = $year->name;
                                                }

                                            @endphp
                                                {{ $showItemYear}}
                                        @endforeach
                                    </td>
                                    <td class="flex justify-end py-4">
                                        @can('view-usables')
                                            <a data-popover-target="view-popover" href="{{ url('stock/usables/show/'.$usable->id) }}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-green-500 rounded-md hover:bg-green-600">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <div data-popover id="view-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm">
                                                <div class="px-3 py-2">
                                                    <p>مشاهده جنس</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan
                                        @can('edit-usables')
                                            <a data-popover-target="edit-popover" href="{{ url('stock/usables/edit/'.$usable->id) }}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>تغیر دادن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan

                                        @can('delete-usables')
                                            <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/usables/delete/'.$usable->id) }}" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <div data-popover id="delete-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>از بین بردن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                                @elseif(auth()->user()->province_id == 13)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($provinces as $province)
                                            @php
                                                $showProvince = "";
                                                if($usable->province_id == $province->id) {
                                                    $showProvince = $province->name;
                                                }

                                            @endphp
                                                {{ $showProvince}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $usable->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($usableTypes as $type)
                                            @php
                                                $showUsableType = "";
                                                if($usable->usable_type_id == $type->id) {
                                                    $showUsableType = $type->name;
                                                }

                                            @endphp
                                                {{ $showUsableType}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $usableTotal = number_format($usable->total, 0, " ", ",");
                                        @endphp
                                        {{ $usableTotal}}

                                        @foreach ($units as $unit)
                                            @php
                                                $showUsableUnit = "";
                                                if($usable->unit_id == $unit->id) {
                                                    $showUsableUnit = $unit->name;
                                                }

                                            @endphp
                                                {{ $showUsableUnit}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $usableTotal = number_format($usable->total, 0, " ", ",");
                                        @endphp
                                        {{ $usableTotal}}

                                        @foreach ($units as $unit)
                                            @php
                                                $showUsableUnit = "";
                                                if($usable->unit_id == $unit->id) {
                                                    $showUsableUnit = $unit->name;
                                                }

                                            @endphp
                                                {{ $showUsableUnit}}
                                        @endforeach
                                    </th>
                                    <td scope="col" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white" dir="rtl">
                                        @foreach ($days as $day)
                                            @php
                                                $showUsableDay = "";
                                                if($usable->purchaseDay_id == $day->id) {
                                                    $showUsableDay = $day->name;
                                                }

                                            @endphp
                                                {{ $showUsableDay}}
                                        @endforeach
                                        /
                                        @foreach ($months as $month)
                                            @php
                                                $showUsableMonth = "";
                                                if($usable->purchaseMonth_id == $month->id) {
                                                    $showUsableMonth = $month->name;
                                                }

                                            @endphp
                                                {{ $showUsableMonth}}
                                        @endforeach
                                        /
                                        @foreach ($years as $year)
                                            @php
                                                $showUsableYear = "";
                                                if($usable->purchaseYear_id == $year->id) {
                                                    $showUsableYear = $year->name;
                                                }

                                            @endphp
                                                {{ $showUsableYear}}
                                        @endforeach
                                    </td>
                                    <td class="flex justify-end py-4">
                                        @can('view-usables')
                                            <a data-popover-target="view-popover" href="{{ url('stock/usables/show/'.$usable->id) }}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-green-500 rounded-md hover:bg-green-600">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <div data-popover id="view-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm">
                                                <div class="px-3 py-2">
                                                    <p>مشاهده جنس</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan
                                        @can('edit-usables')
                                            <a data-popover-target="edit-popover" href="{{ url('stock/usables/edit/'.$usable->id) }}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>تغیر دادن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan

                                        @can('delete-usables')
                                            <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/usables/delete/'.$usable->id) }}" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <div data-popover id="delete-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>از بین بردن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex mt-4">
                        {{ $usables->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
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
                labels: ['قرطاسیه', 'خوراکه', 'روغنیات'],
                datasets: [{
                    label: 'تعداد به اساس نوعیت جنس',
                    data: [{{ $totalStationaryTypeItems }}, {{ $totalFoodTypeItems }}, {{ $totalOilTypeItems }}],
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
                labels: ['قرطاسیه', 'خوراکه', 'روغنیات'],
                datasets: [{
                    label: 'تعداد اجناس موجود',
                    data: [{{ $totalStationary }}, {{ $totalFood }}, {{ $totalOil }}],
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
</x-app-layout>

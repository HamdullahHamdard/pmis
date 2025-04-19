<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex w-48 text-gray-600 text-md sm:text-lg dark:text-gray-300">
                <script>
                    function displayCurrentTime() {
                        var myTime = new Date();
                        var ampm = myTime.getHours( ) >= 12 ? '  بعد از ظهر' : ' قبل از ظهر';

                        var currTime = myTime.getHours( ) + ":" +  myTime.getMinutes() + ":" +  myTime.getSeconds() + ampm;
                        document.getElementById('currentTime').innerHTML = currTime;
                        display_c5();
                    }

                    function display_c5(){
                        var refresh = 1000;
                        mytime = setTimeout('displayCurrentTime()', refresh)
                    }

                    display_c5()
                </script>
                <span class="ml-2 text-xl"><i data-feather="clock" class="w-5"></i></span>
                <span id="currentTime"></span>
            </div>

            <div class="hidden px-6 mb-4 overflow-x-auto bg-white dark:bg-gray-800 sm:block sm:rounded-lg w-96">
                <form>
                    <div class="relative">
                        <div class="absolute right-0 flex items-center pt-3 pr-4">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>

                        <input type="search" id="search" class="block w-full px-4 py-2.5 pr-12 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="لټون" required>
                    </div>
                </form>
            </div>

            <div class="flex text-gray-600 text-md sm:text-lg justify-left items-left w-44 dark:text-gray-300">
                <span class="ml-2 text-xl"><i data-feather="calendar" class="w-5"></i></span>
                <div dir="ltr">
                    {{ now()->format('d M, Y') }} <br>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-4 mb-4 overflow-x-auto bg-white sm:hidden dark:bg-gray-800 sm:rounded-lg">
                <form>
                    <div class="relative">
                        <div class="absolute inset-x-0 right-0 flex items-center pt-3 pr-4 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>

                        <input type="search" id="search" class="block w-full px-4 py-2.5 pr-12 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="لټون" required>
                    </div>
                </form>
            </div>

            @permission('view-dashboardCalcs')
            <div class="px-6 py-4 mb-4 overflow-x-auto bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-6 py-4 mx-auto space-y-4 text-gray-700 max-w-7xl sm:px-6 lg:px-8 dark:text-gray-100 sm:space-y-0">
                    <div>
                        <h1 class="text-2xl text-gray-600 dark:text-gray-100">خُلاصه گدام</h1>
                        <h2 class="text-gray-400 text-md dark:text-gray-300">رادیو تلویزیون ملی افغانستان</h2>
                    </div>
                    <div class="">
                        <a href={{ route('submission') }} class="flex px-3 py-2 text-gray-100 bg-gray-800 border border-gray-700 rounded-md shadow hover:bg-gray-700 shadow-gray-800 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 14 14" height="22" width="22" class="ml-2"><g id="screen-curve--screen-curved-device-electronics-monitor-diplay-computer"><path id="Intersect" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M1.022357142857143 8.069285714285714c0.07057142857142858 0.4735714285714286 0.48100000000000004 0.8264285714285715 0.9582857142857143 0.8115714285714286C3.4450000000000003 8.837214285714285 4.937214285714286 8.78057142857143 6.5 8.78057142857143c1.5572142857142859 0 3.0494285714285714 0.03528571428571429 4.5045 0.09007142857142858 0.4837857142857143 0.018571428571428572 0.9035 -0.33614285714285713 0.9750000000000001 -0.8152857142857143 0.14950000000000002 -1.0010000000000001 0.32407142857142857 -2.042857142857143 0.32407142857142857 -3.1144285714285718 0 -1.0678571428571428 -0.1727142857142857 -2.107857142857143 -0.3222142857142857 -3.105142857142857a0.9610714285714286 0.9610714285714286 0 0 0 -0.9870714285714286 -0.8171428571428572c-1.4392857142857143 0.06035714285714286 -2.9445 0.08171428571428571 -4.494285714285715 0.08171428571428571 -1.5562857142857143 0 -3.0615 -0.04271428571428571 -4.509142857142857 -0.09285714285714286A0.9517857142857142 0.9517857142857142 0 0 0 1.0214285714285716 1.82C0.871 2.823785714285714 0.6964285714285714 3.8675 0.6964285714285714 4.940928571428572c0 1.0762142857142858 0.17642857142857143 2.123642857142857 0.3259285714285714 3.1292857142857144Z" stroke-width="1"></path><path id="Vector 8" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M4.186 11.619214285714285h4.628" stroke-width="1"></path><path id="Vector 9" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m6.5 8.783357142857144 0 2.835857142857143" stroke-width="1"></path></g></svg> <span class="hidden sm:block">تسلیم کردن جنس</span>
                        </a>
                    </div>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 px-6 grid {{ auth()->user()->province_id === 13 ? 'sm:grid-cols-2 lg:grid-cols-4' : 'sm:grid-cols-2' }} gap-4 text-gray-700 dark:text-gray-100">
                    <div class="py-4 text-center bg-red-200 rounded-md sm:py-6">
                        <div class="flex items-center justify-center mb-2">
                            <h5 class="text-4xl font-bold tracking-tight text-gray-900">
                                {{ $totalItems }}
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700">
                            @php
                                $showItemTitleText = "";
                                if ($totalItems > 0) {
                                    $showItemTitleText = "قلم جنس ثبت شده در سیستم";
                                } else {
                                    $showItemTitleText = "کدام جنس ثبت نشده است";
                                }
                            @endphp

                            {{ $showItemTitleText }}
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/stock/items") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-red-500 rounded-lg hover:bg-red-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                        </div>
                    </div>

                    <div class="py-4 text-center bg-purple-200 rounded-md sm:py-6">
                        <div class="flex items-center justify-center mb-2">
                            <h5 class="text-4xl font-bold tracking-tight text-gray-900">
                                {{ $totalEmployees }}
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700">
                            @php
                                $showEmpTitleText = "";
                                if ($totalEmployees === 1) {
                                    $showEmpTitleText = "کارمند ثبت شده";
                                } elseif ($totalEmployees > 1) {
                                    $showEmpTitleText = "کارمند ثبت شده";
                                } else {
                                    $showEmpTitleText = "کدام کارمند ثبت نشده است";
                                }
                            @endphp

                            {{ $showEmpTitleText }}
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/employees") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-purple-500 rounded-lg hover:bg-purple-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                        </div>
                    </div>

                    @permission('view-users')
                    <div class="py-4 text-center bg-green-200 rounded-md sm:py-6">
                        <div class="flex items-center justify-center mb-2">
                            <h5 class="text-4xl font-bold tracking-tight text-gray-900">
                                {{ $totalUsers }}
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700">
                            @php
                                $showUserTitleText = "";
                                if ($totalUsers === 1) {
                                    $showUserTitleText = "استفاده کننده سیستم";
                                } elseif ($totalUsers > 1) {
                                    $showUserTitleText = "استفاده کننده سیستم";
                                } else {
                                    $showUserTitleText = "استفاده کننده سیستم موجود نیست";
                                }
                            @endphp

                            {{ $showUserTitleText }}
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/users") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-green-500 rounded-lg hover:bg-green-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                        </div>
                    </div>
                    @endpermission

                    @permission("view-roles")
                    <div class="py-4 text-center bg-yellow-200 rounded-md sm:py-6">
                        <div class="flex items-center justify-center mb-2">
                            <h5 class="text-4xl font-bold tracking-tight text-gray-900">
                                {{ $totalRoles }}
                            </h5>
                        </div>
                        <p class="mb-3 text-lg font-normal text-gray-700">نوع
                            @php
                                $showRoleText = "";
                                if($totalRoles > 1) {
                                    $showRoleText = "صلاحیت";
                                } else {
                                    $showRoleText = "صلاحیت";
                                }
                            @endphp
                            {{ $showRoleText }}
                            استفاده از سیستم
                        </p>
                        <div class="flex justify-center">
                            <a href="{{ url("/roles") }}" class="flex items-center justify-center w-48 py-2 mt-4 text-lg text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600"><i data-feather="external-link" class="w-5"></i> <span class="mr-2">نمایش</span></a>
                        </div>
                    </div>
                    @endpermission
                </div>
            </div>
            @endpermission


            <div class="grid gap-4 sm:grid-cols-2">
                <div class="w-full h-full px-6 py-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <canvas id="itemsChart"></canvas>
                </div>
                <div class="w-full h-full px-6 py-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <canvas id="empChart"></canvas>
                </div>
                <div class="px-6 py-4 overflow-hidden bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <canvas id="categoryChart"></canvas>
                </div>
                <div class="px-6 pt-8 pb-6 overflow-x-auto bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="mb-3">
                        <h1 class="text-2xl text-gray-600 dark:text-gray-100">اجناس ثبت شده جدید</h1>
                    </div>
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    جنس
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    تعداد
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    کتگوری
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    اقدام
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                @if(auth()->user()->province_id == $item->province_id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->total }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($categories as $category)
                                            @php
                                                $showItemCategory = "";
                                                if($item->category_id == $category->id) {
                                                    $showItemCategory = $category->name;
                                                }

                                            @endphp
                                                {{ $showItemCategory}}
                                        @endforeach
                                    </th>
                                    <td class="flex justify-end py-4">
                                        @permission('view-items')
                                            <a data-popover-target="view-popover" href="{{ url('stock/items/show/'.$item->id) }}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-green-500 rounded-md hover:bg-green-600">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <div data-popover id="view-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm">
                                                <div class="px-3 py-2">
                                                    <p>مشاهده جنس</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endpermission
                                        @permission('edit-items')
                                            <a data-popover-target="edit-popover" href="{{ url('stock/items/edit/'.$item->id) }}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>تغیر دادن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endpermission

                                        @permission('delete-items')
                                            <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/items/delete/'.$item->id) }}" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <div data-popover id="delete-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>از بین بردن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endpermission
                                    </td>
                                </tr>
                                @elseif(auth()->user()->province_id == 13)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->total }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($categories as $category)
                                            @php
                                                $showItemCategory = "";
                                                if($item->category_id == $category->id) {
                                                    $showItemCategory = $category->name;
                                                }

                                            @endphp
                                                {{ $showItemCategory}}
                                        @endforeach
                                    </th>
                                    <td class="flex justify-end py-4">
                                        @permission('view-items')
                                            <a data-popover-target="view-popover" href="{{ url('stock/items/show/'.$item->id) }}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-green-500 rounded-md hover:bg-green-600">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <div data-popover id="view-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm">
                                                <div class="px-3 py-2">
                                                    <p>مشاهده جنس</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endpermission
                                        @permission('edit-items')
                                            <a data-popover-target="edit-popover" href="{{ url('stock/items/edit/'.$item->id) }}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>تغیر دادن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endpermission

                                        @permission('delete-items')
                                            <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/items/delete/'.$item->id) }}" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <div data-popover id="delete-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm w-28">
                                                <div class="px-3 py-2">
                                                    <p>از بین بردن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endpermission
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Activity Log --}}
            @if(auth()->user()->province_id == 13)
            <div class="w-full mt-4">
                <div class="px-6 pt-8 pb-6 overflow-x-auto bg-white rounded-md shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="mb-3">
                        <h1 class="text-2xl text-gray-600 dark:text-gray-100">گزارش فعالیت در سیستم</h1>
                    </div>
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    نوعیت
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    بخش فعالیت
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    معلومات
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    فعالیت کننده
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ولایت
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    تاریخ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allActivities as $activity)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @if($activity->event === 'created')
                                            <span class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-green-600 rounded-md w-9 h-9 hover:bg-green-700">
                                                <i data-feather="plus"></i>
                                            </span>
                                        @elseif ($activity->event === 'updated')
                                            <span class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-blue-500 rounded-md w-9 h-9 hover:bg-blue-600">
                                                <i data-feather="edit"></i>
                                            </span>
                                        @elseif ($activity->event === 'deleted')
                                            <span class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-red-500 rounded-md w-9 h-9 hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </span>
                                        @endif
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $activity->log_name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-right text-gray-900 whitespace-nowrap dark:text-white" dir="rtl">
                                        آی ډی نمبر: {{ $activity->subject_id }}
                                        -
                                        {{ $activity->description }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($users as $user)
                                            @php
                                                $showLogUser = "";
                                                if($user->id === $activity->causer_id) {
                                                    $showLogUser = $user->name;
                                                }
                                            @endphp
                                                {{ $showLogUser}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($provinces as $province)
                                            @foreach ($users as $user)
                                                @php
                                                    $showUserProvince = "";
                                                    if($activity->causer_id === $user->id) {
                                                        if($user->province_id === $province->id) {
                                                            $showUserProvince = $province->name;
                                                        }
                                                    }

                                                @endphp
                                                {{ $showUserProvince }}
                                            @endforeach
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white" dir="ltr">
                                        <div class="flex items-center justify-start gap-3">
                                            <span class="flex items-center justify-start gap-1">
                                                <i data-feather="calendar" class="w-3.5 h-3.5"></i>
                                                {{ $activity->created_at->format('d M, Y') }}
                                            </span>
                                            -
                                            <span class="flex items-center justify-start gap-1">
                                                <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                                {{ $activity->created_at->format('g:i A') }}
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex mt-4">
                        {{ $allActivities->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
            @endif
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
            type: 'line',
            data: {
                labels: ['کمپیوتر', 'میز و چوکی', 'کمره', 'قرطاسیه', 'ایر کانیشن', 'یخچال'],
                datasets: [{
                    label: 'چارت اجناس تسلیم شده',
                    data: [12, 19, 3, 5, 2, 3],
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

        const rtaPieChart = document.getElementById('categoryChart');
        const categoryChart = new Chart(rtaPieChart, {
            type: 'pie',
            data: {
                labels: ['آی تی', 'اداری', 'تخنیکی', 'نشراتی', 'دیجیتال میدیا', "مصرفی"],
                datasets: [{
                    label: 'چارت اجناس تسلیم شده',
                    data: [{{ $totalItItems }}, {{ $totalOfficeItems }}, {{ $totalTechnicalItems }}, {{ $totalBroadcastingItems }}, {{ $totalDigitalMediaItems }}, {{ $totalUsedItems }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(72, 202, 228, 0.4)',
                        'rgba(58, 12, 163, 0.4)',
                        'rgba(255, 201, 185, 0.4)',
                        'rgba(66, 193, 35, 0.4)',
                        'rgba(224, 120, 0, 0.4)',
                        'rgba(216, 49, 91, 0.4)',
                        'rgba(125, 133, 151, 0.4)',
                        'rgba(188, 138, 95, 0.4)',
                        'rgba(4, 102, 200, 0.4)',
                        'rgba(255, 215, 0, 0.4)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(72, 202, 228, 1)',
                        'rgba(58, 12, 163, 1)',
                        'rgba(255, 201, 185, 1)',
                        'rgba(66, 193, 35, 1)',
                        'rgba(224, 120, 0, 1)',
                        'rgba(216, 49, 91, 1)',
                        'rgba(125, 133, 151, 1)',
                        'rgba(188, 138, 95, 1)',
                        'rgba(4, 102, 200, 1)',
                        'rgba(255, 215, 0, 1)',
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


<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('مدیریت تسلیمی اجناس مصرفی') }}
            </h2>

            <a href={{ route('usables') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="justify-between gap-10 px-4 py-4 sm:grid sm:grid-cols-6 sm:px-6 sm:py-8">
                    <div class="col-span-2 text-2xl text-gray-900 dark:text-gray-100">
                        {{ __("ټولې تسلیمانې") }}
                    </div>

                    <div class="col-span-2">
                        <form>
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">لټون</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>

                                <input type="search" id="default-search" class="block w-full p-4 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="جستجو" required>

                                <button type="submit" class="text-white absolute left-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">لټون</button>
                            </div>
                        </form>
                    </div>

                    <div class="flex justify-end col-span-2">
                        @can('create-usableSubmission')
                            @if ($usableItems->count() > 0)
                                <a data-popover-target="create-popover" href={{url('stock/usable/submission/create')}} type="button" class="flex items-center justify-center px-4 py-2 text-center text-gray-100 bg-green-600 rounded-md hover:bg-green-700">
                                    <i data-feather="plus"></i>
                                </a>
                                <div data-popover id="create-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm">
                                    <div class="px-3 py-2">
                                        <p>تسلیمی جدید</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            @endif
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
                                    آی ډی
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    ریاست / آمریت
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    اخیستل شوی جنس
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    مقدار
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    نوعیت
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    تاریخ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    کړنې
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usableSubmissions as $submission)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                @if(auth()->user()->province_id == 13)
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            @foreach ($provinces as $province)
                                                @php
                                                    $showProvince = "";
                                                    if($submission->province_id == $province->id) {
                                                        $showProvince = $province->name;
                                                    }

                                                @endphp
                                                    {{ $showProvince}}
                                            @endforeach
                                        </th>
                                    @endif
                                <td class="px-6 py-4 text-lg font-medium">
                                    {{ $submission->id }}
                                </td>
                                <th scope="row" class="px-6 py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach ($departments as $department)
                                        @php
                                            $showDepName = "";
                                            if($submission->department_id == $department->id) {
                                                $showDepName = $department->name;
                                            }

                                        @endphp
                                            {{ $showDepName}}
                                    @endforeach
                                </th>

                                <td class="px-6 py-4 font-medium text-center">
                                    @foreach ($usableItems as $item)
                                        @php
                                            $showItemName = "";
                                            if($submission->item_id == $item->id) {
                                                $showItemName = $item->name;
                                            }

                                        @endphp
                                            {{ $showItemName}}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 font-medium text-center">
                                    {{ $submission->total }}
                                </td>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach ($usableTypes as $type)
                                        @php
                                            $showUsableType = "";
                                            if($submission->usable_type_id == $type->id) {
                                                $showUsableType = $type->name;
                                            }

                                        @endphp
                                            {{ $showUsableType}}
                                    @endforeach
                                </th>
                                <td class="px-6 py-4 font-medium text-center">
                                    {{ $submission->created_at->format('M d, Y');}}
                                </td>
                                <td class="flex justify-end py-4">
                                    @can('edit-usableSubmission')
                                        <a data-popover-target="edit-popover" href="{{ url('stock/usable/submission/edit/'.$submission->id) }}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm w-28">
                                            <div class="px-3 py-2">
                                                <p>تغیر دادن</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    @endcan
                                    @can('delete-usableSubmission')
                                        <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/usable/submission/delete/'.$submission->id) }}" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-600">
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
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4">
                        {!! $usableSubmissions->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

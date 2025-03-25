<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ثبت شوی اجناس د ملی راډیوټلویزیون په گدام کې') }}
            </h2>

            <a href={{ route('stock') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="sm:grid sm:grid-cols-6 justify-between px-4 sm:px-6 py-4 sm:py-8 gap-10 space-y-4 sm:space-y-0">
                    <div class="text-gray-900 dark:text-gray-100 text-2xl col-span-2">
                        {{ __("اجناس ثبت شده") }}
                    </div>
                    <div class="col-span-2">
                        <form action="{{ route('items', request()->query()) }}">
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
                    <div class="col-span-2 flex justify-end">
                        @can('create-items')
                            <a data-popover-target="create-popover" href={{ url('stock/items/create') }} type="button" class="text-gray-100 bg-green-600 hover:bg-green-700 px-4 py-3 rounded-md text-center flex items-center">
                                <i data-feather="plus"></i>
                            </a>
                            <div data-popover id="create-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm text-center">
                                <div class="px-3 py-2">
                                    <p>جنس جدید</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
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
                                <th scope="col" class="px-6 py-3">
                                    جنس
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    تعداد
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    تعداد موجود در گدام
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    کتگوری
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    سال خرید
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    نمبر جنس در گدام
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    اقدام
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!$items)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                    جنس موجود نیست
                                </tr>
                            @endif

                            @foreach($items as $item)
                                @if(auth()->user()->province_id == $item->province_id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">

                                    @if(auth()->user()->province_id == 13)
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            @foreach ($provinces as $province)
                                                @php
                                                    $showProvince = "";
                                                    if($item->province_id == $province->id) {
                                                        $showProvince = $province->name;
                                                    }

                                                @endphp
                                                    {{ $showProvince}}
                                            @endforeach
                                        </th>
                                    @endif
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $totalItems = number_format($item->total, 0, " ", ",");
                                        @endphp
                                        {{ $totalItems }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($totalSubmissions > 0)
                                            @foreach ($submissions as $submission)
                                                @php
                                                    $showItemInStock = 0;
                                                    $itemDistributed = $submission::where("item_id", $item->id)->where("is_returned", false)->sum("total");
                                                    $showItemInStock = $item->total - $itemDistributed;
                                                @endphp
                                            @endforeach
                                            {{ $showItemInStock }}
                                        @else
                                        {{ $item->total }}
                                        @endif

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
                                    <td class="px-6 py-4 text-lg font-medium">
                                        @foreach ($years as $year)
                                            @php
                                                $showItemYear = "";
                                                if($item->purchaseYear_id == $year->id) {
                                                    $showItemYear = $year->name;
                                                }

                                            @endphp
                                                {{ $showItemYear}}
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 text-lg font-medium">
                                        {{ $item->item_stock_number }}
                                    </td>
                                    <td class="py-4 flex justify-end">
                                        @can('view-items')
                                            <a data-popover-target="view-popover" href="{{ url('stock/items/show/'.$item->id) }}" class="font-medium text-gray-200 bg-green-500  flex items-center justify-center rounded-md p-2 text-center hover:bg-green-600">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <div data-popover id="view-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm text-center">
                                                <div class="px-3 py-2">
                                                    <p>مشاهده جنس</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan
                                        @can('edit-items')
                                            <a data-popover-target="edit-popover" href="{{ url('stock/items/edit/'.$item->id) }}" class="font-medium text-gray-200 bg-blue-600  flex items-center justify-center rounded-md p-2 text-center mr-2 hover:bg-blue-700">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm text-center">
                                                <div class="px-3 py-2">
                                                    <p>تغیر دادن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan

                                        @can('delete-items')
                                            <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/items/delete/'.$item->id) }}" class="text-gray-200 bg-red-500 p-2 flex items-center justify-center rounded-md text-center mr-2 hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <div data-popover id="delete-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-center text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm">
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
                                                if($item->province_id == $province->id) {
                                                    $showProvince = $province->name;
                                                }

                                            @endphp
                                                {{ $showProvince}}
                                        @endforeach
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @php
                                            $totalItems = number_format($item->total, 0, " ", ",");
                                        @endphp
                                        {{ $totalItems }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($totalSubmissions > 0)
                                            @foreach ($submissions as $submission)
                                                @php
                                                    $showItemInStock = 0;
                                                    $itemDistributed = $submission::where("item_id", $item->id)->where("is_returned", false)->sum("total");
                                                    $showItemInStock = $item->total - $itemDistributed;
                                                @endphp
                                            @endforeach
                                            {{ $showItemInStock }}
                                        @else
                                        {{ $item->total }}
                                        @endif

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
                                    <td class="px-6 py-4 text-lg font-medium">
                                        @foreach ($years as $year)
                                            @php
                                                $showItemYear = "";
                                                if($item->purchaseYear_id == $year->id) {
                                                    $showItemYear = $year->name;
                                                }

                                            @endphp
                                                {{ $showItemYear}}
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 text-lg font-medium">
                                        {{ $item->item_stock_number }}
                                    </td>
                                    <td class="py-4 flex justify-end">
                                        @can('view-items')
                                            <a data-popover-target="view-popover" href="{{ url('stock/items/show/'.$item->id) }}" class="font-medium text-gray-200 bg-green-500  flex items-center justify-center rounded-md p-2 text-center hover:bg-green-600">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <div data-popover id="view-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm text-center">
                                                <div class="px-3 py-2">
                                                    <p>مشاهده جنس</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan
                                        @can('edit-items')
                                            <a data-popover-target="edit-popover" href="{{ url('stock/items/edit/'.$item->id) }}" class="font-medium text-gray-200 bg-blue-600  flex items-center justify-center rounded-md p-2 text-center mr-2 hover:bg-blue-700">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm text-center">
                                                <div class="px-3 py-2">
                                                    <p>تغیر دادن</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        @endcan

                                        @can('delete-items')
                                            <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('stock/items/delete/'.$item->id) }}" class="text-gray-200 bg-red-500 p-2 flex items-center justify-center rounded-md text-center mr-2 hover:bg-red-600">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <div data-popover id="delete-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-center text-white transition-opacity duration-300 bg-red-600 rounded-lg shadow-sm">
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
                        {{  $items->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

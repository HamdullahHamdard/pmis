<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('فورم ۷ - راپور رسیدات') }}
            </h2>

            <a href={{ route('forms') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4 px-6 mb-4">
                <div class="flex justify-between px-4 sm:px-6 py-4 sm:py-8">
                    <div class="text-gray-900 dark:text-gray-100 text-2xl">
                        {{ __("فورم های ثبت شده") }}
                    </div>
                    {{-- @can('create-forms') --}}
                        <a href={{ url('/forms/form7/create') }} type="button" class="text-gray-100 bg-green-600 hover:bg-green-700 p-3 rounded-md text-center">
                            <i data-feather="plus"></i>
                        </a>
                    {{-- @endcan --}}
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg p-6">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    شماره
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    اسم فورم
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    تاریخ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    اقدام
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($items as $item) --}}
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{-- {{ $item->total }} --}}
                                </th>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{-- @foreach ($categories as $category)
                                        @php
                                            $showItemCategory = "";
                                            if($item->category_id == $category->id) {
                                                $showItemCategory = $category->name;
                                            }

                                        @endphp
                                            {{ $showItemCategory}}
                                    @endforeach --}}
                                </th>
                                <td class="px-6 py-4 text-lg font-medium">
                                    {{-- {{ $item->item_stock_number }} --}}
                                </td>
                                {{-- <td class="py-4 flex justify-end"> --}}
                                    {{-- @can('view-items') --}}
                                        {{-- <a href="#" class="font-medium text-gray-200 bg-blue-600  flex items-center justify-center rounded-md p-2 text-center  hover:bg-blue-700">
                                            <i data-feather="eye"></i>
                                        </a> --}}
                                    {{-- @endcan --}}
                                    {{-- @can('edit-items') --}}
                                        {{-- <a href="#" class="font-medium text-gray-200 bg-blue-600  flex items-center justify-center rounded-md p-2 text-center mr-2  hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a> --}}
                                    {{-- @endcan --}}

                                    {{-- @can('delete-items') --}}
                                        {{-- <a onclick="return confirm('Are you sure to delete this record?')" href="#" class="text-gray-200 bg-red-500 p-2 flex items-center justify-center rounded-md text-center mr-2  hover:bg-red-700">
                                            <i data-feather="trash-2"></i>
                                        </a> --}}
                                    {{-- @endcan --}}
                                {{-- </td> --}}
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                    <div class="flex mt-4">
                        {{-- {!! $items->links() !!} --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

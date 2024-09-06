<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('فورم ۸ - اعاده تحویلخانه') }}
            </h2>

            <a href={{ route('form8s.index') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-4 mb-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-4 py-4 sm:px-6 sm:py-8">
                    <div class="text-2xl text-gray-900 dark:text-gray-100">
                        {{ __("فورم های ثبت شده") }}
                    </div>
                    {{-- @can('create-forms') --}}
                        <a href={{ route('form8s.create') }} type="button" class="p-3 text-center text-gray-100 bg-green-600 rounded-md hover:bg-green-700">
                            <i data-feather="plus"></i>
                        </a>
                    {{-- @endcan --}}
                </div>
                <div class="relative p-6 overflow-x-auto sm:rounded-lg">
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
                                {{-- <td class="flex justify-end py-4"> --}}
                                    {{-- @can('view-items') --}}
                                        {{-- <a href="#" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="eye"></i>
                                        </a> --}}
                                    {{-- @endcan --}}
                                    {{-- @can('edit-items') --}}
                                        {{-- <a href="#" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a> --}}
                                    {{-- @endcan --}}

                                    {{-- @can('delete-items') --}}
                                        {{-- <a onclick="return confirm('Are you sure to delete this record?')" href="#" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-700">
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

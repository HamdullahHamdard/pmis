<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('نمبر توزیع') }} {{$id}}
            </h2>

            <a href="{{ route('form5s.index') }}" class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-4 mb-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-4 py-4 sm:px-6 sm:py-8">
                    <div class="text-2xl text-gray-900 dark:text-gray-100">
                         {{  __("جنس مربوط فورم ف س ۵") }}
                    </div>
                    {{-- @can('create-forms') --}}
                        <a href="{{ url('/formSubmission/create/'. $id) }}" type="button" class="p-3 text-center text-gray-100 bg-green-600 rounded-md hover:bg-green-700">
                            <i data-feather="plus"></i>
                        </a>
                    {{-- @endcan --}}
                </div>
                <div class="relative p-6 overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    نمبر جنس
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    جنس
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    مقدار
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    اقدام
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($formItems as $formItem)


<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

        @foreach ($submissions as $submission)
            @if ($submission->id == $formItem->submission_id)
                @foreach ($items as $item)
                    @if ($item->id == $submission->item_id)
                        @php

                            $itemName = "";
                            $quantity;

                            $itemName = $item->name;
                            $quantity = $submission->total;
                        @endphp
                        {{ $item->id}}
                    @endif
                @endforeach
            @endif
        @endforeach
    </th>
    <td class="px-6 py-4 text-lg font-medium">
        {{$itemName }}
    </td>
    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        {{ $quantity }}
    </th>
                                <td class="flex justify-end py-4">

                                    @can('edit-items')
                                        <a href="{{url('/formSubmission/edit/'.$formItem->id.'/'.$id.'/'.$formItem->quantity)}}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endcan

                                    <form action="{{url('/formSubmission/delete/'.$formItem->id.'/'.$formItem->quantity)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Form fields -->
                                        @can('delete-items')
                                        <button class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-700">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                        @endcan
                                    </form>

                                </td>
                            </tr>
                            @endforeach
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

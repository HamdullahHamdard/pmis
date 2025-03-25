<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('مدیریت وقت کاری کارمندان') }}
            </h2>

            <a href={{ route('settings') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                    برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between px-4 sm:px-6 py-4 sm:py-8">
                    <div class="text-gray-900 dark:text-gray-100 text-2xl">
                        {{ __("شفت کارمندان موجود در سیستم") }}
                    </div>
                    @can('create-employeeShifts')
                        <a data-popover-target="create-popover" href={{url('employee/shifts/create')}} type="button" class="text-gray-100 bg-green-600 hover:bg-green-700 p-3 flex justify-center items-center rounded-md text-center">
                            <i data-feather="plus"></i>
                        </a>
                        <div data-popover id="create-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm text-center">
                            <div class="px-3 py-2">
                                <p>شفت جدید</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    @endcan
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    آی دی
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    کاری شفټ
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    اقدام
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shifts as $shift)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                <td class="px-6 py-4 text-lg font-medium">
                                    {{ $shift->id }}
                                </td>
                                <th scope="currency" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $shift->name }}
                                </th>

                                <td class="py-4 flex justify-end">
                                    @can('edit-employeeShifts')
                                        <a data-popover-target="edit-popover" href="{{ url('employee/shifts/edit/'.$shift->id) }}" class="font-medium text-gray-200 bg-blue-600  flex items-center justify-center rounded-md p-2 text-center mr-2 hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block w-28 text-lg text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm text-center">
                                            <div class="px-3 py-2">
                                                <p>تغیر دادن</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    @endcan

                                    @can('delete-employeeShifts')
                                        <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('employee/shifts/delete/'.$shift->id) }}" class="text-gray-200 bg-red-500 p-2 flex items-center justify-center rounded-md text-center mr-2 hover:bg-red-600">
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
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex mt-4">
                        {!! $shifts->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

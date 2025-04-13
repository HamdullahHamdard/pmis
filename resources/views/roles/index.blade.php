<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('د سیستم د کارونکو د صلاحیتونو مدیریت') }}
            </h2>

            <a href={{ route('settings') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-4 py-4 sm:px-6 sm:py-8">
                    <div class="text-2xl text-gray-900 dark:text-gray-100">
                        {{ __("جوړ شوی صلاحیتونه") }}
                    </div>
                    @can('create-roles')
                        <a data-popover-target="create-popover" href={{url('roles/create')}} type="button" class="flex items-center justify-center p-3 text-center text-gray-100 bg-green-600 rounded-md hover:bg-green-700">
                            <i data-feather="plus"></i>
                        </a>
                        <div data-popover id="create-popover" role="tooltip" class="absolute z-10 invisible inline-block w-32 text-lg text-center text-white transition-opacity duration-300 bg-green-600 rounded-lg shadow-sm">
                            <div class="px-3 py-2">
                                <p>صلاحیت جدید</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    @endcan
                </div>

                <div class="relative p-6 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    آی ډی
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    د صلاحیت نوم
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    کړنې
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">
                                <td class="px-6 py-4 text-lg font-medium">
                                    {{ $role->id }}
                                </td>
                                <th scope="role" class="px-6 py-4 text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->name }}
                                </th>

                                <td class="flex justify-end py-4">
                                    @can('edit-roles')
                                        <a data-popover-target="edit-popover" href="{{ url('roles/edit/'.$role->id) }}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <div data-popover id="edit-popover" role="tooltip" class="absolute z-10 invisible inline-block text-lg text-center text-white transition-opacity duration-300 bg-blue-700 rounded-lg shadow-sm w-28">
                                            <div class="px-3 py-2">
                                                <p>تغیر دادن</p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    @endcan

                                    @can('delete-roles')
                                        <a data-popover-target="delete-popover" onclick="return confirm('Are you sure to delete this record?')" href="{{ url('roles/delete/'.$role->id) }}" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-600">
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
                    <div class="flex mt-4">
                        {!! $roles->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

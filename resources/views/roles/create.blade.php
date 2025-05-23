<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن صلاحیت جدید') }}
            </h2>

            <a href={{ route('roles') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form method="POST" class="max-w-xl mx-auto" action="{{ url('roles/store') }}" enctype='multipart/form-data'
                    id="app-form">
                    @csrf

                    <div x-init="init($refs.wysiwyg)">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('اسم صلاحیت')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Roles -->
                        <div class="mt-4">
                            <div class="pt-3 mb-4">
                                <label for="roles" class="text-xl font-medium text-gray-700 dark:text-gray-100">
                                    انتخاب صلاحیت ها
                                </label>
                            </div>
                            <div class="roles-from-left">
                                <div class="grid grid-cols-2 gap-1 sm:gap-2">
                                    @foreach ($permissions as $permission)
                                        <p class="text-gray-700 text-md sm:text-lg dark:text-gray-200">
                                            @php
                                                $lastIndex = explode('-',$permission->name);
                                            @endphp

                                            <input class="select-{{end($lastIndex)}} w-6 h-6 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 my-2 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                name="permissions[]" value="{{ $permission->id}}" type="checkbox" id="roles">
                                            {{ $permission->name }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button>
                                {{ __('اضافه کردن') }}
                            </x-primary-button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

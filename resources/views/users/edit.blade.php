<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('تغییر دادن معلومات کابر:') }}
                <span class="text-red-500 dark:text-red-400">
                    {{ $user->name }}
                </span>
            </h2>

            <a href={{ route('users') }} class="text-gray-600 flex dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
            برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" class="max-w-xl mx-auto" action="{{ url('users/update/'.$user->id) }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @method('put')

                    <!-- Name -->
                    <div>
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="name" :value="__('اسم مکمل')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="email" :value="__('ایمیل آدرس')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="password" :value="__('پسورد')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <div class="flex items-center">
                            <x-text-input id="password" class="block mt-1 w-full showPassword" type="password" name="password" required autocomplete="new-password" />
                            <button type="button" class="font-mono cursor-pointer showPasswordLabel bg-gray-600 hover:bg-gray-700 px-3 py-2.5 mt-1 -mr-1 rounded-l-md" for="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-50"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>
                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="confirm-password" :value="__('تائید پسورد')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>
                        <div class="flex items-center">
                            <x-text-input id="confirm-password" class="block mt-1 w-full showConfirmPassword" type="password" name="confirm-password" required autocomplete="new-password" />
                            <button type="button" class="font-mono cursor-pointer showConfirmPasswordLabel bg-gray-600 hover:bg-gray-700 px-3 py-2.5 mt-1 -mr-1 rounded-l-md" for="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-50"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>
                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('confirm-password')" class="mt-2" />
                    </div>

                    <!-- Province -->
                    <div class="mt-4">
                        <x-input-label for="province" :value="__('ولایت')" />

                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="province">
                            <option selected disabled>انتخاب</option>
                            @foreach ($provinces as $province)
                                @php
                                    $selected = "";
                                    if($user->province_id == $province->id) {
                                        $selected = "selected";
                                    }
                                @endphp
                                    <option {{ $selected }} value="{{ $province->id }}">
                                        {{$province->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Roles -->
                    <div class="mt-4">
                        <div class="flex justify-start items-center text-center">
                            <x-input-label for="roles" :value="__('صلاحیت')" />
                            <span class="text-red-500 text-xl">*</span>
                        </div>

                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="roles[]">
                            @foreach ($roles as $role)
                                @php
                                    $selected = "";
                                    foreach ($userRole as $ur) {
                                        if($ur->id == $role->id) {
                                            $selected = "selected";
                                        }
                                    }
                                @endphp
                                    <option {{ $selected}} value="{{    $role->name}}">
                                        {{$role->name}}
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <x-primary-button>
                            {{ __('ذخیره کردن') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

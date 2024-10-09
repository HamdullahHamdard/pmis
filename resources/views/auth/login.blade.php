<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-100 text-center">ښه راغلاست - خوش آمدید</h2>
    <p class="text-xl text-gray-600 dark:text-gray-300 text-center">ولایتي څانګه</p>

    <div class="mt-4 flex items-center justify-between">
        <span class="border-b dark:border-b-2 border-gray-600 w-1/5 lg:w-1/4"></span>
        <a href="#" class="text-md tracking-wide text-center text-gray-500 dark:text-gray-400 uppercase">سیستم ته ننوتل</a>
        <span class="border-b dark:border-b-2 border-gray-600 w-1/5 lg:w-1/4"></span>
    </div>

    <form method="POST" action="{{ route('login') }}" class="py-6 sm:py-10">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('ایمیل آدرس')" />

            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('رمز / پسورد')" />

            <div class="flex items-center">
                <x-text-input id="password" class="block mt-1 w-full showPassword" type="password" name="password" required autocomplete="password" />
                <button type="button" class="font-mono cursor-pointer showPasswordLabel bg-gray-900 hover:bg-gray-700 px-3 py-2.5 mt-1 -mr-1 rounded-l-md" for="toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-50"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#018ac0] shadow-sm focus:ring-[#018ac0] dark:focus:ring-[#018ac0] dark:focus:ring-offset-gray-800" name="remember">
                <span class="mr-2 text-sm text-gray-600 dark:text-gray-300">{{ __('ما په یاد ولره - مرا به یاد داشته باش') }}</span>
            </label>
        </div>

‍        <x-primary-button class="ml-3 mt-6 mb-2">
            {{ __('سیستم ته ننوتل') }}
        </x-primary-button>

        <div class="mt-4 flex items-center justify-between">
            <span class="border-b dark:border-b-2 border-gray-600 w-1/5 md:w-1/4"></span>

            @if (Route::has('password.request'))
                <a class="underline underline-offset-8 text-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#018ac0] dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('پسورد مو هیر شوی؟') }}
                </a>
            @endif

            <span class="border-b dark:border-b-2 border-gray-600 w-1/5 md:w-1/4"></span>
        </div>
    </form>
</x-guest-layout>

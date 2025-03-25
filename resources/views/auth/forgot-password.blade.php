<x-guest-layout>
    <div class="mb-4 text-lg text-gray-600 dark:text-gray-300">
        {{ __('که مو د اکونټ پسورد هیر شوی وی، مهرباني وکړی خپل ثبت شوی ایمیل آدرس مو لاندی ولیکي څو څی مونږ د تبدیلولو لینک درته واستو.') }}
    </div>

    <div class="border border-gray-100 mb-4 rounded-md dark:border-gray-700"></div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('ایمیل آدرس')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button>
                {{ __('ارسال لینک') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

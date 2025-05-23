<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center ml-10 shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ URL::to('/') }}/logo/logo.png" alt="RTA New Logo" class="w-16 h-8 img-responsive">
                        {{-- <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" /> --}}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:ml-6 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i data-feather="home" class="w-5 ml-2"></i>
                        {{ __('کورپاڼه') }}
                    </x-nav-link>
                </div>

                @can('view-stock')
                <div class="hidden space-x-4 sm:ml-6 sm:flex">
                    <x-nav-link :href="route('stock')" :active="request()->routeIs('stock')">
                        <i data-feather="package" class="w-5 ml-2"></i>
                        {{ __('عمومی ګدام') }}
                    </x-nav-link>
                </div>
                @endcan
                @can('view-submission')
                <div class="hidden space-x-4 sm:ml-6 sm:flex">
                    <x-nav-link :href="route('form8s.index')" :active="request()->routeIs('form8s.index')">
                        <i data-feather="check-circle" class="w-5 ml-2"></i>
                        {{ __('تسلیمیانې') }}
                    </x-nav-link>
                </div>
                @endcan
                
                @can('view-usables')
                <div class="hidden space-x-4 sm:ml-6 sm:flex">
                    <x-nav-link :href="route('usables')" :active="request()->routeIs('usables')">
                        <i data-feather="edit-2" class="w-5 ml-2"></i>
                        {{ __('مصرفی') }}
                    </x-nav-link>
                </div>
                @endcan

                <div class="hidden space-x-4 sm:ml-6 sm:flex">
                    <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')">
                        <i data-feather="settings" class="w-5 ml-2"></i>
                        {{ __('ترتیبات') }}
                    </x-nav-link>
                </div>
                {{-- @can('view-forms') --}}
                <div class="hidden space-x-4 sm:flex">
                    <x-nav-link :href="route('form5s.index')" :active="request()->routeIs('form5s.index')">
                        <i data-feather="file-text" class="w-5 ml-2"></i>
                        {{ __('فورم توزیع') }}
                    </x-nav-link>
                </div>

                {{-- @endcan --}}
            </div>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 pt-2 font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md text-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <i data-feather="tool" class="w-5 ml-2"></i>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex">
                            <i data-feather="user" class="w-5 ml-2"></i>
                            {{ __('پروفایل') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="flex">
                                <i data-feather="log-out" class="w-5 ml-2"></i>
                                {{ __('سیستم نه وتل') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex">
                <i data-feather="home" class="w-5 ml-2"></i>
                {{ __('کورپاڼه') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('stock')" :active="request()->routeIs('stock')" class="flex">
                <i data-feather="package" class="w-5 ml-2"></i>
                {{ __('عمومی ګدام') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('usables')" :active="request()->routeIs('usables')" class="flex">
                <i data-feather="package" class="w-5 ml-2"></i>
                {{ __('مصرفی') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('settings')" :active="request()->routeIs('settings')" class="flex">
                <i data-feather="settings" class="w-5 ml-2"></i>
                {{ __('ترتیبات') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex">
                    <i data-feather="user" class="w-5 ml-2"></i>
                    {{ __('پروفایل') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="flex">
                        <i data-feather="log-out" class="w-5 ml-2"></i>
                        {{ __('سیستم نه وتل') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>


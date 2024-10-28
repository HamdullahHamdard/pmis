<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن فورم اعاده تحویلخانه جدید') }}
            </h2>

            <a href={{ route('form8s.index') }}
                class="flex items-center text-gray-600 transition-colors dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="mb-6">
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">اعاده تحویلخانه</h1>
                </div>

                <!-- Display any error or success messages -->
                @if(session('error'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Step indicator -->
                <div class="flex items-center justify-center my-6">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-600 rounded-full shadow-md">
                            <span class="text-sm font-medium">1</span>
                        </div>
                        <div class="w-20 h-1 bg-indigo-200 dark:bg-indigo-800">
                            <div class="h-1 transition-all duration-300 bg-indigo-600" style="width: 0%"></div>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 text-gray-500 bg-gray-200 rounded-full shadow-md dark:bg-gray-700 dark:text-gray-400">
                            <span class="text-sm font-medium">2</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 mb-6 text-sm text-red-800 border border-red-200 shadow-sm rounded-xl bg-red-50 dark:bg-red-600 dark:border-red-500 dark:text-white" role="alert">
                    <svg class="w-5 h-5 mt-0.5 text-red-500 dark:text-white shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z" />
                    </svg>
                    <span class="font-medium leading-6">
                      مهرباني وکړئ دغه برخه په دقت سره ډکه کړئ، ځکه وروسته د بدلون امکان نه لري.
                    </span>
                  </div>

                <!-- Form selection -->
                <div class="mb-6">
                    <form method="POST" action="{{ route('form8s.select-form') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="form5-select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                انتخاب فورم
                            </label>
                            <select id="form5-select" name="form5_id" required
                                class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="" hidden class="py-2 text-gray-300">انتخاب کړي</option>

                                @if(auth()->user()->province_id == 13)
                                    @foreach ($form5s as $form5)
                                        <option value="{{ $form5->id }}" class="py-2">
                                            {{ $form5->id }} {{ $form5->form9s->employee->name }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach ($form5s as $form5)
                                        @if($form5->id == auth()->user()->province_id)
                                            <option value="{{ $form5->id }}" class="py-2">
                                                {{ $form5->id }} {{ $form5->form9s->employee->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                انتخاب فورم
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

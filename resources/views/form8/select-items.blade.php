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
                        <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-400 rounded-full shadow-md">
                            <span class="text-sm font-medium">1</span>
                        </div>
                        <div class="w-20 h-1 bg-indigo-200 dark:bg-indigo-800">
                            <div class="h-1 transition-all duration-300 bg-indigo-600" style="width: 50%"></div>
                        </div>
                        <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-600 rounded-full shadow-md">
                            <span class="text-sm font-medium">2</span>
                        </div>
                    </div>
                </div>

                <!-- Selected Form Info -->
                <div class="p-4 mb-6 bg-gray-50 rounded-lg dark:bg-gray-700">
                    <h3 class="mb-2 font-medium text-gray-900 dark:text-white">فورم انتخاب شده:</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $selectedForm5->id }} {{ $selectedForm5->form9s->employee->name }}</p>
                </div>

                <!-- Item selection form -->
                <form method="POST" action="{{ route('form8s.select-items') }}">
                    @csrf
                    <input type="hidden" name="form5_id" value="{{ $selectedForm5->id }}">
                    
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            انتخاب موارد
                        </label>
                        
                        <div class="relative">
                            <div class="mb-3">
                                <button type="submit" name="select_all" value="1" 
                                    class="px-3 py-1 text-sm text-white transition-colors bg-indigo-600 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    انتخاب همه
                                </button>
                                <a href="{{ route('form8s.select-items', ['form5_id' => $selectedForm5->id]) }}" 
                                    class="inline-block px-3 py-1 ml-2 text-sm text-gray-700 transition-colors bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                                    لغو همه
                                </a>
                            </div>
                            
                            <div class="border border-gray-300 rounded-md dark:border-gray-700">
                                @foreach ($submissions as $submission)
                                    <div class="flex items-center p-3 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                        <input type="checkbox" id="submission-{{ $submission->id }}" name="submission_ids[]" value="{{ $submission->id }}"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ in_array($submission->id, old('submission_ids', [])) ? 'checked' : '' }}>
                                        <label for="submission-{{ $submission->id }}" class="block ml-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $submission->employee->name ?? 'No Employee Name' }} : {{ $submission->item->name ?? 'No Item Name' }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                لطفا موارد مورد نظر را انتخاب کنید
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <a href="{{ route('form8s.create') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 rtl:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            {{ __('برگشت') }}
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('بعدی') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 rtl:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
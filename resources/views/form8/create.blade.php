<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('اضافه کردن فورم اعاده تحویلخانه جدید') }}
            </h2>

            <a href={{ route('form8s.index') }}
                class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div>
                    <h1 class="text-xl font-medium text-center text-gray-800 sm:text-2xl dark:text-white">اعاده تحویلخانه
                    </h1>
                </div>

                <!-- Step indicator -->
                <div class="flex items-center justify-center my-4">
                    <div class="flex items-center">
                        <div id="step-1-indicator" class="flex items-center justify-center w-8 h-8 text-white bg-indigo-600 rounded-full">
                            1
                        </div>
                        <div class="w-16 h-1 bg-indigo-600"></div>
                        <div id="step-2-indicator" class="flex items-center justify-center w-8 h-8 text-gray-500 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-400">
                            2
                        </div>
                    </div>
                </div>

                <!-- Step 1: Select form and items -->
                <div id="step-1" class="transition-all duration-300">
                    <form method="GET" class="w-full mx-auto" action="{{ route('form8s.create') }}"
                    enctype='multipart/form-data' id="form-step-1">
                    @csrf
                        <select name="form5_id" id="form5-select" required onchange="this.form.submit()"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        <option value="" hidden class="py-2 text-gray-300">انتخاب کړي</option>

                        @if(auth()->user()->province_id == 13)
                            @foreach ($form5s as $form5)
                                <option value="{{ $form5->id }}"
                                    {{ request('form5_id') == $form5->id ? 'selected' : '' }}
                                    class="py-2">
                                    {{ $form5->id }} {{ $form5->form9s->employee->name }}
                                </option>
                            @endforeach
                        @else
                            @foreach ($form5s as $form5)
                                @if($form5->id == auth()->user()->province_id)
                                    <option value="{{ $form5->id }}"
                                        {{ request('form5_id') == $form5->id ? 'selected' : '' }}
                                        class="py-2">
                                        {{ $form5->id }} {{ $form5->form9s->employee->name }}
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                    </form>

                    <form method="POST" class="w-full mx-auto my-2" id="main-form" action="{{ url('forms/form8/store') }}"
                        enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="form5_id" value="{{ $selectedForm5->id ?? '' }}">

                        @if ($selectedForm5)
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    انتخاب موارد
                                </label>
                                <select id="items-select" name="submission_ids[]" multiple
                                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">

                                    @foreach ($selectedForm5->submissions as $submission)
                                        <option value="{{ $submission->id }}">
                                            {{ $submission->employee->name ?? 'No Employee Name' }} : {{ $submission->item->name ?? 'No Item Name' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-8">
                            <button type="button" id="next-button" class="inline-flex items-center justify-center w-full px-4 py-2 font-bold tracking-wide text-center text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 text-md dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                {{ __('بعدی') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Step 2: Enter prices and select certified persons -->
                <div id="step-2" class="hidden transition-all duration-300">
                    <div id="selected-items-container" class="space-y-4">
                        <!-- Selected items will be populated here via JavaScript -->
                    </div>

                    <div class="flex items-center justify-around mt-8">
                        <button type="button" id="back-button" class="inline-flex items-center justify-center w-full px-4 py-2 ml-2 font-bold tracking-wide text-center text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 text-md dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            {{ __('برگشت') }}
                        </button>

                        <x-primary-button id="submit-button" class="mr-2" form="main-form">
                            {{ __('ثبت کردن فورم') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const step1 = document.getElementById('step-1');
            const step2 = document.getElementById('step-2');
            const step1Indicator = document.getElementById('step-1-indicator');
            const step2Indicator = document.getElementById('step-2-indicator');
            const nextButton = document.getElementById('next-button');
            const backButton = document.getElementById('back-button');
            const submitButton = document.getElementById('submit-button');
            const itemsSelect = document.getElementById('items-select');
            const selectedItemsContainer = document.getElementById('selected-items-container');
            const mainForm = document.getElementById('main-form');

            // Move to step 2
            nextButton.addEventListener('click', function() {
                // Validate that at least one item is selected
                if (itemsSelect && itemsSelect.selectedOptions.length === 0) {
                    alert('لطفا حداقل یک مورد را انتخاب کنید');
                    return;
                }

                // Show step 2 and hide step 1
                step1.classList.add('hidden');
                step2.classList.remove('hidden');

                // Update step indicators
                step1Indicator.classList.remove('bg-indigo-600', 'text-white');
                step1Indicator.classList.add('bg-indigo-300', 'text-indigo-800');
                step2Indicator.classList.remove('bg-gray-200', 'text-gray-500', 'dark:bg-gray-700', 'dark:text-gray-400');
                step2Indicator.classList.add('bg-indigo-600', 'text-white');

                // Generate form fields for each selected item
                generateItemFields();
            });

            // Move back to step 1
            backButton.addEventListener('click', function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');

                // Update step indicators
                step1Indicator.classList.remove('bg-indigo-300', 'text-indigo-800');
                step1Indicator.classList.add('bg-indigo-600', 'text-white');
                step2Indicator.classList.remove('bg-indigo-600', 'text-white');
                step2Indicator.classList.add('bg-gray-200', 'text-gray-500', 'dark:bg-gray-700', 'dark:text-gray-400');
            });

            // Generate form fields for selected items
            function generateItemFields() {
                selectedItemsContainer.innerHTML = '';

                if (!itemsSelect) return;

                Array.from(itemsSelect.selectedOptions).forEach((option, index) => {
                    const submissionId = option.value;
                    const itemText = option.textContent.trim();

                    const itemDiv = document.createElement('div');
                    itemDiv.className = 'p-4 border border-gray-200 rounded-md dark:border-gray-700';
                    itemDiv.innerHTML = `
                        <h3 class="mb-3 font-medium text-gray-900 dark:text-white">${itemText}</h3>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    قیمت جدید
                                </label>
                                <input type="number" name="new_prices[${submissionId}]" required
                                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    placeholder="قیمت جدید را وارد کنید">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    شخص مسئول
                                </label>
                                <input type="number" name="new_prices[${submissionId}]" required
                                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    placeholder="شخص جدید را وارد کنید">
                            </div>
                        </div>
                    `;

                    selectedItemsContainer.appendChild(itemDiv);
                });
            }

            // Handle form submission
            mainForm.addEventListener('submit', function(e) {
                // If we're on step 1, prevent submission and go to step 2
                if (!step1.classList.contains('hidden')) {
                    e.preventDefault();
                    nextButton.click();
                }
                // Otherwise, let the form submit normally
            });
        });
    </script>
</x-app-layout>

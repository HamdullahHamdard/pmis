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
                        <div id="step-1-indicator" class="flex items-center justify-center w-10 h-10 text-white bg-indigo-600 rounded-full shadow-md">
                            <span class="text-sm font-medium">1</span>
                        </div>
                        <div class="w-20 h-1 bg-indigo-200 dark:bg-indigo-800">
                            <div id="progress-bar" class="h-1 transition-all duration-300 bg-indigo-600" style="width: 0%"></div>
                        </div>
                        <div id="step-2-indicator" class="flex items-center justify-center w-10 h-10 text-gray-500 bg-gray-200 rounded-full shadow-md dark:bg-gray-700 dark:text-gray-400">
                            <span class="text-sm font-medium">2</span>
                        </div>
                    </div>
                </div>

                <!-- Form selection -->
                <div id="form-selection-container" class="mb-6 {{ $selectedForm5 ? 'hidden' : '' }}">
                    <div class="mb-4">
                        <label for="form5-select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            انتخاب فورم
                        </label>
                        <select id="form5-select" required
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
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="select-form-button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span id="select-form-button-text">انتخاب فورم</span>
                            <svg id="select-form-loading" class="hidden w-5 h-5 ml-2 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Main form with both steps -->
                <form method="POST" class="w-full mx-auto" id="main-form" action="{{ route('form8s.store') }}"
                    enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="form5_id" id="selected-form5-id" value="{{ $selectedForm5->id ?? '' }}">

                    <!-- Step 1: Select items -->
                    <div id="step-1" class="transition-all duration-300 {{ !$selectedForm5 ? 'hidden' : '' }}">
                        @if ($selectedForm5)
                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    انتخاب موارد
                                </label>
                                <div class="flex items-center mb-3">
                                    <button type="button" id="select-all-button"
                                        class="px-3 py-1 text-sm text-white transition-colors bg-indigo-600 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        انتخاب همه
                                    </button>
                                    <button type="button" id="deselect-all-button"
                                        class="px-3 py-1 ml-2 text-sm text-gray-700 transition-colors bg-gray-200 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                                        لغو همه
                                    </button>
                                </div>

                                <div class="relative">
                                    <select id="items-select" name="submission_ids[]" multiple
                                        class="w-full min-h-[200px] border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                        @foreach ($submissions ?? [] as $submission)
                                            <option value="{{ $submission->id }}">
                                                {{ $submission->employee->name ?? 'No Employee Name' }} : {{ $submission->item->name ?? 'No Item Name' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div id="selection-count" class="absolute px-2 py-1 text-xs text-gray-500 bg-white rounded-md bottom-2 right-2 dark:text-gray-400 dark:bg-gray-900">
                                        0 مورد انتخاب شده
                                    </div>
                                </div>

                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    برای انتخاب چندین مورد، کلید Ctrl (یا Command در Mac) را نگه دارید و کلیک کنید
                                </p>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-8">
                            <button type="button" id="next-button"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{ __('بعدی') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 rtl:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Enter prices and select certified persons -->
                    <div id="step-2" class="hidden transition-all duration-300">
                        <div id="selected-items-container" class="space-y-6">
                            <!-- Selected items will be populated here via JavaScript -->
                        </div>

                        <div class="flex items-center justify-between mt-8">
                            <button type="button" id="back-button"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 rtl:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                {{ __('برگشت') }}
                            </button>
                            <button type="submit" id="submit-button"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span id="submit-button-text">{{ __('ثبت کردن فورم') }}</span>
                                <svg id="submit-loading" class="hidden w-5 h-5 ml-2 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const step1Indicator = document.getElementById('step-1-indicator');
        const step2Indicator = document.getElementById('step-2-indicator');
        const progressBar = document.getElementById('progress-bar');
        const nextButton = document.getElementById('next-button');
        const backButton = document.getElementById('back-button');
        const itemsSelect = document.getElementById('items-select');
        const selectedItemsContainer = document.getElementById('selected-items-container');
        const mainForm = document.getElementById('main-form');
        const selectAllButton = document.getElementById('select-all-button');
        const deselectAllButton = document.getElementById('deselect-all-button');
        const selectionCount = document.getElementById('selection-count');
        const formSelectionContainer = document.getElementById('form-selection-container');
        const selectFormButton = document.getElementById('select-form-button');
        const selectFormButtonText = document.getElementById('select-form-button-text');
        const selectFormLoading = document.getElementById('select-form-loading');
        const submitButton = document.getElementById('submit-button');
        const submitButtonText = document.getElementById('submit-button-text');
        const submitLoading = document.getElementById('submit-loading');
        const form5Select = document.getElementById('form5-select');
        const selectedForm5Id = document.getElementById('selected-form5-id');

        // Update selection count
        function updateSelectionCount() {
            if (itemsSelect && selectionCount) {
                const count = itemsSelect.selectedOptions.length;
                selectionCount.textContent = `${count} مورد انتخاب شده`;
            }
        }

        // Initialize selection count
        if (itemsSelect) {
            updateSelectionCount();

            // Update count when selection changes
            itemsSelect.addEventListener('change', updateSelectionCount);
        }

        // Select all items button
        if (selectAllButton && itemsSelect) {
            selectAllButton.addEventListener('click', function() {
                for (let i = 0; i < itemsSelect.options.length; i++) {
                    itemsSelect.options[i].selected = true;
                }
                updateSelectionCount();
            });
        }

        // Deselect all items button
        if (deselectAllButton && itemsSelect) {
            deselectAllButton.addEventListener('click', function() {
                for (let i = 0; i < itemsSelect.options.length; i++) {
                    itemsSelect.options[i].selected = false;
                }
                updateSelectionCount();
            });
        }

        // Form selection button click handler - Direct navigation without AJAX
        if (selectFormButton && form5Select) {
            selectFormButton.addEventListener('click', function() {
                // Validate form selection
                if (!form5Select || !form5Select.value) {
                    // Show error message
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800';
                    errorMessage.setAttribute('role', 'alert');
                    errorMessage.textContent = 'لطفا یک فورم را انتخاب کنید';

                    // Insert error message before the form
                    formSelectionContainer.parentNode.insertBefore(errorMessage, formSelectionContainer);

                    // Remove error message after 3 seconds
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 3000);

                    return;
                }

                // Show loading indicator
                selectFormButton.disabled = true;
                selectFormButtonText.textContent = 'در حال بارگذاری...';
                selectFormLoading.classList.remove('hidden');

                // Navigate to the page with the selected form ID using the History API
                // This avoids exposing the token in the URL
                const url = new URL(window.location.href);
                url.searchParams.delete('_token'); // Remove token if it exists
                url.searchParams.set('form5_id', form5Select.value);

                // Use History API to change URL without reloading
                window.history.pushState({}, '', url.pathname);

                // Then reload the page with the form ID as a POST parameter
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("form8s.create") }}';
                form.style.display = 'none';

                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Add form5_id
                const form5IdInput = document.createElement('input');
                form5IdInput.type = 'hidden';
                form5IdInput.name = 'form5_id';
                form5IdInput.value = form5Select.value;
                form.appendChild(form5IdInput);

                document.body.appendChild(form);
                form.submit();
            });
        }

        // Move to step 2
        if (nextButton) {
            nextButton.addEventListener('click', function() {
                // Validate that at least one item is selected
                if (!itemsSelect || itemsSelect.selectedOptions.length === 0) {
                    // Show error message
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800';
                    errorMessage.setAttribute('role', 'alert');
                    errorMessage.textContent = 'لطفا حداقل یک مورد را انتخاب کنید';

                    // Insert error message before the form
                    mainForm.parentNode.insertBefore(errorMessage, mainForm);

                    // Remove error message after 3 seconds
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 3000);

                    return;
                }

                // Show step 2 and hide step 1
                step1.classList.add('hidden');
                step2.classList.remove('hidden');

                // Update step indicators
                step1Indicator.classList.remove('bg-indigo-600', 'text-white');
                step1Indicator.classList.add('bg-indigo-400', 'text-white');
                step2Indicator.classList.remove('bg-gray-200', 'text-gray-500', 'dark:bg-gray-700', 'dark:text-gray-400');
                step2Indicator.classList.add('bg-indigo-600', 'text-white');

                // Update progress bar
                progressBar.style.width = '100%';

                // Generate form fields for each selected item
                generateItemFields();

                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Move back to step 1
        if (backButton) {
            backButton.addEventListener('click', function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');

                // Update step indicators
                step1Indicator.classList.remove('bg-indigo-400', 'text-white');
                step1Indicator.classList.add('bg-indigo-600', 'text-white');
                step2Indicator.classList.remove('bg-indigo-600', 'text-white');
                step2Indicator.classList.add('bg-gray-200', 'text-gray-500', 'dark:bg-gray-700', 'dark:text-gray-400');

                // Update progress bar
                progressBar.style.width = '0%';

                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Generate form fields for selected items
        function generateItemFields() {
            if (!selectedItemsContainer) return;

            selectedItemsContainer.innerHTML = '';

            if (!itemsSelect) return;

            // Create a hidden container for submission IDs if it doesn't exist
            let submissionIdsContainer = document.getElementById('submission-ids-container');
            if (!submissionIdsContainer) {
                submissionIdsContainer = document.createElement('div');
                submissionIdsContainer.id = 'submission-ids-container';
                submissionIdsContainer.style.display = 'none';
                mainForm.appendChild(submissionIdsContainer);
            } else {
                submissionIdsContainer.innerHTML = '';
            }

            // Get all selected options
            const selectedOptions = Array.from(itemsSelect.selectedOptions);

            // Process each selected item
            selectedOptions.forEach((option, index) => {
                const submissionId = option.value;
                const itemText = option.textContent.trim();

                // Create hidden input for submission ID
                const submissionIdInput = document.createElement('input');
                submissionIdInput.type = 'hidden';
                submissionIdInput.name = 'submission_ids[]';
                submissionIdInput.value = submissionId;
                submissionIdsContainer.appendChild(submissionIdInput);

                // Create visual representation for the user
                const itemDiv = document.createElement('div');
                itemDiv.className = 'p-5 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 transition-all hover:border-indigo-200 dark:hover:border-indigo-800';
                itemDiv.innerHTML = `
                    <h3 class="mb-4 font-medium text-gray-900 dark:text-white">${index + 1}. ${itemText}</h3>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
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
                            <select name="certified_persons[${submissionId}]" required
                                class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="" hidden>انتخاب کنید</option>
                                @foreach($employees ?? [] as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                                <!-- Fallback options if no employees are available -->
                                @if(empty($employees))
                                    <option value="person1">شخص 1</option>
                                    <option value="person2">شخص 2</option>
                                    <option value="person3">شخص 3</option>
                                @endif
                            </select>
                        </div>
                    </div>
                `;

                selectedItemsContainer.appendChild(itemDiv);
            });
        }

        // Handle form submission
        if (mainForm) {
            mainForm.addEventListener('submit', function(e) {
                // If we're on step 1, prevent submission and go to step 2
                if (!step1.classList.contains('hidden')) {
                    e.preventDefault();
                    nextButton.click();
                    return;
                }

                // We're on step 2, validate before submission
                const submissionIdsContainer = document.getElementById('submission-ids-container');
                if (!submissionIdsContainer || submissionIdsContainer.children.length === 0) {
                    e.preventDefault();

                    // Show error message
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800';
                    errorMessage.setAttribute('role', 'alert');
                    errorMessage.textContent = 'خطا: هیچ موردی انتخاب نشده است';

                    // Insert error message before the form
                    mainForm.parentNode.insertBefore(errorMessage, mainForm);

                    // Remove error message after 3 seconds
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 3000);

                    return;
                }

                // Check if all required fields are filled
                let isValid = true;
                let firstInvalidField = null;
                const priceInputs = document.querySelectorAll('input[name^="new_prices"]');
                const personSelects = document.querySelectorAll('select[name^="certified_persons"]');

                priceInputs.forEach(input => {
                    if (!input.value) {
                        isValid = false;
                        input.classList.add('border-red-500', 'dark:border-red-500');
                        if (!firstInvalidField) firstInvalidField = input;
                    } else {
                        input.classList.remove('border-red-500', 'dark:border-red-500');
                    }
                });

                personSelects.forEach(select => {
                    if (!select.value) {
                        isValid = false;
                        select.classList.add('border-red-500', 'dark:border-red-500');
                        if (!firstInvalidField) firstInvalidField = select;
                    } else {
                        select.classList.remove('border-red-500', 'dark:border-red-500');
                    }
                });

                if (!isValid) {
                    e.preventDefault();

                    // Show error message
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800';
                    errorMessage.setAttribute('role', 'alert');
                    errorMessage.textContent = 'لطفا تمام فیلدها را پر کنید';

                    // Insert error message before the form
                    mainForm.parentNode.insertBefore(errorMessage, mainForm);

                    // Remove error message after 3 seconds
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 3000);

                    // Scroll to first invalid field
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstInvalidField.focus();
                    }

                    return;
                }

                // Show loading indicator
                if (submitButton && submitButtonText && submitLoading) {
                    submitButton.disabled = true;
                    submitButtonText.textContent = 'در حال ثبت...';  {
                    submitButton.disabled = true;
                    submitButtonText.textContent = 'در حال ثبت...';
                    submitLoading.classList.remove('hidden');
                }
            });
        }
    });
</script>
</x-app-layout>

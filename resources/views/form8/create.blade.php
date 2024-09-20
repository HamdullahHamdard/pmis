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
                <form method="POST" class="w-full mx-auto" action="{{ url('forms/form8/store') }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf

                    <!-- Dropdown to Select Form5 -->
                    <select id="form5-select"
                        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        <option value="">Select a Form5</option>
                        @foreach ($form5s as $form5)
                            <option value="{{ $form5->id }}" data-distribution-date="{{ $form5->distribution_date }}"
                                data-form9s-id="{{ $form5->form9s_id }}">
                                {{ $form5->id }} {{ $form5->form9s->employee->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Hidden Details Section -->
                    <div id="form5-details" class="p-4 mt-4 border border-gray-300 rounded-md" style="display: none;">
                        <p><strong>د توزیع تاریخ:</strong> <span id="distribution-date"></span></p>
                        {{-- <p><strong>Details:</strong> <span id="details"></span></p> --}}
                        <p><strong>د فورم ۹ شمیره:</strong> <span id="form9s-id"></span></p>
                        @foreach ($form5s as $form5)
        @foreach ($form5->submissions as $submission)
            <option value="{{ $submission->id }}">
                {{ $submission->item_id }}
            </option>
        @endforeach
    @endforeach

                    </div>

                    <!-- JavaScript to Show/Hide Details -->

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-8">
                        <x-primary-button>
                            {{ __('ثبت کردن فورم') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('form5-select').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];

            if (selectedOption.value) {
                document.getElementById('distribution-date').textContent = selectedOption.getAttribute('data-distribution-date');
                document.getElementById('form9s-id').textContent = selectedOption.getAttribute('data-form9s-id');

                // Show the details section
                document.getElementById('form5-details').style.display = 'block';
            } else {
                // Hide the details section when no form is selected
                document.getElementById('form5-details').style.display = 'none';
            }
        });
        </script>
</x-app-layout>

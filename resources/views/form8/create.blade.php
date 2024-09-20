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
                <form method="GET" class="w-full mx-auto" action="{{ route('form8s.create') }}"
                enctype='multipart/form-data' id="app-form">
                @csrf
                    <select name="form5_id" id="form5-select" required onchange="this.form.submit()"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    <option value="" hidden class="py-2 text-gray-300">انتخاب کړي</option>

                    @if(auth()->user()->province_id == 13)
                        @foreach ($form5s as $form5)
                            <option value="{{ $form5->id }}"
                                {{ request('form5_id') == $form5->id ? 'selected' : '' }}
                                class="py-2">
                                {{ $form5->id }}
                            </option>
                        @endforeach
                    @else
                        @foreach ($form5s as $form5)
                            @if($form5->id == auth()->user()->province_id)
                                <option value="{{ $form5->id }}"
                                    {{ request('form5_id') == $form5->id ? 'selected' : '' }}
                                    class="py-2">
                                    {{ $form5->id }}
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </form>

                 <form method="POST" class="w-full mx-auto" action="{{ url('forms/form8/store') }}"
                    enctype='multipart/form-data' id="app-form">
                    @csrf
                    @if ($selectedForm5)
    <select multiple id="form5-select"
        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">

        @foreach ($selectedForm5->submissions as $submission)
            <option value="{{ $submission->id }}">
                {{ $submission->item->name ?? 'No Item Name' }}
            </option>
        @endforeach

    </select>
@endif


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
        // Optional: Add this if you want to handle form submission programmatically
        document.querySelectorAll('select').forEach(select => {
            select.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>
</x-app-layout>

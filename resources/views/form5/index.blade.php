<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('فورم 5 - تکت توزیع تحویلخانه ها') }}
            </h2>

            {{-- <a href={{ route('forms') }} class="flex text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                برگشت <i data-feather="corner-up-left" class="w-5 mr-1"></i>
            </a> --}}
        </div>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-4 mb-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between px-4 py-4 sm:px-6 sm:py-8">
                    <div class="text-2xl text-gray-900 dark:text-gray-100">
                        {{ __("فورم های ثبت شده") }}
                    </div>
                    {{-- @can('create-forms') --}}
                        <a href={{ route('form5s.create') }} type="button" class="p-3 text-center text-gray-100 bg-green-600 rounded-md hover:bg-green-700">
                            <i data-feather="plus"></i>
                        </a>
                    {{-- @endcan --}}
                </div>
                <div class="relative p-6 overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                @if(auth()->user()->province_id == 13)
                                    <th scope="col" class="px-6 py-3">
                                        ولایت
                                    </th>
                                @endif
                                <th scope="col" class="px-6 py-3">
                                    نمبر توزیع
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    نمبر فورم ف س ۹
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    نام کارمند
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    جنس
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    اقدام
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)

                            @if(auth()->user()->province_id == $form->province_id)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">

                                @if(auth()->user()->province_id == 13)
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach ($provinces as $province)
                                        @if($province->id == $form->province_id)
                                        {{
                                            $province->name
                                        }}
                                        @endif
                                    @endforeach

                                </th>
                                @endif
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $form->id }}
                                </th>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                    {{ $form->form9s->form9s_number}}

                                </th>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">


                                    {{-- @foreach ($form9s as $form9)

                                    @endforeach --}}
                                        @foreach($employees as $employee)

                                        @if($form->form9s->employee_id == $employee->id)
                                                        {{$employee->name}}
                                        @endif
                                        @endforeach


                                </th>
                                <td class="w-8 px-6 py-4 text-lg font-medium">


                                    <div class="flex items-center justify-between">

                                        <p class="items-center px-4 justify-center p-1.5 font-normal text-center text-gray-200 rounded-md hover:bg-green-700">

                                            @php
                                            $countItem = 0;
                                            @endphp
                                            @foreach ($formItems as $formItem)
                                            @php

                                                $itemDistributed = $formItem::where("form5_id", $form->id)->count("submission_id");
                                                $countItem = $itemDistributed;
                                            @endphp


                                        @endforeach
                                            {{$countItem}} </p>
                                    <a href="{{url('/formSubmission/'.$form->id)}}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 rounded-md hover:bg-blue-700">
                                        <i data-feather="eye"></i>
                                    </a>
                                    </div>
                                </td>

                                <td class="flex justify-end py-4">
                                    @can('view-items')
                                        <a href="{{route('form5s.show',$form->id)}}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="printer"></i>
                                        </a>
                                    @endcan
                                    @can('edit-items')
                                        <a href="{{route('form5s.edit', $form->id)}}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endcan

                                    <form method="POST" action="{{route('form5s.destroy', $form->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        @can('delete-items')
                                            <button onclick="return confirm('Are you sure to delete this record?')" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-700">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        @endcan
                                </form>
                                </td>
                            </tr>

                            @elseif(auth()->user()->province_id == 13)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-md">

                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach ($provinces as $province)
                                        @if($province->id == $form->province_id)
                                        {{
                                            $province->name
                                        }}
                                        @endif
                                    @endforeach

                                </th>

                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $form->id }}
                                </th>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                    {{ $form->form9s->id}}

                                </th>
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">


                                    {{-- @foreach ($form9s as $form9)

                                    @endforeach --}}
                                        @foreach($employees as $employee)

                                        @if($form->form9s->employee_id == $employee->id)
                                                        {{$employee->name}}
                                        @endif
                                        @endforeach


                                </th>
                                <td class="w-8 px-6 py-4 text-lg font-medium">


                                    <div class="flex items-center justify-between">

                                        <p class="items-center px-4 justify-center p-1.5 font-normal text-center text-gray-200 rounded-md hover:bg-green-700">

                                            @foreach ($formItems as $formItem)
                                            @php
                                                $countItem = 0;
                                                $itemDistributed = $formItem::where("form5_id", $form->id)->count("submission_id");
                                                $countItem = $itemDistributed;
                                            @endphp


                                        @endforeach
                                            {{$countItem}} </p>
                                    <a href="{{url('/formSubmission/'.$form->id)}}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 rounded-md hover:bg-blue-700">
                                        <i data-feather="eye"></i>
                                    </a>
                                    </div>
                                </td>

                                <td class="flex justify-end py-4">
                                    @can('view-items')
                                        <a href="{{route('form5s.show',$form->id)}}" class="flex items-center justify-center p-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="printer"></i>
                                        </a>
                                    @endcan
                                    @can('edit-items')
                                        <a href="{{route('form5s.edit', $form->id)}}" class="flex items-center justify-center p-2 mr-2 font-medium text-center text-gray-200 bg-blue-600 rounded-md hover:bg-blue-700">
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endcan

                                    <form method="POST" action="{{route('form5s.destroy', $form->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        @can('delete-items')
                                            <button onclick="return confirm('Are you sure to delete this record?')" class="flex items-center justify-center p-2 mr-2 text-center text-gray-200 bg-red-500 rounded-md hover:bg-red-700">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        @endcan
                                </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="flex items-center justify-center mt-4 space-x-4">
                        <!-- Previous Page Link -->
                        @if ($forms->onFirstPage())
                            <span class="text-gray-400">&laquo; Previous</span>
                        @else
                            <a href="{{ $forms->previousPageUrl() }}" class="text-indigo-600 hover:underline">&laquo; Previous</a>
                        @endif

                        <!-- Page Numbers -->
                        @foreach ($forms->getUrlRange(1, $forms->lastPage()) as $page => $url)
                            @if ($page == $forms->currentPage())
                                <span class="font-semibold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="text-indigo-600 hover:underline">{{ $page }}</a>
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($forms->hasMorePages())
                            <a href="{{ $forms->nextPageUrl() }}" class="text-indigo-600 hover:underline">Next &raquo;</a>
                        @else
                            <span class="text-gray-400">Next &raquo;</span>
                        @endif
                    </div> --}}
                    <div class="flex mt-4">
                        {!! $forms->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

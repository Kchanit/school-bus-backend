@extends('layouts.main')
@section('content')
    <div class="container mx-auto py-8 px-8">
        <div class="flex justify-between items-baseline">
            <h1 class="text-2xl font-bold mb-7">Driver List</h1>
            <div>
                <a href="{{ route('drivers.create') }}"
                    class="flex items-center rounded-lg bg-blue-600/90 px-4 py-3 text-center text-xs font-medium text-white hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white mr-2"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Add Driver</a>
            </div>
        </div>


        <div class="overflow-x-auto shadow-md rounded-xl">
            <table class="min-w-full text-left divide-y-2 divide-gray-200 bg-white text-md rounded-xl">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                        </th>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                            <div class="flex items-center">
                                @sortablelink('first_name', 'First Name')<svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>

                        </th>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                            <div class="flex items-center">
                                @sortablelink('last_name', 'Last Name')<svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>
                        </th>


                        <th class="whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                            <div class="flex items-center">
                                @sortablelink('email', 'Email')<svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>
                        </th>

                        <th class=" whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                            <div class="flex items-center">

                                @sortablelink('id', 'Route No.')<svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </div>
                        </th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($drivers as $driver)
                        <tr class="odd:bg-gray-50 hover:bg-gray-50">
                            <td>
                                <div class="flex justify-center items-center py-2 px-4">
                                    <img class="w-10 h-10 rounded-full object-cover" src="{{ asset($driver->image_path) }}">
                            </td>
                            {{-- First name --}}
                            <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $driver->first_name }}</td>
                            {{-- Last name --}}
                            <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $driver->last_name }}</td>
                            {{-- District --}}
                            <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $driver->email }}</td>
                            {{-- no. --}}
                            <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $driver->id }}</td>

                            {{-- Road --}}
                            <td class="flex justify-center py-2">
                                <a href="{{ url('edit/driver/' . $driver->id) }}"
                                    class="inline-block rounded px-4 py-2 text-xs font-medium text-blue-600 hover:underline">Edit</a>
                                <button data-modal-target="popup-modal-{{ $driver->id }}"
                                    data-modal-toggle="popup-modal-{{ $driver->id }}"
                                    class="inline-block rounded px-4 py-2 text-xs font-medium text-red-600 hover:underline">Delete</button>

                                <div id="popup-modal-{{ $driver->id }}" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal-{{ $driver->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <button data-modal-hide="popup-modal-{{ $driver->id }}" type="button">
                                                    <svg class="mx-auto
                                                    mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>

                                                <h3 class="text-lg font-normal text-gray-500">Are
                                                    you sure you want to delete {{ $driver->getFullName() }} ?</h3>
                                                <p class="mb-8 mt-1 text-sm font-normal text-gray-500"> When
                                                    you delete, driver will remove from route. </p>
                                                {{-- <h1>{{ $driver->id }} {{ $driver->getFullName() }} </h1> --}}
                                                <div class="flex justify-center">
                                                    <form action="{{ route('drivers.destroy', ['driver' => $driver]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button data-modal-hide="popup-modal-{{ $driver->id }}"
                                                            type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal-{{ $driver->id }}"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center mt-6">
            <!-- Help text -->
            <span class="text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-semibold text-gray-900">{{ $drivers->currentPage() }}</span> to
                <span class="font-semibold text-gray-900">{{ $drivers->perPage() }}</span> of <span
                    class="font-semibold text-gray-900">{{ $drivers->total() }}</span> Entries
            </span>
            <!-- Buttons -->
            <div class="inline-flex mt-2 mr-2 xs:mt-0">
                <!-- Previous Button -->
                <a href="{{ $drivers->previousPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-transparent rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><svg
                        class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    Previous
                </a>

                <!-- Next Button -->
                <a href="{{ $drivers->nextPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 ml-3 text-sm font-medium text-gray-500 bg-transparent rounded-md hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection

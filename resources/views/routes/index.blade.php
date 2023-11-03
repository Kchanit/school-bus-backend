@extends('layouts.main')
@section('content')
    <section>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-baseline">
                <h1 class="text-2xl font-bold mb-7">Route List</h1>
                <div>
                    <a href="{{ route('routes.create') }}"
                        class="flex items-center rounded-lg bg-blue-600/90 px-4 py-3 text-center text-xs font-medium text-white hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white mr-2"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        Create Route</a>
                </div>
            </div>

            <div class="overflow-x-auto shadow-md rounded-xl">
                <table class="min-w-full text-left divide-y-2 divide-gray-200 bg-white text-md">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="flex items-center whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                @sortablelink('id', 'Route No.')
                                <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </th>

                            <th class=" whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                <div class="flex items-center">
                                    @sortablelink('route_id', 'Student')
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                <div class="flex items-center">
                                    Driver
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($routes as $route)
                            <tr class="odd:bg-gray-50 hover:bg-gray-50">
                                {{-- no. --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $route->id }}</td>
                                {{-- District --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">
                                    {{ $route->students->count() . '/' . $route->students->count() ?? 'No Student' }}</td>
                                {{-- Road --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $route->driver->getFullName() }}
                                </td>
                                <td class="flex justify-center pr-2 py-2">
                                    <a href="{{ route('routes.show', ['driver' => $route->driver]) }}">
                                        <button
                                            class="inline-block rounded px-4 py-2 text-xs font-medium text-blue-600 hover:underline">Manage</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between items-center mt-6">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $routes->currentPage() }}</span> to
                    <span class="font-semibold text-gray-900">{{ $routes->perPage() }}</span> of <span
                        class="font-semibold text-gray-900">{{ $routes->total() }}</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 mr-2 xs:mt-0">
                    <!-- Previous Button -->
                    <a href="{{ $routes->previousPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-transparent rounded-lg hover:bg-gray-100 hover:text-gray-700">
                        <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        Previous
                    </a>

                    <!-- Next Button -->
                    <a href="{{ $routes->nextPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 ml-3 text-sm font-medium text-gray-500 bg-transparent rounded-md hover:bg-gray-100 hover:text-gray-700">
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
    </section>
@endsection




{{-- <section>
    <div class="container mx-auto py-8 px-8">
        <div class="flex justify-between items-baseline">
            <h1 class="text-2xl font-bold mb-7">Route List</h1>
            <div>
                <a href="{{ route('routes.create') }}"
                    class="flex items-center rounded-lg bg-blue-600/90 px-4 py-3 text-center text-xs font-medium text-white hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white mr-2"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Create Route</a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden mx-auto">
            <ul class="divide-y divide-gray-200">
                {{-- @if (count($routes) > 0) --}}
{{-- @foreach ($routes as $route)
                    <a href="{{ route('routes.show', ['driver' => $route->driver]) }}" class="grid grid-cols-7">
                        <li class="flex col-span-2 items-center justify-center py-4 px-6">
                            <span
                                class="text-gray-700 text-lg font-medium mr-16 ml-8">{{ $loop->iteration . '.' }}</span>
                            <div class="flex-1">
                                <h3 class="text-lg text-start font-medium text-gray-800">
                                    Route No.
                                </h3>
                                <p class="text-gray-600 text-start text-base">
                                    {{ $route->id ?? 'No Route' }}
                                </p>
                            </div>
                        </li>
                        <li class="flex  col-span-2 items-center justify-center py-4 px-6">
                            <div class="flex-1">
                                <h3 class="text-lg text-start font-medium text-gray-800">
                                    Students
                                </h3>
                                <p class="text-gray-600 text-start text-base">
                                    {{ $route->students->count() ?? 'No Student' }}
                                </p>
                            </div>
                        </li>
                        <li class="flex col-span-3 items-center py-4 px-6">
                            <img class="w-12 h-12 rounded-full object-cover mr-4"
                                src="https://randomuser.me/api/portraits/women/72.jpg" alt="User avatar">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-800">
                                    {{ ($route->driver->first_name ?? 'FirstName') . ' ' . ($route->driver->last_name ?? 'LastName') }}
                                </h3>
                                <p class="text-gray-600 text-base">{{ $route->driver->email ?? '' }}</p>
                            </div>
                        </li>
                    </a>
                @endforeach --}}
{{-- @else
                        no route
                    @endif --}}
{{-- </ul>
        </div>
        <div class="flex w-full justify-center mt-8">
            {{-- pagination --}}
{{-- <div class="inline-flex self-center items-center justify-center gap-3">
                <a href="{{ $routes->previousPageUrl() }}"
                    class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <p class="text-xs text-gray-900">
                    {{ $routes->currentPage() }}
                    <span class="mx-0.25">/</span>
                    {{ $routes->lastPage() }}
                </p>

                <a href="{{ $routes->nextPageUrl() }}"
                    class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

</section>
@endsection --}}

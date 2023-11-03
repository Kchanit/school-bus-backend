@extends('layouts.main')
@section('content')
    <section>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-2xl font-bold mb-2">Reports List</h1>
            <h1 class="text-sm text-gray-700 mb-7">รายการแสดงย้อนหลังสูงสุด 30 วัน*</h1>

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
                                    @sortablelink('first_name', 'Date')
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th class=" whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                <div class="flex items-center">
                                    @sortablelink('last_name', 'Time')
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </div>
                            </th>
                            <th class="flex items-center whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                @sortablelink('route_id', 'Student')
                                <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
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
                                {{-- First name --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">วันที่</td>
                                {{-- Last name --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">เวลาที่เสร็จ</td>
                                {{-- District --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">
                                    {{ $route->students->count() . '/' . $route->students->count() ?? 'No Student' }}</td>
                                {{-- Road --}}
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $route->driver->getFullName() }}
                                </td>
                                <td class="flex justify-center pr-2 py-2">
                                    <a href="{{ route('reports.show', ['route' => $route]) }}">
                                        <button
                                            class="inline-block rounded px-4 py-2 text-xs font-medium text-blue-600 hover:underline">View
                                            Detail</button>
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

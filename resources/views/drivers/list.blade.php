@extends('layouts.main')
@section('content')
    <div class="container mx-auto py-8 px-8">
        <h1 class="text-2xl font-bold mb-7">Driver List</h1>
        <a href="{{ route('drivers.create') }}"
            class="inline-block rounded bg-blue-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">Add
            Driver</a>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                            Route No.
                        </th>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                            First Name
                        </th>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                            Last Name
                        </th>
                        <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                            Email
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($drivers as $driver)
                        <tr class="odd:bg-gray-50">
                            {{-- no. --}}
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $loop->iteration }}</td>
                            {{-- First name --}}
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $driver->first_name }}</td>
                            {{-- Last name --}}
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $driver->last_name }}</td>
                            {{-- District --}}
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $driver->email }}</td>
                            {{-- Road --}}
                            <td class="flex justify-center gap-2 px-4 py-2">
                                {{-- <form method="POST" action="{{ route('student.remove', [$student->id]) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit"
                                    class="inline-block rounded bg-red-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">Delete</button>
                            </form> --}}
                                {{-- <a href="{{ url('delete/' . $student->id) }}" --}}
                                <a href="{{ url('edit/driver/' . $driver->id) }}"
                                    class="inline-block rounded bg-amber-500/90 px-4 py-2 text-xs font-medium text-white hover:bg-amber-600">Edit</a>
                                <a href=" {{ url('delete/driver/' . $driver->id) }}"
                                    class="inline-block rounded bg-red-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">Delete</a>
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
            <div class="inline-flex mt-2 mr-4 xs:mt-0">
                <!-- Previous Button -->
                <a href="{{ $drivers->previousPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Previous
                </a>

                <!-- Next Button -->
                <a href="{{ $drivers->nextPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                </a>
            </div>
        </div>
    </div>
@endsection

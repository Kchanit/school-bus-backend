@extends('layouts.main')
@section('content')
    <section>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-2xl font-bold mb-7">Student List</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full text-left divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                                No.
                            </th>
                            <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                                First Name
                            </th>
                            <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                                Last Name
                            </th>
                            <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                                District
                            </th>
                            <th class="whitespace-nowrap text-base font-semibold px-4 py-2 text-gray-900">
                                Road
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($students as $student)
                            <tr class="odd:bg-gray-50">
                                {{-- no. --}}
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $loop->iteration }}</td>
                                {{-- First name --}}
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->first_name }}</td>
                                {{-- Last name --}}
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->last_name }}</td>
                                {{-- District --}}
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->address->district }}</td>
                                {{-- Road --}}
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->address->road }}</td>
                                <td class="flex justify-center px-4 py-2">
                                    {{-- <form method="POST" action="{{ route('student.remove', [$student->id]) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit"
                                            class="inline-block rounded bg-red-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">Delete</button>
                                    </form> --}}
                                    <a href="{{ url('delete/student/' . $student->id) }}"
                                        class="inline-block rounded bg-red-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="flex justify-between items-center mt-6">
                    <!-- Help text -->
                    <span class="text-sm text-gray-700 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-900">{{ $students->currentPage() }}</span> to
                        <span class="font-semibold text-gray-900">{{ $students->perPage() }}</span> of <span
                            class="font-semibold text-gray-900">{{ $students->total() }}</span> Entries
                    </span>
                    <!-- Buttons -->
                    <div class="inline-flex mt-2 mr-4 xs:mt-0">
                        <!-- Previous Button -->
                        <a href="{{ $students->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Previous
                        </a>

                        <!-- Next Button -->
                        <a href="{{ $students->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script type="text/javascript">
            $('.confirm-button').click(function(event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal({
                        title: `Are you sure you want to delete this row?`,
                        text: "It will gone forevert",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script> --}}
    </section>
@endsection

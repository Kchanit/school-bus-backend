@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="POST" id="myForm"
            action="{{ route('routes.update', ['route' => $route->id, 'driver_id' => $driver->id]) }}">
            @csrf
            @method('PUT')
            <div class="flex justify-between mb-12">
                <h1 class="text-2xl font-bold">Reorder route for {{ $driver->getFullName() }}</h1>
                <div class="flex gap-2">
                    <button type="button" id="saveButton">
                        <a href=""
                            class="flex items-center rounded-lg bg-green-500 px-4 py-3 text-center text-xs font-medium text-white hover:bg-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" class="fill-white mr-2"
                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                            Save
                        </a>
                    </button>
                    <a href="{{ route('routes.add-student', ['driver' => $driver]) }}"
                        class="flex items-center rounded-lg bg-blue-600/90 px-4 py-3 text-center text-xs font-medium text-white hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white mr-2"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        Add Student</a>
                </div>
            </div>
            <input type="hidden" name="students_id" id="selectedData" value="">
            {{-- table --}}
            <table id="showTable" class="display">
                <thead>
                    <tr>
                        <th>Order.</th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>District</th>
                        <th>Road</th>
                        <th></th>
                    </tr>
                </thead>
                <Tbody>
                    @foreach ($students as $student)
                        <tr>
                            {{-- No. --}}
                            <td>{{ $student->order }}</td>
                            {{-- Student ID. --}}
                            <td>{{ $student->id }}</td>
                            {{-- First name --}}
                            <td>{{ $student->first_name }}</td>
                            {{-- Last name --}}
                            <td>{{ $student->last_name }}</td>
                            {{-- District --}}
                            <td>{{ $student->address->district }}</td>
                            {{-- Road --}}
                            <td>{{ $student->address->road }}</td>
                            <td>
                                <a href="{{ route('routes.remove-student', ['student' => $student]) }}" type="button"
                                    class="inline-block rounded px-4 py-2 text-xs font-medium text-red-600 hover:underline">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </Tbody>
            </table>
        </form>
    </div>

    @include('common.script')
    <script>
        $(document).ready(function() {
            $('#showTable').DataTable({
                rowReorder: {
                    selector: 'tr',
                    cancelable: true,
                    snapX: true
                },
                columnDefs: [{
                        orderable: true,
                        className: 'reorder',
                        targets: 0
                    },
                    // {
                    //     orderable: false,
                    //     targets: '_all'
                    // }
                ],
                lengthChange: false,
                pagingType: 'simple'
            });

            $('#showTable tbody').on('row-reorder', function(e, diff, edit) {
                // Handle the reordering of rows
                diff.forEach(function(item) {
                    const studentId = $(item.node).find('td:nth-child(2)')
                        .text(); // Assuming the Student ID is in the second column
                    selectedData.push(studentId);
                });
            });

            $('#saveButton').on('click', function() {
                var rowdata = $('#showTable').DataTable().rows().data().toArray();
                var data = []
                for (var i = 0; i < rowdata.length; i++) {
                    data.push(rowdata[i][1])
                }

                $('#selectedData').val(data);
                console.log($('#selectedData').val());
                $('#myForm').submit();
            });
        })
    </script>
@endsection

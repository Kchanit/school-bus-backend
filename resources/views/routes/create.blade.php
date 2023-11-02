@extends('layouts.main')
@section('content')
    <section>
        <form method="POST" id="myForm" action="{{ route('routes.store', ['driver_id' => $driver->id]) }}">
            @csrf
            {{-- table --}}
            <div class="container mx-auto px-4  sm:px-6 lg:px-8 py-8">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-bold mb-7">Select students for <span
                            class="text-blue-600">{{ $driver->getFullName() }}</span></h1>
                    <div>
                        <button type="button" id="saveButton"
                            class="btn btn-primary flex items-center text-sm  px-4 py-3 bg-green-500 hover:bg-green-700 p-2 rounded-lg text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white mr-2"
                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                            Save</button>

                    </div>
                </div>
                <div class="mb-8">
                    <label for="countries_disabled"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select disabled id="countries_disabled"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <input type="hidden" name="students_id" id="selectedData" value="">

                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>District</th>
                            <th>Road</th>
                        </tr>
                    </thead>
                    <Tbody>
                        @foreach ($students as $student)
                            {{-- <tr class="w-full h-5 overflow-y-auto border"> --}}
                            <tr>
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
                            </tr>
                        @endforeach
                    </Tbody>
                </table>
            </div>
        </form>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link
            href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sl-1.7.0/datatables.min.css"
            rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script
            src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sl-1.7.0/datatables.min.js">
        </script>

        {{-- <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            })
        </script> --}}

        <script>
            $('#myTable tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            function message(message) {
                let el = document.querySelector('#events');
                let div = document.createElement('div');

                div.textContent = message;
                el.prepend(div);
            }

            $(document).ready(function() {
                let table = $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'selectAll',
                        'selectNone',
                        'showSelected',
                    ],
                    pagingType: 'simple',
                    select: {
                        style: 'multi'
                    }
                });

                table.on('select', function(e, dt, type, ix) {
                    var selected = dt.rows({
                        selected: true
                    });
                    if (selected.count() > 5) {
                        dt.rows(ix).deselect();
                    }
                });

                $('#saveButton').on('click', function() {
                    var rowdata = table.rows('.selected').data();
                    var selectedData = [];
                    for (var i = 0; i < rowdata.length; i++) {
                        selectedData.push(rowdata[i][0])
                    }
                    console.log(selectedData);

                    $('#selectedData').val(selectedData);
                    $('#myForm').submit();
                });
            });
        </script>

    </section>
@endsection

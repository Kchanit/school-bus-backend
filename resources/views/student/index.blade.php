@extends('layouts.main')
@section('content')
    <section>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-2xl font-bold mb-7">Student List</h1>

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
                            {{-- no. --}}
                            <td>{{ $loop->iteration }}</td>
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

            <div class="overflow-x-auto">
                {{-- <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                No.
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                First Name
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                Last Name
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                District
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                Road
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($students as $student)
                            <tr class="odd:bg-gray-50">
                                {{-- no. --}}
                {{-- <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $loop->iteration }}</td> --}}
                {{-- First name --}}
                {{-- <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->first_name }}</td> --}}
                {{-- Last name --}}
                {{-- <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->last_name }}</td> --}}
                {{-- District --}}
                {{-- <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->address->district }}</td> --}}
                {{-- Road --}}
                {{-- <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $student->address->road }}</td> --}}
                {{-- <td class="whitespace-nowrap px-4 py-2">

                                    <a href="{{ url('delete/' . $student->id) }}"
                                        class="inline-block rounded bg-red-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>

        @include('common.script')

        <script>
            $(document).ready(function() {
                var table = $('#myTable').DataTable({
                    // dom: 'Bfrtip',
                    // buttons: [
                    //     'copy', 'print',
                    //     'selectAll',
                    //     'selectNone',
                    //     'showSelected',
                    //     {
                    //         text: 'Show Selected',
                    //         action: function() {
                    //             var rowdata = table.rows('.selected').data();
                    //             var msg = '';
                    //             for (var i = 0; i < rowdata.length; i++) {
                    //                 msg += rowdata[i] + ","
                    //             }
                    //             message('[#]' + msg);

                    //             // var rowdata = table.rows({
                    //             //     selected: true
                    //             // }).data();
                    //             // message(rowdata)

                    //         }
                    //     }
                    // ],
                    select: {
                        style: 'multi'
                    }
                });
                $('#myTable').on('click', 'tbody tr', function() {
                    table.row(this).delete({
                        buttons: [{
                                label: 'Cancel',
                                fn: function() {
                                    this.close();
                                }
                            },
                            'Delete'
                        ]
                    });
                });
            });
        </script>
    </section>
@endsection

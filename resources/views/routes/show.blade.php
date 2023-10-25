@extends('layouts.main')
@section('content')
    @include('common.alert')
    <h1>Show Route</h1>
    <h1>
        {{-- {{ $driver->getFullName() }} --}}
        {{ $route->driver->getFullName() }}
    </h1>
    <a href="{{ route('routes.create', ['driver' => $driver]) }}" type="button"
        class="m-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-6  focus:outline-none">Add
        Student</a>

    <table id="showTable" class="display">
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
                <tr>
                    {{-- no. --}}
                    <td>{{ $loop->iteration }}</td>
                    {{-- First name --}}
                    <td>{{ $student->first_name }}</td>
                    {{-- Last name --}}
                    <td>{{ $student->last_name }}</td>
                    {{-- District --}}
                    <td>{{ $student->address->district ?? 'N/A' }}</td>
                    {{-- Road --}}
                    <td>{{ $student->address->road ?? 'N/A' }}</td>
                </tr>
                </tr>
            @endforeach
        </Tbody>
    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link
        href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/rr-1.4.1/sl-1.7.0/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/rr-1.4.1/sl-1.7.0/datatables.min.js">
    </script>
    <script>
        $('#showTable').on('draw.dt', function() {
            alert('Table redrawn');

        });
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
                ]
            });
        })
    </script>
@endsection

@extends('layouts.main')
@section('content')
    {{-- @include('common.alert') --}}
    <h1 id="events">Show Route</h1>
    <h1>
        {{ $driver->getFullName() }}
    </h1>
    <a href="{{ route('routes.create', ['driver' => $driver]) }}" type="button"
        class="m-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-6  focus:outline-none">Add
        Student</a>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="POST" id="myForm"
            action="{{ route('routes.update', ['route' => $route->id, 'driver_id' => $driver->id]) }}">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold mb-7">Reorder route for {{ $driver->getFullName() }}</h1>
            <button type="button" id="saveButton" class="btn btn-primary bg-green-500 p-2 rounded-lg">Save</button>
            <input type="hidden" name="students_id" id="selectedData" value="">
            {{-- table --}}
            <table id="showTable" class="display">
                <thead>
                    <tr>
                        <th></th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>District</th>
                        <th>Road</th>
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
                        </tr>
                    @endforeach
                </Tbody>
            </table>
        </form>
    </div>

    @include('common.script')
    <script>
        function message(message) {
            let el = document.querySelector('#events');
            let div = document.createElement('div');

            div.classList.add('flex', 'items-center', 'p-4', 'mb-4', 'text-green-800', 'rounded-lg', 'bg-green-50')

            div.textContent = message;
            el.prepend(div);
        }
        $('#showTable').on('draw.dt', function() {
            message('💚 success')
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

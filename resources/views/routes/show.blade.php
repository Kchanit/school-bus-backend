@extends('layouts.main')
@section('content')
    {{-- @include('common.alert') --}}
    <h1 id="events">Show Route</h1>
    <h1>
        {{ $driver->getFullName() }}
    </h1>
    {{-- <a href="{{ route('routes.create', ['driver' => $driver]) }}" type="button"
        class="m-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-6  focus:outline-none">Add
        Student</a> --}}

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-7">Reorder route for {{ $driver->getFullName() }}</h1>
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
        })
    </script>
@endsection

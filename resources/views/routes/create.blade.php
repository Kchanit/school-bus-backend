@extends('layouts.main')
@section('content')
    <section>
        <h1>Joined Student</h1>
        <h1>
            {{ $driver->getFullName() }}
        </h1>
        <form method="POST" action="{{ route('routes.store') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Save</button>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            {{-- table --}}
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-2xl font-bold mb-7">Select students for {{ $driver->getFullName() }}</h1>

                <div id="events" class="box text-red-600">
                    Row selected - new information added at the top
                </div>
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
            </div>
        </form>


        @include('common.script')

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
                        {
                            text: 'Show Selected',
                            action: function() {
                                var rowdata = table.rows('.selected').data();
                                var selectedData = [];

                                var msg = '';
                                for (var i = 0; i < rowdata.length; i++) {
                                    msg += rowdata[i] + ","
                                }
                                message('[#]' + msg);

                                for (var i = 0; i < rowdata.length; i++) {
                                    selectedData.push(rowdata[i][0])
                                }
                                console.log(selectedData);



                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('routes.store') }}',
                                    // url: 'http:\/\/localhost/routes/create/1',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        "driver_id": {{ $driver->id }},
                                        "students_id": selectedData,
                                    },
                                    success: function(response, status, xhr) {
                                        console.log(response);
                                    },
                                    error: function(response) {
                                        console.error('Request error with status:', response
                                            .status);
                                    },
                                });

                            }
                        }
                    ],
                    select: {
                        style: 'multi'
                    }
                });
            });
        </script>

    </section>
@endsection

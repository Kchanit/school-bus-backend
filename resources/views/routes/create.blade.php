@extends('layouts.main')
@section('content')
    <section>
        <h1>
            {{ $driver->getFullName() }}
        </h1>
        <h1>Joined Student</h1>

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
                            <td>
                                <div>
                                    <span>
                                        {{ $loop->iteration }}
                                    </span>
                                </div>
                            </td>
                            {{-- First name --}}
                            <td>
                                <div>
                                    <span>
                                        {{ $student->first_name }}
                                    </span>
                                </div>
                            </td>
                            {{-- Last name --}}
                            <td>
                                <div>
                                    <span>
                                        {{ $student->last_name }}
                                    </span>
                                </div>
                            </td>
                            {{-- District --}}
                            <td>
                                <div>
                                    <span>
                                        {{ $student->address->district }}
                                    </span>
                                </div>
                            </td>
                            {{-- Road --}}
                            <td>
                                <div>
                                    <span>
                                        {{ $student->address->road }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </Tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link
            href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sl-1.7.0/datatables.min.css"
            rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script
            src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sl-1.7.0/datatables.min.js">
        </script>

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
                        'copy', 'print',
                        'selectAll',
                        'selectNone',
                        'showSelected',
                        {
                            text: 'Show Selected',
                            action: function() {
                                var rowdata = table.rows('.selected').data();
                                var msg = '';
                                for (var i = 0; i < rowdata.length; i++) {
                                    msg += rowdata[i]
                                }
                                message('[#]' + msg);

                                // var rowdata = table.rows({
                                //     selected: true
                                // }).data();
                                // message(rowdata)

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

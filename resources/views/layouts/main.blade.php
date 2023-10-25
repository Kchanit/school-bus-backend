<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}
    <title>School Bus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
    <main class="bg-white content w-full sm:px-6 md:px-8 lg:px-10 lg:py-4 min-h-screen">
        @yield('content')
    </main>
    @yield('scripts')

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
    {{-- <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/sl-1.7.0/datatables.min.css"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/sl-1.7.0/datatables.min.js"></script> --}}

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script>
        function message(message) {
            let el = document.querySelector('#events');
            let div = document.createElement('div');

            div.textContent = message;
            el.prepend(div);
        }

        let table = new DataTable('#example', {
            dom: 'Bfrtip',
            select: true,
            buttons: [{
                text: 'Get selected data',
                action: function() {
                    let count = table.rows({
                        selected: true
                    }).count();

                    message(count + ' row(s) selected');
                }
            }]
        });

        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'selectAll',
                    'selectNone',
                    'showSelected',
                ],
                select: {
                    style: 'multi'
                }
            });
        });
    </script> --}}
</body>
{{-- @include('layouts.subviews.footer') --}}

</html>

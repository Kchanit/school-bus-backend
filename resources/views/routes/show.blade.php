@extends('layouts.main')
@section('content')

    
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                rowReorder: true
            });
        })
    </script>
@endsection

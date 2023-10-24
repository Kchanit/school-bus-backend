@extends('layouts.main')
@section('content')
    <section>
        This is routes index page.
        @foreach ($students as $student)
            <div>
                Name: {{ $student->first_name }}
            </div>
            <div>
                Address: {{ $student->address->home_address }}
                Address: {{ $student->address->home_latitude }}
            </div>
        @endforeach
    </section>
@endsection

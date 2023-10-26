@extends('layouts.main')
@section('content')
    <h1>
        This is the staff index page
        <div>

            {{-- Name: {{ $staff->first_name }} --}}
        </div>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{ route('routes.manage') }}">Manage Student & Route</a>
        </button>


    </h1>
@endsection

@extends('layouts.main')
@section('content')
    <section>
        <h1 class="">All Drivers</h1>
        <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
            <div class="bg-gray-100 py-2 px-4">
                <h2 class="text-xl font-semibold text-gray-800">Drivers List</h2>
            </div>
            <ul class="divide-y divide-gray-200">
                @foreach ($drivers as $driver)
                    <a href="{{ route('routes.create', ['driver' => $driver]) }}">
                        <li class="flex items-center py-4 px-6">
                            <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration . '.' }}</span>
                            <img class="w-12 h-12 rounded-full object-cover mr-4"
                                src="https://randomuser.me/api/portraits/women/72.jpg" alt="User avatar">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-800">
                                    {{ $driver->first_name . ' ' . $driver->last_name }}
                                </h3>
                                <p class="text-gray-600 text-base">{{ $driver->email }}</p>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </section>
@endsection

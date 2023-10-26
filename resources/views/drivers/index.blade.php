@extends('layouts.main')
@section('content')
    <section>
        <div class="flex flex-col justify-center gap-8 mt-12">
            <h1 class="self-center text-2xl font-semiBold">Select A Driver/Bus</h1>

            <div class="bg-white shadow-md rounded-md overflow-hidden max-w-xl mx-auto">
                <div class="bg-gray-100 py-2 px-4">
                    <h2 class="text-xl font-semibold text-gray-800">Drivers List</h2>
                </div>
                <ul class="divide-y divide-gray-200">
                    @foreach ($drivers as $driver)
                        <a href="{{ route('routes.show', ['driver' => $driver]) }}" class="grid grid-cols-3">
                            <li class="flex col-span-2 items-center py-4 px-6">
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
                            <li class="flex items-center justify-center py-4 px-6">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-800">
                                        {{ $driver->route->id ?? 'No Route' }}
                                    </h3>
                                    <p class="text-gray-600 text-base">{{ $driver->route }}</p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            {{-- pagination --}}
            <div class="inline-flex self-center items-center justify-center gap-3">
                <a href="{{ $drivers->previousPageUrl() }}"
                    class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <p class="text-xs text-gray-900">
                    {{ $drivers->currentPage() }}
                    <span class="mx-0.25">/</span>
                    {{ $drivers->lastPage() }}
                </p>

                <a href="{{ $drivers->nextPageUrl() }}"
                    class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

    </section>
@endsection

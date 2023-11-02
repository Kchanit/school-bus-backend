@extends('layouts.main')
@section('content')
    <section>
        <div class="container mx-auto py-8 px-8">
            <div class="flex justify-between items-baseline">
                <h1 class="text-2xl font-bold mb-7">Route List</h1>
                <div>
                    <a href="{{ route('routes.create') }}"
                        class="flex items-center rounded-lg bg-blue-600/90 px-4 py-3 text-center text-xs font-medium text-white hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="fill-white mr-2"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        Add Route</a>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                <ul class="divide-y divide-gray-200">
                    {{-- @if (count($routes) > 0) --}}
                    @foreach ($routes as $route)
                        <a href="{{ route('routes.show', ['driver' => $route->driver]) }}" class="grid grid-cols-7">
                            <li class="flex col-span-2 items-center justify-center py-4 px-6">
                                <span
                                    class="text-gray-700 text-lg font-medium mr-16 ml-8">{{ $loop->iteration . '.' }}</span>
                                <div class="flex-1">
                                    <h3 class="text-lg text-start font-medium text-gray-800">
                                        Route No.
                                    </h3>
                                    <p class="text-gray-600 text-start text-base">
                                        {{ $route->id ?? 'No Route' }}
                                    </p>
                                </div>
                            </li>
                            <li class="flex  col-span-2 items-center justify-center py-4 px-6">
                                <div class="flex-1">
                                    <h3 class="text-lg text-start font-medium text-gray-800">
                                        Students
                                    </h3>
                                    <p class="text-gray-600 text-start text-base">
                                        {{ $route->students->count() ?? 'No Student' }}
                                    </p>
                                </div>
                            </li>
                            <li class="flex col-span-3 items-center py-4 px-6">
                                <img class="w-12 h-12 rounded-full object-cover mr-4"
                                    src="https://randomuser.me/api/portraits/women/72.jpg" alt="User avatar">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-800">
                                        {{ ($route->driver->first_name ?? 'FirstName') . ' ' . ($route->driver->last_name ?? 'LastName') }}
                                    </h3>
                                    <p class="text-gray-600 text-base">{{ $route->driver->email ?? '' }}</p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                    {{-- @else
                        no route
                    @endif --}}
                </ul>
            </div>
            <div class="flex w-full justify-center mt-8">
                {{-- pagination --}}
                <div class="inline-flex self-center items-center justify-center gap-3">
                    <a href="{{ $routes->previousPageUrl() }}"
                        class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                        <span class="sr-only">Next Page</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <p class="text-xs text-gray-900">
                        {{ $routes->currentPage() }}
                        <span class="mx-0.25">/</span>
                        {{ $routes->lastPage() }}
                    </p>

                    <a href="{{ $routes->nextPageUrl() }}"
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
        </div>

    </section>
@endsection

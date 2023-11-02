@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-7">Dashboard</h1>
        <div class="grid grid-cols-3 grid-rows-3 gap-4 mb-4">
            <div class="flex p-6 gap-3 items-center justify-center h-44 rounded-lg shadow-lg shadow-slate-400 bg-white">
                <div class="flex items-center mr-16 bg-blue-100 py-6 px-8 rounded-full  ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="mb-2 fill-blue-600"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-gray-500">Total Students</h1>
                    <h1 class="text-3xl font-bold">{{ $all_students->count() }}</h1>
                </div>
            </div>
            <div class="flex p-6 gap-3 items-center justify-center h-44 rounded-lg shadow-lg shadow-slate-400 bg-white">
                <div class="flex items-center mr-16 bg-green-100 py-6 px-6 rounded-full  ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="mb-2 fill-green-600"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-gray-500">Total Applicants</h1>
                    <h1 class="text-3xl font-bold">{{ $students->count() }}</h1>
                </div>
            </div>
            <div class="flex p-6 gap-3 items-center justify-center h-44 rounded-lg shadow-lg shadow-slate-400 bg-white">
                <div class="flex items-center mr-16 bg-red-100 py-6 px-6 rounded-full  ">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="mb-2 fill-red-600"
                        viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM472 200H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H472c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-gray-500">Not Assign Route</h1>
                    <h1 class="text-3xl font-bold">{{ $route_stds->count() }}</h1>
                </div>
            </div>
            <div
                class="row-span-2 col-span-2 p-4 flex items-center justify-center rounded-lg shadow-lg shadow-slate-400 bg-white">
                <div class="relative w-full h-96 overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Student Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Route No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    District
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr class="bg-white border-b hover:bg-slate-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $student->getFullName() }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $student->route_id ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $student->address->district }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $student->address->road }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row-span-2 flex flex-col p-4 items-start justify-start shadow-lg rounded-lg bg-white">
                <div class="relative w-full h-64 overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Route No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Driver
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $driver)
                                <tr class="bg-white border-b hover:bg-slate-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $driver->route->id ?? '-' }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $driver->getFullName() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="grid grid-cols-3 gap-4 w-full ml-3 mt-12">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-sm text-gray-500">Available Drivers</h1>
                        <h1 class="text-xl font-bold">{{ $avb_drivers->count() }}</h1>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-sm text-gray-500">Total Drivers</h1>
                        <h1 class="text-xl font-bold">{{ $drivers->count() }}</h1>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h1 class="text-sm text-gray-500">Total Routes</h1>
                        <h1 class="text-xl font-bold">{{ $routes->count() }}</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

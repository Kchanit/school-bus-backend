@extends('layouts.main')
@section('content')
    <section class="flex flex-col container justify-center mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <a href="{{ report('reports.index') }}"
            class="flex items-center w-fit py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100  focus:z-10 focus:ring-4 focus:ring-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                class="bi bi-arrow-left mr-1 stroke-gray-800 hover:fill-blue-700" viewBox="0 0 16 16">
                <path fill-rule="evenodd" stroke-width="0.5"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
            Back</a>
        <div class="flex flex-col w-fit justify-center bg-white rounded-lg shadow-xl mt-2 p-4">
            <h1 class="text-2xl font-bold text-center mt-4">
                Delivery Report
            </h1>

            <div class="flex justify-between px-4 mt-8">
                <div>
                    <h1>Report No: {{ $report->id }}</h1>
                    <h1>Start: {{ \Carbon\Carbon::parse($report->start_time)->format('H:i') }}</h1>
                    <h1>Finished: {{ \Carbon\Carbon::parse($report->end_time)->format('H:i') }}</h1>
                </div>
                <h1>Date: {{ $report->date }}</h1>

                <div class="flex flex-col items-end">
                    <h1 class="">Route No. {{ $report->id }}</h1>
                    <h1>Driver: {{ $report->driver->getFullName() }}</h1>
                </div>
            </div>

            <div class="overflow-x-auto shadow-md rounded-xl mt-8 mx-6">

                <table class="min-w-full text-left divide-y-2 divide-gray-200 bg-white text-md">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="flex items-center whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                Order
                            </th>
                            <th class=" whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                Student
                            </th>
                            <th class=" whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                Address
                            </th>
                            <th class=" whitespace-nowrap text-base font-semibold px-4 py-3 text-gray-900">
                                finished
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($studentReports as $studentReport)
                            <tr class="odd:bg-gray-50 hover:bg-gray-50">
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">{{ $studentReport->student->order }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">
                                    {{ $studentReport->student->getFullName() }}</td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">
                                    {{ $studentReport->student->address->home_address }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-gray-700">
                                    {{ \Carbon\Carbon::parse($studentReport->end_time)->format('H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between px-4 mt-8">
                <div>
                    <h1>Total Students :
                        {{ $report->studentReports->count() . ' from ' . $report->driver->route->students->count() }}
                    </h1>
                </div>

                <div class="flex flex-col items-end">
                    <h1>Total Time: {{ $totalTime }} mins</h1>
                </div>
            </div>
        </div>


    </section>
@endsection

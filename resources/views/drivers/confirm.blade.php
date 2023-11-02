@extends('layouts.main')
@section('content')
    <section class="flex container justify-center mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col justify-center w-1/2 bg-white rounded-lg shadow-xl p-4">
            <h1 class="text-2xl font-bold text-center">
                Create Complete !
            </h1>
            <div class="flow-root m-8">
                <dl class="-my-3 divide-y divide-gray-100 text-sm">

                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">First Name</dt>
                        <dd class="text-gray-700 sm:col-span-2" id="modalFirstName">{{ $driver->first_name }}</dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Last Name</dt>
                        <dd class="text-gray-700 sm:col-span-2" id="modalLastName">{{ $driver->last_name }}</dd>
                    </div>
                    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Email</dt>
                        <dd class="text-gray-700 sm:col-span-2" id="modalEmail">{{ $driver->email }}</dd>
                    </div>
                </dl>
                <div class="gap-6">
                    <h1 class="text-2xl font-bold text-center">
                        Password
                    </h1>
                    <h1 class="text-md text-center">
                        It will only show once, Please save before confirming.
                    </h1>
                    <h1 class="text-2xl text-red-600 font-bold text-center">
                        {{ $password }}
                    </h1>
                </div>
                <a href="{{ route('drivers.list') }}">
                    <button
                        class="block text-white mt-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Confirm
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection

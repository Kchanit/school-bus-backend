@extends('layouts.main')
@section('content')
    <section class="flex container justify-center mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col justify-center w-1/2 bg-white rounded-lg shadow-xl p-4">
            <form action="{{ route('drivers.update', ['driver' => $driver]) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="text-2xl font-bold text-start ">
                    Edit Driver Information
                </h1>
                <div class="space-y-2 mt-6">
                    <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        First Name
                    </label>

                    <input id="firstName" type="text" name="firstName" value="{{ $driver->first_name }}"
                        class="@error('firstName') border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('firstName')
                        <div class=" text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2 mt-6">
                    <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Last Name
                    </label>

                    <input id="lastName" type="text" name="lastName" value="{{ $driver->last_name }}"
                        class="@error('lastName') border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('lastName')
                        <div class=" text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2 mt-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>

                    <input id="email" type="text" name="email" value="{{ $driver->email }}" disabled
                        class=" mb-4 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed">
                </div>
                <div class="flex justify-end ">
                    <button>
                        <div type="submit"
                            class="block text-white mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Confirm
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

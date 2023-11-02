@extends('layouts.main')
@section('content')
    <section class="flex justify-center">
        <div class="flex flex-col w-1/2 ">
            <form action="{{ route('drivers.update', ['driver' => $driver]) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="text-2xl font-bold text-center pt-10">
                    Edit Driver Information
                </h1>
                <div class="space-y-2">
                    <label for="firstName" class="inline-block text-sm font-medium text-gray-800 mt-4 dark:text-gray-200">
                        First Name
                    </label>

                    <input id="firstName" type="text" name="firstName" value="{{ $driver->first_name }}"
                        class="@error('firstName') border-red-400 @enderror py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                    @error('firstName')
                        <div class=" text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="lastName" class="inline-block text-sm font-medium text-gray-800 mt-4 dark:text-gray-200">
                        Last Name
                    </label>

                    <input id="lastName" type="text" name="lastName" value="{{ $driver->last_name }}"
                        class="@error('lastName') border-red-400 @enderror py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                    @error('lastName')
                        <div class=" text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="email" class="inline-block text-sm font-medium text-gray-800 mt-4 dark:text-gray-200">
                        Email
                    </label>

                    <input id="email" type="text" name="email" value="{{ $driver->email }}" disabled
                        class=" mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed">
                </div>
                <div class="flex justify-end ">
                    <button class="mt-8">
                        <div type="submit"
                            class="inline-block rounded bg-blue-600 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">
                            Confirm
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

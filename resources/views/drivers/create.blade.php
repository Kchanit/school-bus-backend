@extends('layouts.main')
@section('content')
    <section class="flex justify-center">
        <div class="flex flex-col justify-center w-1/2">
            <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="text-2xl font-bold text-center pt-10">
                    Create new driver
                </h1>
                <div class="space-y-2">
                    <label for="firstName" class="inline-block text-sm font-medium text-gray-800 mt-4 dark:text-gray-200">
                        First Name
                    </label>

                    <input id="firstName" type="text" name="firstName" value="{{ old('firstName', '') }}"
                        class="@error('firstName') border-red-400 @enderror py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Enter driver first name">
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

                    <input id="lastName" type="text" name="lastName" value="{{ old('lastName', '') }}"
                        class="@error('lastName') border-red-400 @enderror py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Enter driver last name">
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

                    <input id="email" type="text" name="email" value="{{ old('email', '') }}"
                        class="@error('email') border-red-400 @enderror py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Enter driver email">
                    @error('email')
                        <div class=" text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="flex justify-end ">
                    <button class="mt-8">
                        <div type="submit"
                            class="inline-block rounded bg-blue-600/90 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700">
                            Create
                        </div>
                    </button>
                </div> --}}
            </form>
            <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                class="block text-white mt-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Create
            </button>
        </div>


        <!-- Modal toggle -->
        {{-- <button data-modal-target="staticModal" data-modal-toggle="staticModal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Toggle modal
        </button> --}}

        <!-- Main modal -->
        @include('components.modals')

    </section>
@endsection

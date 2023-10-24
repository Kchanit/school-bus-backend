@extends('layouts.main')
@section('content')
    <section>
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
                    placeholder="Enter driver firt name">
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
            <button>
                <a type="submit">
                    Create
                </a>
            </button>
        </form>
    </section>
@endsection

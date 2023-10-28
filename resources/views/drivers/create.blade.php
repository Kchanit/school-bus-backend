@extends('layouts.main')
@section('content')
    <section class="flex justify-center">
        <div class="flex flex-col justify-center w-1/2">
            <form id="createDriverForm" action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
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


                {{-- Profile Image --}}
                <label for="image_url" class="inline-block text-sm font-medium text-gray-800 mt-4 dark:text-gray-200">
                    Profile image
                </label>
                <label for="image_url"
                    class="@error('image_url') border-red-400 @enderror group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-gray-700">
                    <input id="image_url" name="image_url" type="file" class="sr-only" accept="image/*"
                        onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0]); document.getElementById('preview').style.display = 'block'; document.getElementById('upload').style.display = 'none';">
                    <img id="preview" class="hidden max-h-[400px] mx-auto shadow-md rounded-lg">
                    <div id="upload">
                        <svg class="w-10 h-10 mx-auto text-gray-400 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                            <path
                                d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                        </svg>
                        <span class="upload-text mt-2 block text-sm text-gray-800 dark:text-gray-200">
                            Browse your device and upload a file.
                        </span>

                    </div>
                </label>
                @error('image')
                    <div class=" text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </form>
            <button data-modal-target="staticModal" data-modal-toggle="staticModal" onclick="showConfirmationModal()"
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


    </section>
    <!-- Main modal -->
    @include('components.modals')
    <script>
        function showConfirmationModal() {
            // Get the form data
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;

            // Populate the modal content with the form data
            document.getElementById('modalFirstName').textContent = firstName;
            document.getElementById('modalLastName').textContent = lastName;
            document.getElementById('modalEmail').textContent = email;
            // You can add more fields here

            // Show the modal
            // const modal = document.getElementById('staticModal');
            // modal.style.display = 'block';
        }

        function hideConfirmationModal() {
            // Hide the modal
            const modal = document.getElementById('staticModal');
            modal.style.display = 'none';
        }

        // Add event listeners for the "Confirm" and "Cancel" buttons
        document.querySelector('[data-modal-hide="staticModal"]').addEventListener('click', hideConfirmationModal);

        document.getElementById('confirmCreate').addEventListener('click', function() {
            document.getElementById('createDriverForm').submit();
        });

</script>
@endsection

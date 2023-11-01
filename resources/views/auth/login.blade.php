<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('staff.login') }}">
        @csrf
        <div class="text-center mt-4">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
            {{-- <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Don't have an account yet?
                <a class="text-blue-600 decoration-2 hover:underline font-medium" href="{{ route('register') }}">
                    Sign up here
                </a>
            </p> --}}
        </div>
        <div class="mt-5">

            <!-- Email Address -->
            <div>
                <x-input-label class="block text-sm mb-2 dark:text-white" for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="flex justify-between">
                    <x-input-label class="block text-sm mb-2 dark:text-white" for="password" :value="__('Password')" />
                    @if (Route::has('password.request'))
                        {{-- <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium"
                            href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a> --}}
                    @endif
                </div>
                <x-text-input id="password" class="block w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">

                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <button type="submit"
                class="mt-4 mb-2 py-3 px-4 w-full text-white inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                Sign in
            </button>

    </form>
</x-guest-layout>

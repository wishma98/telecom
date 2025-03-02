<x-guest-layout>
    <!-- Page Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        {{ __('Reset Your Password') }}
    </h2>

    <!-- Form Container -->
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token (Hidden Input) -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="email"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="email" name="email" :value="old('email', $request->email)" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>


            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('New Password')"
                    class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="password"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="password" name="password" required autocomplete="new-password"
                    placeholder="Enter a new password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm New Password')"
                    class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="password_confirmation"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Confirm your new password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <x-primary-button
                    class="w-full flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
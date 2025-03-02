<x-guest-layout>
    <!-- Page Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">
        {{ __('Forgot Your Password?') }}
    </h2>

    <!-- Description -->
    <div class="mb-6 text-sm text-gray-600 text-center">
        {{ __('No problem. Just let us know your email address, and we’ll email you a password reset link to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
        :status="session('status')" />

    <!-- Form Container -->
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Input Field -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email Address')" class="block text-gray-700 font-medium mb-2" />
                <x-text-input id="email"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button
                    class="w-full flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
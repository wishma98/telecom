<x-guest-layout>
    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">
        {{ __('Confirm Your Password') }}
    </h2>
    <div class="mb-6 text-sm text-gray-600 text-center">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="block text-gray-700 font-medium mb-2" />

                <x-text-input id="password"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="flex justify-end">
                <x-primary-button
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>
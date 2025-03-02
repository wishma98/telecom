<section>
    <header>
        <h2 class="text-2xl font-semibold text-gray-800">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password Field -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')"
                class="block text-sm font-medium text-gray-700" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')"
                class="mt-2 text-sm text-red-600" />
        </div>

        <!-- New Password Field -->
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')"
                class="block text-sm font-medium text-gray-700" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Confirm Password Field -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"
                class="block text-sm font-medium text-gray-700" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Save Button and Status Message -->
        <div class="flex items-center gap-4">
            <x-primary-button
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
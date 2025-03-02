<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Admin View Accounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Logged-in Message -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="text-center text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Main Content -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                    View Accounts
                </h1>

                <!-- Example Content -->
                <div class="space-y-4">
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700">view message</p>
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
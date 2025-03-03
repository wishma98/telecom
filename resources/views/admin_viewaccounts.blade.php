<x-app-layout>
    <header>
        <title>Admin View Accounts</title>
        <style>
        .back-button {
            position: absolute;
            top: 200px;
            left: 20px;
        }

        .back-button a {
            background: linear-gradient(135deg, #08d43b, #1a47c4);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .back-button a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }
        </style>
        </head>

        <body>
            <!-- Back Button -->
            <div class="back-button">
                <a href="{{ route('admin_dashboard') }}"
                    class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300 ease-in-out">
                    Back
                </a>
            </div>
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
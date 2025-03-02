<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Admin View Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Message View</title>
        <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Message Grid Container */
        .messages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Message Box Styling */
        .message-box {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-image: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }

        .message-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .message-header {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .message-date {
            font-size: 0.875rem;
            color: #e0e0e0;
            margin-bottom: 15px;
        }

        .message-content {
            font-size: 1rem;
            line-height: 1.5;
            color: #f0f0f0;
        }

        /* Logout Button Styling */
        .logout-button {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #6a11cb;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .logout-button:hover {
            background-color: #2575fc;
            transform: translateY(-2px);
        }
        </style>
    </head>

    <body>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">View Messages</h1>

            <!-- Messages Grid -->
            <div class="messages-grid">
                @foreach($messages as $message)
                <div class="message-box">
                    <div class="message-header">Technician ID: {{ $message->service_id }}</div>
                    <div class="message-date">Date: {{ $message->date_time }}</div>
                    <div class="message-content">{{ $message->message }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">
                {{ __('Log Out') }}
            </button>
        </form>
    </body>

    </html>
</x-app-layout>
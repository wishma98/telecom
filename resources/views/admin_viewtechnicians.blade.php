<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Admin View Technicians') }}
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
        <title>Admin Technician View</title>
        <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Heading Styling */
        .h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            color: #333;
            text-align: center;
            margin: 20px 0;
            letter-spacing: 2px;
            font-weight: 600;
            text-transform: uppercase;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            color: transparent;
        }

        /* Wrapper for Technician Cards */
        .wrapper {
            display: grid;
            justify-content: center;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Technician Card Styling */
        .panel-box {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-image: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }

        .panel-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .panel-box h3 {
            margin-bottom: 10px;
            font-size: 1.25rem;
            font-weight: 600;
            color: #fff;
        }

        .panel-box p {
            font-size: 1rem;
            margin: 5px 0;
            color: #f0f0f0;
        }

        /* Logout Button Styling */
        .logout-btn {
            text-align: center;
            margin: 20px auto;
            padding: 20px;
        }

        .logout-btn form {
            display: inline-block;
        }

        .logout-btn button {
            background-color: #6a11cb;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .logout-btn button:hover {
            background-color: #2575fc;
            transform: translateY(-2px);
        }

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
        <h1 class="h1">Technicians</h1>

        <!-- Technician Cards Grid -->
        <div class="wrapper">
            @foreach($technicians as $technician)
            <div class="panel-box">
                <h3>Technician ID: {{ $technician->service_id }}</h3>
                <p><strong>Name:</strong> {{ $technician->name }}</p>
                <p><strong>Contact Number:</strong> {{ $technician->contact_number }}</p>
                <p><strong>Email:</strong> {{ $technician->email }}</p>
            </div>
            @endforeach
        </div>

        <!-- Logout Button -->
        <div class="logout-btn">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>
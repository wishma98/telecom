<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .admin-panel-title {
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

        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
        }

        .panel-box {
            width: 30%;
            background-color: #ffffff;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-align: center;
            font-size: 18px;
            color: #333;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .panel-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .panel-box h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
        }

        .panel-box button {
            padding: 12px 24px;
            font-size: 16px;
            color: white;
            background-color: #6a11cb;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            background-image: linear-gradient(45deg, #6a11cb, #2575fc);
        }

        .panel-box button:hover {
            background-color: #2575fc;
            transform: scale(1.05);
        }

        .panel-box button a {
            color: white;
            text-decoration: none;
        }

        .technician-count-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
            margin: 0 auto;
            background-color: #2575fc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .technician-count-circle:hover {
            transform: scale(1.1);
        }

        .success-message {
            padding: 15px;
            margin: 20px 0;
            background-color: #4caf50;
            color: white;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        .count-circle {
            position: relative;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
            margin: 0 auto;
            background-color: #333;

            /* Animated Border */
            border: 4px solid transparent;
            padding: 6px;
            background-image: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn);
            background-origin: border-box;
            background-clip: padding-box, border-box;
            animation: borderRotate var(--d) linear infinite forwards;
        }

        .count-circle:hover {
            transform: scale(1.1);
        }

        /* Background colors for different count ranges */
        .count-circle.green {
            background-color: green;
        }

        .count-circle.orange {
            background-color: orange;
        }

        .count-circle.red {
            background-color: red;
        }

        /* Keyframes to animate the border */
        @keyframes borderRotate {
            100% {
                --angle: 450deg;
            }
        }

        @property --angle {
            syntax: '<angle>';
            initial-value: 90deg;
            inherits: true;
        }

        :root {
            --d: 2500ms;
            --angle: 90deg;
            --c1: rgba(168, 239, 255, 1);
            --c2: rgba(168, 239, 255, 0.1);
        }
        </style>
    </head>

    <body>
        <h1 class="admin-panel-title">Admin Panel</h1>

        <div class="container">
            <div class="panel-box">
                <h2>Add Clouers</h2>
                <div class="count-circle {{ $clouserCount > 10 ? 'green' : ($clouserCount >= 5 ? 'orange' : 'red') }}">
                    {{ $clouserCount }}
                </div></br>
                <button><a href="{{ url('/add-clouersbyadmin') }}">Add Clouers</a></button>
            </div>
            <div class="panel-box">
                <h2>New Messages</h2>
                <div class="technician-count-circle">
                    {{ $totalTMessages }}
                </div></br>
                <button><a href="{{ route('viewMessages') }}">View Messages</a></button>
            </div>
            <div class="panel-box">
                <h2>Total Technicians</h2>
                <div class="technician-count-circle">
                    {{ $totalTechnicians }}
                </div></br>
                <button><a href="{{ route('viewTechnicians') }}">View Technicians</a></button>
            </div>
            <div class="panel-box">
                <h2>Total Admins</h2>
                <div class="technician-count-circle">
                    {{ $totalAdmins }}
                </div></br>
                <button><a href="{{ route('viewAdmins') }}">View Admins</a></button>
            </div>
            <div class="panel-box">
                <h2>Total Accounts</h2>
                <div class="technician-count-circle">
                    {{ $totalAccounts }}
                </div></br>
                <button><a href="{{ route('viewAccounts') }}">View Accounts</a></button>
            </div>
            <div class="panel-box">
                <h2>Example</h2>
                <button><a href="{{ route('example') }}">Example</a></button>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();" class="logout-button">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </body>

    </html>
</x-app-layout>
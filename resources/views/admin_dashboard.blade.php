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

        /* Import Google Font for a stylish look */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');

.admin-panel-title {
    font-family: 'Brodway', sans-serif;
    font-size: 2.5rem; /* Adjust size to your preference */
    color: #333; /* Dark gray color */
    text-align: center;
    margin: 20px 0;
    letter-spacing: 2px; /* Adds spacing between letters for a modern look */
    font-weight: 600;
    text-transform: uppercase; /* Makes text all uppercase */
    background: linear-gradient(45deg, #4e54c8, #8f94fb); /* Gradient text color */
    -webkit-background-clip: text;
    color: black;
}

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .panel-box {
            width: 30%;
            background-color: #c1ebf7;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            color: #333;
            background-image:linear-gradient(#d5f0f7,#8ee0f5 50%,#43cdf0);
        }
        .panel-box h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #333;
        }
        .panel-box button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-image:linear-gradient(#AF40FF,#5B42F3 50%,#00DDEB);
            
        }
        .panel-box button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1 class="admin-panel-title">Admin Panel</h1>


    <div class="container">
        <div class="panel-box">
            <h2>Add Clouers</h2>
            <!-- Display the total count in a colored circle based on the count -->
            <div class="count-circle {{ $clouserCount > 10 ? 'green' : ($clouserCount >= 5 ? 'orange' : 'red') }}">
                {{ $clouserCount }}
            </div></br>
            <button><a href="{{ url('/add-clouersbyadmin') }}">Add Clouers</a></button>
            
        </div>
        <div class="panel-box">
            <h2>New Messages </h2>
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

    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
    
</form>


<style>

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
        /* .count-circle {
            width: 80px;
            height: 80px;
            border-radius: 35%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
            margin: 0 auto;
        } */

        /* Style for the count-circle with animated border */
.count-circle {
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: 35%; /* Creates rounded rectangle shape */
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: white;
    margin: 0 auto;
    background-color: #333;

    /* Animated Border */
    border: 4px solid transparent; /* Transparent border to use gradient as border */
    padding: 6px;
    background-image: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn);
    background-origin: border-box;
    background-clip: padding-box, border-box;
    animation: borderRotate var(--d) linear infinite forwards;
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

        .technician-count-circle{
            width: 80px;
            height: 80px;
            border-radius: 35%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color:white;
            margin: 0 auto;
            background-color: #110875;
        }

    </style>

---------------
</x-app-layout>
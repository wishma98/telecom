<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin_View Technician') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
    <title><h1>Admin technician View</h1></title>

    <style>

         /* Import Google Font for a stylish look */
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');

.h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 2.5rem; /* Adjust size to your preference */
    color: #333; /* Dark gray color */
    text-align: center;
    margin: 20px 0;
    letter-spacing: 2px; /* Adds spacing between letters for a modern look */
    font-weight: 600;
    text-transform: uppercase; /* Makes text all uppercase */
    background: linear-gradient(45deg, #4e54c8, #8f94fb); /* Gradient text color */
    -webkit-background-clip: text;
    color: black;;
}
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .panel-box {
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            width: 250px;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s;
            background-image:linear-gradient(#d5f0f7,#8ee0f5 50%,#43cdf0);
        }
        .panel-box:hover {
            transform: translateY(-10px);
        }
        .panel-box h3 {
            margin-bottom: 10px;
            font-size: 1.25rem;
            color: #4CAF50;
        }
        .panel-box p {
            font-size: 1rem;
            margin: 5px 0;
            color: #333;
        }
        .logout-btn {
            text-align: center;
            margin-top: 20px;
        }
        .logout-btn form {
            display: inline-block;
        }
    </style>
  

</head>
<body>
    <h1  class="h1">Technicians</h1>
  
    <!-- <table>
        <thead>
            <tr>
                
                <th>service_id</th>
                <th>name</th>
                <th>contact_number</th>
                 <th>email</th>
                
                
            </tr>
        </thead>
    </table>
        <tbody> -->
        <div class="wrapper">
                @foreach($technicians as $technician) <!-- Loop through the $clousers collection -->
                <div class="panel-box">
                
                <p><strong>Technician ID:</strong> {{ $technician->service_id }}</p>
                <p><strong>Name:</strong> {{ $technician->name }}</p>
                <p><strong>Contact Number:</strong> {{ $technician->contact_number }}</p>
                <p><strong>Email:</strong> {{ $technician->email }}</p>
                   
                    <!-- <td>{{ $technician->service_id }}</td>
                    <td>{{  $technician->name }}</td>
                    <td>{{ $technician->contact_number }}</td>
                    <td>{{ $technician->email }}</td>
    </div>
                    
                </tr> -->
    </div>
                @endforeach
    </div>
    



   

    <div class="logout-btn">
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
    
</form>
    </div>
---------------
</x-app-layout>
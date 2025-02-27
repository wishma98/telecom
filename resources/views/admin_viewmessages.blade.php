 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin_View Messages') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->

 

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><h1>Admin Message View></h1></title>


    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Message Box Styling */
        .message-box {
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s;
            background-image: linear-gradient(#d5f0f7, #8ee0f5 50%, #43cdf0);
            margin: 10px;
        }

        .message-box:hover {
            transform: scale(1.05);
        }

        .message-header {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .message-date {
            font-size: 0.875rem;
            color: #666;
            margin-bottom: 15px;
        }

        .message-content {
            font-size: 1rem;
            color: #333;
        }

        /* Responsive Grid */
        .messages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 16px;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
    </style>
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">View Messages</h1>

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
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
    
</form>

---------------
</x-app-layout> 




 

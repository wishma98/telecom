<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Add Clouser') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 800px;
            margin: 150px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Styles */
        label {
            font-weight: 600;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="datetime-local"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="datetime-local"]:focus,
        select:focus,
        textarea:focus {
            border-color: #6a11cb;
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        /* Button Styles */
        .buttons {
            background-image: linear-gradient(144deg, #6a11cb, #2575fc);
            border: none;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 0 10px;
        }

        .buttons:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(106, 17, 203, 0.3);
        }

        .button-63 {
            background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
            border: none;
            border-radius: 8px;
            color: white;
            padding: 15px 24px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .button-63:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(151, 65, 252, 0.3);
        }

        /* Error Message Styles */
        .error-message {
            color: #ff4444;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Center Align Buttons */
        .center-buttons {
            text-align: center;
            margin-top: 20px;
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

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-7xl mx-auto mb-4"
            role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <div class="container">
            <form action="{{ route('dashboard.store') }}" method="post">
                @csrf

                <!-- Clouser ID -->
                <label for="clname">Clouser ID</label>
                @error('clouserID')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" id="clname" name="clouserID" placeholder="Enter Clouser ID...">

                <!-- Service ID -->
                <label for="sid">Service ID</label>
                @error('serviceID')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" id="sid" name="serviceID" value="{{ Auth::user()->service_id }}"
                    placeholder="Enter Your Service ID...">

                <!-- Clouser Category -->
                <label for="category">Clouser Category</label>
                <select id="category" name="category">
                    <option value="new">New</option>
                    <option value="fault">Fault</option>
                    <option value="re">Re</option>
                </select>

                <!-- Clouser Type -->
                <label for="type">Clouser Type</label>
                <select id="type" name="clouserType">
                    <option value="ribbon">Ribbon</option>
                    <option value="non_ribbon">Non Ribbon</option>
                </select>

                <!-- Clouser Amount -->
                <label for="amount">Clouser Amount</label>
                <input type="text" id="amount" name="amount" placeholder="Enter Clouser Amount">

                <!-- Location -->
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter Location">

                <!-- Date & Time -->
                <label for="date">Date & Time</label>
                <input type="datetime-local" id="date" name="date" placeholder="Enter Date">

                <!-- Message -->
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write Message Here.."></textarea>

                <!-- Submit and Reset Buttons -->
                <div class="center-buttons">
                    <input type="submit" class="buttons" value="Submit">
                    <input type="reset" class="buttons" value="Reset">
                </div>
            </form>

            <!-- View Clouser Details Button -->
            <div class="center-buttons">
                <a href="{{ route('go_Clouserdetails') }}" class="button-63">View Clouser Details</a>
            </div>
        </div>
    </body>

    </html>
</x-app-layout>
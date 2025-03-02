<x-app-layout>
    <x-slot name="header" class="absolute w-full top-[10%] z-50 shadow-lg">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Technician Dashboard') }}
        </h2>
    </x-slot>

    <head>
        <style>
        /* Apply a light blue background to the entire page */
        body {
            background-color: #e3f2fd;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Background image container with smooth transitions */
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            /* opacity: 0.7; */
        }

        .background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .background-image.active {
            opacity: 1;
        }

        /* Semi-transparent overlay for the form container */
        .container {
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            margin: 250px auto;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 10;
            opacity: 1;
        }

        /* Style inputs and textareas */
        input[type="text"],
        select,
        textarea,
        input[type="datetime-local"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #90caf9;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255);
            font-size: 14px;
        }

        /* Style the buttons */
        input[type="submit"],
        input[type="reset"] {
            background-image: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin: 10px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for buttons */
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #1565c0;
            /* Darker blue */
        }

        /* Style form headings */
        h1 {
            color: #1565c0;
            /* Dark blue */
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Style labels */
        label {
            color: #4a4843;
            /* Dark blue */
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* Style success messages */
        .success-message {
            text-align: center;
            background-color: #81c784;
            color: white;
            padding: 10px;
            margin: 10px auto;
            border-radius: 6px;
            max-width: 600px;
        }

        /* Add spacing around form elements */
        form>* {
            margin-bottom: 16px;
        }

        form p.error-message {
            color: red;
            font-size: 12px;
            margin-top: 4px;
        }

        /* Logged-in message styling */
        .logged-in-message {
            text-align: center;
            background-color: rgba(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        </style>
    </head>

    <body>
        <div class="absolute inset-0 top-[9%] h-[180vh] bg-black bg-opacity-30 z-10"></div>
        <!-- Background image container -->
        <div class="background-container">
            <img class="background-image active" src="{{ asset('image/h1.jpg') }}" alt="Background Image 1">
            <img class="background-image" src="{{ asset('image/h2.jpg') }}" alt="Background Image 2">
            <img class="background-image" src="{{ asset('image/h3.jpg') }}" alt="Background Image 3">
            <img class="background-image" src="{{ asset('image/h4.jpg') }}" alt="Background Image 4">
        </div>

        <!-- Logged-in message -->
        <div class="py-12 absolute top-[10%] w-full z-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="logged-in-message">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <!-- Success message -->
        @if(session('success'))
        <div class="success-message relative z-10">
            {{ session('success') }}
        </div>
        @endif

        <!-- Form container -->
        <div class="container">

            <form action="{{ route('dashboard') }}" method="post">
                @csrf
                <h1>GENERAL INFORMATION</h1>

                <!-- Form fields -->
                <label for="clouserID">Clouser ID</label>
                @error('clouserID')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" id="clouserID" name="clouserID" placeholder="Enter Clouser ID...">

                <label for="sid">Service ID</label>
                @error('serviceID')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" id="sid" name="serviceID" value="{{ Auth::user()->service_id }}"
                    placeholder="Enter Your Service ID...">

                <label for="category">Clouser Category</label>
                <select id="category" name="category">
                    <option value="new">New</option>
                    <option value="fault">Fault</option>
                    <option value="re">Re</option>
                </select>

                <label for="type">Clouser Type</label>
                <select id="type" name="clouserType">
                    <option value="ribbon">Ribbon</option>
                    <option value="non_ribbon">Non Ribbon</option>
                </select>

                <label for="amount">Clouser Amount</label>
                <input type="text" id="amount" name="amount" placeholder="Enter Clouser Amount">

                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter Location">

                <label for="nooflocation">Number Of Locations</label>
                <select id="nooflocation" name="nooflocation">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <label for="connectiontype">Connection Type</label>
                <select id="connectiontype" name="connectiontype">
                    <option value="New">New</option>
                    <option value="Maintainance">Maintenance</option>
                </select>

                <label for="date">Date & Time</label>
                <input type="datetime-local" id="date" name="date" placeholder="Enter Date">

                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write Message Here.."
                    style="height:150px"></textarea>

                <!-- Buttons -->
                <div class="buttons" align="center">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>

        <!-- JavaScript for background image transitions -->
        <script>
        const images = document.querySelectorAll('.background-image');
        let currentIndex = 0;

        function changeBackgroundImage() {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        }

        // Change image every 5 seconds
        setInterval(changeBackgroundImage, 5000);
        </script>
    </body>
</x-app-layout>
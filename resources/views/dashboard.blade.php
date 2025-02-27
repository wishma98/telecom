<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Technician Dashboard') }}
            <img id="headerImage" src="{{ asset('image/h1.jpg') }}" alt="Rotating Header">
        </h2>
    </x-slot>
    <head>
        <style>
            /* Apply a light blue background to the entire page */
            body {
                background-color: #e3f2fd; /* Light blue */
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            /* Header image styling */
            #headerImage {
                width: 100%; /* Ensure the image spans the full width */
                height: auto; /* Maintain aspect ratio */
                display: block;
                object-fit: cover; /* Ensure image covers space without distortion */
            }

            /* Center the main container */
            .container {
                border-radius: 10px;
                background-color: #bbdefb; /* Soft blue */
                padding: 20px;
                margin: 20px auto;
                max-width: 600px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background-image:linear-gradient(#d5f0f7,#8ee0f5 50%,#43cdf0);
            }

            /* Style inputs and textareas */
            input[type=text], select, textarea, input[type=datetime-local] {
                width: 100%;
                padding: 12px;
                margin-bottom: 16px;
                border: 1px solid #90caf9; /* Light blue border */
                border-radius: 6px;
                box-sizing: border-box;
                background-color: #e3f2fd; /* Light blue background */
            }

            /* Style the buttons */
            input[type=submit], input[type=reset] {
              background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                margin: 10px;
            }

            /* Hover effect for buttons */
            input[type=submit]:hover, input[type=reset]:hover {
                background-color: #1565c0; /* Darker blue */
            }

            /* Style form headings */
            h1 {
                color: #1565c0; /* Dark blue */
                text-align: center;
            }

            /* Style labels */
            label {
                color: #4a4843;  /* Dark blue */
                font-weight: bold;
                display: block;
                margin-bottom: 8px;
            }

            /* Style success messages */
            .success-message {
                text-align: center;
                background-color: #81c784; /* Green for success */
                color: white;
                padding: 10px;
                margin: 10px auto;
                border-radius: 6px;
                max-width: 600px;
            }

            /* Add spacing around form elements */
            form > * {
                margin-bottom: 16px;
            }

            form p.error-message {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>


        <script>
            // Array of header images
            let images = [
                "{{ asset('image/h1.jpg') }}",
                "{{ asset('image/h2.jpg') }}",
                "{{ asset('image/h3.jpg') }}",
                "{{ asset('image/h4.jpg') }}"
            ];
            let currentIndex = 0;

            function changeHeaderImage() {
                currentIndex = (currentIndex + 1) % images.length;
                document.getElementById("headerImage").src = images[currentIndex];
            }

            // Change image every 5 seconds
            setInterval(changeHeaderImage, 5000);
        </script>


        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="container">
            <form action="{{  route('dashboard') }}" method="post">
                @csrf
                <h1>GENERAL INFORMATION</h1>

    <label for="clouserID">Clouser ID</label>
    @error('clouserID')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="text" id="clouserID" name="clouserID" placeholder=" Enter Clouser ID...">

    <label for="sid">Service_ID</label>
    @error('serviceID')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="text" id="sid" name="serviceID" value="{{ Auth::user()->service_id }}" placeholder=" Enter Your Service ID...">

    <label for="category"> Clouser Category</label>
    <select id="category" name="category">
      <option value="new">New</option>
      <option value="fault">Fault</option>
      <option value="re">Re</option>
    </select>

    <label for="type"> Clouser Type</label>
    <select id="type" name="clouserType">
      <option value="ribbon">Ribbon</option>
      <option value=" non_ribbon">Non Ribbon</option>
    </select>

    <label for="amount">Clouser Amount </label>
    <input type="text" id="amount" name="amount" placeholder="Enter clouser amount">

    <label for="location">Location </label>
    <input type="text" id="location" name="location" placeholder="Enter Location">

    <label for="type">Number Of Location</label>
                <select id="nooflocation" name="nooflocation">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <label for="type">Connection Type</label>
                <select id="connectiontype" name="connectiontype">
                    <option value="New">New</option>
                    <option value="Maintainance">Maintainance</option>
                </select>

    <label for="date">Date & Time </label>
    <input type="datetime-local" id="date" name="date" placeholder="Enter Date"></br>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write Message Here.." style="height:150px"></textarea>

   
                <div class="buttons" align="center">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>
    </body>
</x-app-layout>

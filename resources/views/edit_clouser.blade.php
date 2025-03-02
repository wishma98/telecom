<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Clouser Add') }}
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
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <style>
        /* Form Container */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9fafb;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Form Inputs */
        input[type="text"],
        input[type="datetime-local"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Labels */
        label {
            font-weight: 600;
            color: #374151;
            margin-top: 10px;
            display: block;
        }

        /* Buttons */
        .form-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #3b82f6;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #2563eb;
        }

        /* Success Message */
        .success-message {
            background-color: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Link to View Closure Details */
        .view-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }

        .view-link:hover {
            text-decoration: underline;
        }
        </style>


    </head>

    <body>

        @if(session('success'))

        <div>{{session('success')}}</div>

        @endif

        <!-- Form Container -->
        <div class="form-container">

            <form action="{{ url('update_clouser', $clouserDetails->id) }}" method="post">

                @csrf

                <label for="id">Clouser ID</label>
                <input type="text" id="fname" name="clouserID" value="{{ $clouserDetails->clouser_ID }}"
                    placeholder=" Enter Clouser ID...">

                <label for="sid">Service_ID</label>
                <input type="text" id="sid" name="serviceID" value="{{ $clouserDetails->technician_ID }}"
                    placeholder="  Enter Your Service ID...">

                <label for="category"> Clouser Category</label>

                <select id="category" name="category">
                    <option value="new"
                        {{ (isset($clouserDetails) && $clouserDetails->category == 'new') ? 'selected' : '' }}>New
                    </option>
                    <option value="fault"
                        {{ (isset($clouserDetails) && $clouserDetails->category == 'fault') ? 'selected' : '' }}>Fault
                    </option>
                    <option value="re"
                        {{ (isset($clouserDetails) && $clouserDetails->category == 're') ? 'selected' : '' }}>Re
                    </option>
                </select>

                <label for="type"> Clouser Type</label>

                <select id="clouserType" name="clouserType">

                    <option value="ribbon"
                        {{ (isset($clouserDetails) && $clouserDetails->clouser_type == 'ribbon') ? 'selected' : '' }}>
                        Ribbon</option>
                    <option value="non_ribbon"
                        {{ (isset($clouserDetails) && $clouserDetails->clouser_type == 'non_ribbon') ? 'selected' : '' }}>
                        Non Ribbon</option>
                </select>




                <label for="amount">Clouser Amount </label>
                <input type="text" id="amount" value="{{ $clouserDetails->clouser_amount }}" name="amount"
                    placeholder="Enter clouser amount">

                <label for="location">Location </label>
                <input type="text" id="location" value="{{ $clouserDetails->location }}" name="location"
                    placeholder="Enter Location">

                <label for="date">Date & Time </label>
                <input type="datetime-local" id="date" name="date" value="{{ $clouserDetails->date ?? '' }}"
                    placeholder="Enter Date"></br>

                @if(!is_null($clouserDetails->nooflocation) && !is_null($clouserDetails->connectiontype))

                <label for="nooflocation">Number Of Location</label>
                <select id="nooflocation" name="nooflocation">
                    <option value="1"
                        {{ (isset($clouserDetails) && $clouserDetails->nooflocation == '1') ? 'selected' : '' }}>1
                    </option>
                    <option value="2"
                        {{ (isset($clouserDetails) && $clouserDetails->nooflocation == '2') ? 'selected' : '' }}>2
                    </option>
                </select>

                <label for="connectiontype">Connection Type</label>
                <select id="connectiontype" name="connectiontype">
                    <option value="New"
                        {{ (isset($clouserDetails) && $clouserDetails->connectiontype == 'New') ? 'selected' : '' }}>New
                    </option>
                    <option value="Maintainance"
                        {{ (isset($clouserDetails) && $clouserDetails->connectiontype == 'Maintainance') ? 'selected' : '' }}>
                        Maintainance</option>
                </select>

                @endif

                <!-- Message -->
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write Message Here.."
                    style="height:200px">{{ $clouserDetails->message ?? '' }}</textarea>

                <!-- Form Buttons -->
                <div class="form-buttons">
                    <input type="submit" value="Update">
                    <input type="reset" value="Reset">
                </div>

        </div> <!-- Link to View Closure Details -->
        <a href="{{ route('go_Clouserdetails') }}" class="view-link">View Closure Details</a>

        <!--<center><button>View Clouser Details</a></button></center>-->

        </form>


    </body>

    </html>


</x-app-layout>
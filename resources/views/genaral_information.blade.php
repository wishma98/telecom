<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Add Service Details') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <style>
            .buttons {
                background-image: linear-gradient(144deg,#FFFF,#3b4aed);
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                font-size: 16px;
                border-radius: 8px;
                cursor: pointer;
                margin-top: 10px;
            }
            
            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-top: 6px;
                margin-bottom: 16px;
            }

            .container {
                border-radius: 5px;
                background-color: #c1ebf7;
                padding: 20px;
                width: 50%;
                margin: auto;
                background-image: linear-gradient(#d5f0f7, #8ee0f5 50%, #43cdf0);
            }

            .button-63 {
                align-items: center;
                background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
                border-radius: 8px;
                color: white;
                font-size: 16px;
                padding: 15px 24px;
                text-decoration: none;
                cursor: pointer;
            }

            .button-63:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <form action="{{ url('general_information') }}" method="post">
                @csrf
                
                <label for="serviceID">Service ID</label>
                <input type="text" id="serviceID" name="serviceID" placeholder="Enter Service ID..." required>

                <label for="connectionType">Connection Type</label>
                <select id="connectionType" name="connectionType" required>
                    <option value="new">New</option>
                    <option value="maintenance">Maintenance</option>
                </select>

                <label for="locationCount">Number of Locations</label>
                <select id="locationCount" name="locationCount" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <center>
                    <input type="submit" class="buttons" value="Submit">
                </center>
            </form>
        </div>
    </body>
    </html>
</x-app-layout>

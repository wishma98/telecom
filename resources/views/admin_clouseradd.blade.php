<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Add Clouser') }}
        </h2>
    </x-slot>

    <a href="{{ route('admin_dashboard') }}"
          class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300 ease-in-out">
          Back
        </a>

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
            color: ;
            padding: 32px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            }
            /* Style inputs with type="text", select elements and textareas */
        input[type=text], select, textarea {
          width: 100%; /* Full width */
          padding: 12px; /* Some padding */ 
          border: 1px solid #ccc; /* Gray border */
          border-radius: 4px; /* Rounded borders */
          box-sizing: border-box; /* Make sure that padding and width stays in place */
          margin-top: 6px; /* Add a top margin */
          margin-bottom: 16px; /* Bottom margin */
          resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
        }
        
        /* Style the submit button with a specific background color etc */
        input[type=submit] {
          background-color: #04AA6D;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: center;
          
        }
        
        /* Style the reset button with a specific background color etc */
        input[type=reset] {
        background-color: #04AA6D;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          align: center;
        }
        /* When moving the mouse over the submit button, add a darker green color */
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        /* When moving the mouse over the reset button, add a darker green color */
        input[type=reset]:hover {
          background-color: #45a049;
        }
        
        /* Add a background color and some padding around the form */
        .container {
          border-radius: 5px;
          background-color: #c1ebf7;
          padding: 20px;
          height: 980px;
          background-image:linear-gradient(#d5f0f7,#8ee0f5 50%,#43cdf0);
        }
  .button-63 {
    align-items: center;
    background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
    border: 0;
    border-radius: 8px;
    box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
    box-sizing: border-box;
    color: #FFFFFF;
    display: flex;
    font-family: Phantomsans, sans-serif;
    font-size: 20px;
    justify-content: center;
    line-height: 1em;
    max-width: 100%;
    min-width: 140px;
    padding: 15px 24px;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    white-space: nowrap;
    cursor: pointer;
}

.button-63:active,
.button-63:hover {
  outline: 0;
}

@media (min-width: 768px) {
  .button-63 {
    font-size: 24px;
    min-width: 196px;
  }
  
}
.middle{
  height: 1000px;
  width: 50%;
  margin: auto;
  padding: 10px;
}

form p.error-message {
  color: red;
}
        
</style>
        

    </head>
    <body>
   

@if(session('success'))

<div>{{session('success')}}</div>

@endif
<div class="middle">




<div class="container">

  <form action="{{ route('dashboard.store') }}" method="post">
    @csrf
  
    <label for="clname">Clouser ID</label>
    @error('clouserID')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="text" id="clname" name="clouserID" placeholder=" Enter Clouser ID...">

    <label for="sid">Service_ID</label>
    @error('serviceID')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <input type="text" id="sid" name="serviceID" value="{{Auth::user()->service_id}}" placeholder=" Enter Your Service ID...">

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

    <label for="date">Date & Time </label>
    <input type="datetime-local" id="date" name="date" placeholder="Enter Date"></br>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write Message Here.." style="height:150px"></textarea>

   


    <center><input type="submit"  class="buttons" value="Submit">

    <input type="reset" class="buttons" value="Reset">    </center>
 </br>

  <center><button class="button-63"><a href="{{ route('go_Clouserdetails') }}">View Clouser Details</a></button></center>
  
  
  </form>

   
    </body>
    </html>

    
</x-app-layout>
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
        background-color: #f2f2f2;
        padding: 20px;
      }
      
      
      </style>
      

  </head>
  <body>

@if(session('success'))

<div>{{session('success')}}</div>

@endif

<div class="container">

<form action="{{ url('update_clouser', $clouserDetails->id) }}" method="post">

  @csrf

  <label for="id">Clouser ID</label>
  <input type="text" id="fname" name="clouserID" value="{{ $clouserDetails->clouser_ID }}" placeholder=" Enter Clouser ID...">

  <label for="sid">Service_ID</label>
  <input type="text" id="sid" name="serviceID" value="{{ $clouserDetails->technician_ID }}" placeholder="  Enter Your Service ID...">

  <label for="category"> Clouser Category</label>

  <select id="category" name="category">
    <option value="new" {{ (isset($clouserDetails) && $clouserDetails->category == 'new') ? 'selected' : '' }}>New</option>
    <option value="fault" {{ (isset($clouserDetails) && $clouserDetails->category == 'fault') ? 'selected' : '' }}>Fault</option>
    <option value="re" {{ (isset($clouserDetails) && $clouserDetails->category == 're') ? 'selected' : '' }}>Re</option>
  </select>

  <label for="type"> Clouser Type</label>

  <select id="clouserType" name="clouserType">

    <option value="ribbon" {{ (isset($clouserDetails) && $clouserDetails->clouser_type == 'ribbon') ? 'selected' : '' }}>Ribbon</option>
    <option value="non_ribbon" {{ (isset($clouserDetails) && $clouserDetails->clouser_type == 'non_ribbon') ? 'selected' : '' }}>Non Ribbon</option>
  </select>




  <label for="amount">Clouser Amount </label>
  <input type="text" id="amount" value="{{ $clouserDetails->clouser_amount }}"  name="amount" placeholder="Enter clouser amount">

  <label for="location">Location </label>
  <input type="text" id="location" value="{{ $clouserDetails->location }}"  name="location" placeholder="Enter Location">

  <label for="date">Date & Time </label>
  <input type="datetime-local" id="date" name="date" value="{{ $clouserDetails->date ?? '' }}" placeholder="Enter Date"></br>

  @if(!is_null($clouserDetails->nooflocation) && !is_null($clouserDetails->connectiontype))

  <label for="nooflocation">Number Of Location</label>
    <select id="nooflocation" name="nooflocation">
      <option value="1" {{ (isset($clouserDetails) && $clouserDetails->nooflocation == '1') ? 'selected' : '' }}>1</option>
      <option value="2" {{ (isset($clouserDetails) && $clouserDetails->nooflocation == '2') ? 'selected' : '' }}>2</option>
    </select>

  <label for="connectiontype">Connection Type</label>
    <select id="connectiontype" name="connectiontype">
      <option value="New" {{ (isset($clouserDetails) && $clouserDetails->connectiontype == 'New') ? 'selected' : '' }}>New</option>
      <option value="Maintainance" {{ (isset($clouserDetails) && $clouserDetails->connectiontype == 'Maintainance') ? 'selected' : '' }}>Maintainance</option>
    </select>

  @endif

  <label for="message">Message</label>
  <textarea id="message" name="message" placeholder="Write Message Here.." style="height:200px">{{ $clouserDetails->message ?? '' }}</textarea>

 
 <div class="button" align="center">

  <input type="submit" value="Update">

  <input type="reset" value="Reset"></div>
  
</div>  
<a href="{{ route('go_Clouserdetails') }}">View Clouser Details</a>

  <!--<center><button>View Clouser Details</a></button></center>-->
  
</form>

 
  </body>
  </html>
------------------------------------------------------------------

  
</x-app-layout>

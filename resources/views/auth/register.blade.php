<x-guest-layout>


<style>
        /* Style for Registration Heading */
        .registration-heading {
            font-size: 2rem; /* Adjust font size */
            font-weight: bold; /* Make it bold */
            color: #003399; /* Dark blue color */
            border-bottom: 3px solid #003399; /* Underline effect */
            display: inline-block; /* Ensures the underline is only as wide as the text */
            margin-bottom: 10px; /* Adds spacing below */
        }
    
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

<h1 class="registration-heading">Registration</h1>


      <!-- Service_ID -->
      <div>
            <x-input-label for="service_id" :value="__('Service ID')" />
            <x-text-input id="service_id" class="block mt-1 w-full" type="text" name="service_id" :value="old('service_id')" required autofocus autocomplete="service_id" />
            <x-input-error :messages="$errors->get('service_id')" class="mt-2" />
        </div>

      <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

       <!-- Contact_No -->
        <div>
            <x-input-label for="contact_number" :value="__('Contact Number')" />
            <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" required autofocus autocomplete="contact_number" />
            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

      <!-- Designation -->
        
        <div class="mt-4">
        <x-input-label for="userType" :value="__('User Type')" />
    <input type="radio" id="userType" name="userType" value="admin">
   <label for="admin">Admin</label><br>
   <input type="radio" id="userType" name="userType" value="technician">
    <label for="technician">Technician</label><br> 
            </div>

        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<x-guest-layout>
    <style>
    /* Style for Registration Heading */
    .registration-heading {
        font-size: 2rem;
        font-weight: bold;
        color: #003399;
        border-bottom: 3px solid #003399;
        display: inline-block;
        margin-bottom: 20px;
    }

    /* Form Container */
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Input Fields */
    .input-field {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .input-field:focus {
        border-color: #003399;
        box-shadow: 0 0 8px rgba(0, 51, 153, 0.3);
        outline: none;
    }

    /* Radio Buttons */
    .radio-group {
        margin-top: 16px;
        margin-bottom: 16px;
    }

    .radio-group label {
        margin-right: 16px;
        font-size: 16px;
        color: #333;
    }

    /* Button */
    .register-button {
        background-image: linear-gradient(144deg, #08d43b, #1a47c4);
        border: none;
        color: white;
        padding: 14px 40px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .register-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Link */
    .login-link {
        color: #003399;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .login-link:hover {
        color: #1a47c4;
    }

    /* Flex Container for Buttons and Links */
    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
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
        background: rgba(255, 255, 255, 0.8);
        margin: 0 auto;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        position: relative;
        z-index: 10;
        opacity: 1;
    }
    </style>
    <div class="absolute inset-0 h-full bg-black bg-opacity-30 z-10"></div>
    <!-- Background image container -->
    <div class="background-container">
        <img class="background-image active" src="{{ asset('image/h1.jpg') }}" alt="Background Image 1">
        <img class="background-image" src="{{ asset('image/h2.jpg') }}" alt="Background Image 2">
        <img class="background-image" src="{{ asset('image/h3.jpg') }}" alt="Background Image 3">
        <img class="background-image" src="{{ asset('image/h4.jpg') }}" alt="Background Image 4">
    </div>
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="form-container">
            @csrf

            <!-- Registration Heading -->
            <h1 class="registration-heading">Registration</h1>

            <!-- Service ID -->
            <div>
                <x-input-label for="service_id" :value="__('Service ID')" />
                <x-text-input id="service_id" class="input-field" type="text" name="service_id"
                    :value="old('service_id')" required autofocus autocomplete="service_id" />
                <x-input-error :messages="$errors->get('service_id')" class="mt-2 text-red-600" />
            </div>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="input-field" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
            </div>

            <!-- Contact Number -->
            <div>
                <x-input-label for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" class="input-field" type="text" name="contact_number"
                    :value="old('contact_number')" required autofocus autocomplete="contact_number" />
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2 text-red-600" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="input-field" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="input-field" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
            </div>

            <!-- User Type (Admin/Technician) -->
            <div class="radio-group">
                <x-input-label :value="__('User Type')" />
                <input type="radio" id="admin" name="userType" value="admin">
                <label for="admin">Admin</label>
                <input type="radio" id="technician" name="userType" value="technician">
                <label for="technician">Technician</label>
            </div>

            <!-- Flex Container for Login Link and Register Button -->
            <div class="flex-container">
                <a class="login-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="register-button">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
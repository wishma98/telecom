<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
    /* Gradient Button */
    .ms-3 {
        background-image: linear-gradient(144deg, #08d43b, #1a47c4);
        border: none;
        color: white;
        padding: 14px 40px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .ms-3:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Centered Login Box */
    .login-container {
        background: rgba(255, 255, 255, 0.7);
        padding: 30px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        width: 400px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-container:hover {
        /* transform: translateY(-5px); */
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Input Fields */
    .input-field {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        padding: 12px;
        color: white;
        width: 100%;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }

    .input-field:focus {
        border-color: #1a47c4;
        background: rgba(255, 255, 255, 0.3);
        outline: none;
    }

    /* Labels */
    .input-label {
        color: #0000007;
        font-weight: 600;
        margin-bottom: 8px;
    }

    /* Error Messages */
    .error-message {
        color: #ff6b6b;
        font-size: 14px;
        margin-top: 4px;
    }

    /* Remember Me Checkbox */
    .remember-me {
        color: black;
        font-size: 14px;
    }

    /* Forgot Password Link */
    .forgot-password {
        color: black;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .forgot-password:hover {
        color: #1a47c4;
    }

    /* Background */
    body {
        background: url('{{ asset('image/bg2.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Banner Image */
    .banner-image {
        border-radius: 12px;
        margin-bottom: 20px;
    }

    /* Flex Container for Remember Me and Forgot Password */
    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    </style>

    <body>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-container">
                <img src="{{ asset('image/login_banner.jpg') }}" alt="Login Banner" width="400" class="banner-image">

                <!-- Email Input -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="input-label" />
                    <x-text-input id="email" class="input-field shadow-xl" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password Input -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="input-label" />
                    <x-text-input id="password" class="input-field shadow-xl" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex-container">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm remember-me">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="forgot-password text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="flex justify-center mt-6">
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </body>
</x-guest-layout>
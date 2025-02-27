<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        /* Gradient Button */
        .ms-3 {
            background-image: linear-gradient(144deg,#08d43b,#1a47c4);
            border: none;
            color: white; /* Set text color */
            padding: 14px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 12px;
        }
        /* Centered Login Box */
        .login-container {
            background: rgba(255, 255, 255, 0.1); /* Transparent white background */
            padding: 30px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            width: 400px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>

<body style="background: url('{{ asset('image/bg2.jpg') }}') no-repeat center center fixed; background-size: cover; min-height: 100vh; margin: 0; display: flex; align-items: center; justify-content: center;">


        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="login-container">
            <img src="{{ asset('image/login_banner.jpg') }}" alt="Login Banner" width="400"><br>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
            </div>
        </form>
   
    </body>
</x-guest-layout>

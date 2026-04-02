<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        .login-form{
            padding: 30px
        }
        .sign-in{
            color: rgb(51, 51, 53);
            font-size: 20px;
            font-weight: 600;
            line-height: 24px;
            text-align: center;
            margin-bottom: 8px;
        }
        .welcome{
            color: rgb(140, 144, 151);
            font-size: 13px;
            font-weight: 400;
            line-height: 19px;
            text-align: center;
            margin-bottom: 24px;
        }
        .forgot-password{
            color: rgb(230, 83, 60);
            font-size: 12.8px;
            font-weight: 600;
            line-height: 19px;
        }
        .no-account{
            display: block;
            text-align: center;
            color: rgb(140, 144, 151);
            font-size: 12px;
            font-weight: 400;
            line-height: 18px;
            margin: 16px 0;
        }
        .login-btn{
            width: 100%;
            font-size: 15px;
            font-weight: 500;
            line-height: 22px;
            background-color: #f3f6f8;
            color: #333335;
            border: none;
            padding: 10px 0;
            transition: all 0.3s ease-in-out;
        }
        .login-btn:hover{
            background-color: #e4ecf2;
			color: #333335;
        }
        .login-btn:active{
            background-color: #e4ecf2;
			color: #333335;
        }
        .login-btn:focus{
            box-shadow: none;
			outline: none;
        }
        .label-auth{
            color: rgb(51, 51, 53);
            font-size: 12.8px;
            font-weight: 600;
            line-height: 19px;
            margin-bottom: 8px;
        }
        .input-auth:focus{
            box-shadow: none;
            outline: none;
        }
    </style>
    <form method="POST" class="login-form" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <h2 class="sign-in">Sign In</h2>
            <p class="welcome">Welcome back</p>
            <x-input-label class="label-auth" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input-auth" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="label-auth" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full input-auth"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 input-auth" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

         <!-- Button -->

            <x-primary-button class="login-btn">
                {{ __('Log in') }}
            </x-primary-button>

            <div>
            @if (Route::has('password.request'))
            <a class="no-account" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>

        <div>
            @if (Route::has('password.request'))
            <a class="no-account" href="{{ route('register') }}">
                {{ __('Dont have an account? Sign Up') }}
            </a>
            @endif
        </div>

    </form>
</x-guest-layout>

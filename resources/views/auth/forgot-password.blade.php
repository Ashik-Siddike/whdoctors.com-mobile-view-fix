<x-guest-layout>
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
    </style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="login-form" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <h2 class="sign-in">Forgot your password? </h2>
            <p class="welcome">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            <x-input-label class="label-auth" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input-auth" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button class="login-btn">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

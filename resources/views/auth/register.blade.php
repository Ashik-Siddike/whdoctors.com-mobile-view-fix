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
            margin-bottom: 24px;
        }
        
        .forgot-password{
            color: rgb(230, 83, 60);
            font-size: 12.8px;
            font-weight: 600;
            line-height: 19px;
        }
        .have-account{
            display: block;
            text-align: center;
            color: rgb(140, 144, 151);
            font-size: 12px;
            font-weight: 400;
            line-height: 18px;
            margin: 16px 0;
        }

        
        .input-auth:focus{
            box-shadow: none;
            outline: none;
        }
        .registration-footer{
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-top: 24px;
        }

        
        .label-auth{
            color: rgb(51, 51, 53);
            font-size: 12.8px;
            font-weight: 600;
            line-height: 19px;
            margin-bottom: 8px;
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
    <form method="POST" class="login-form" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <h2 class="sign-in">Registration</h2>
            <x-input-label class="label-auth" for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full input-auth" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="label-auth" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input-auth" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="label-auth" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full input-auth"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="label-auth" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full input-auth"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="registration-footer">
            <x-primary-button class="login-btn">
                {{ __('Register') }}
            </x-primary-button>
            <a class="have-account" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        </div>
    </form>
</x-guest-layout>

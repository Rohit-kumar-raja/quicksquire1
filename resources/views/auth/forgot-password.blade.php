<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
         
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm  text-success text-center ">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="text-center text-danger" />

     <div class="row">
        <div class="col-3"></div>
       
        <div class="col-6">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
    
                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
    
                <div class="flex items-center justify-end mt-4 text-dark">
                    <x-jet-button class="btn btn-primary" >
                        {{ __('Email Password Reset Link') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
     </div>
    </x-jet-authentication-card>
</x-guest-layout>

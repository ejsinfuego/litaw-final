<x-nav-bar></x-nav-bar>


<div id="loginModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-md max-h-full">

<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}"  class="bg-white border rounded-md shadow-md p-8" id="loginForm">
            @csrf
            <h3 class="mb-4 text-xl font-medium text-gray-900">Sign in</h3>
            <x-validation-errors class="mb-4" />
            <div class="relative z-0 w-full mb-6 group">
                <x-label for="email" value="{{ __('Email') }}" />
                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Email" required 
              class="block mt-1 w-full" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <x-label for="password" value="{{ __('Password') }}" />
                <input type="password" name="password" id="floating_password"  name="password" required autocomplete="current-password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="password" required/>
            </div>

            <div class="flex items-center justify-between mb-6">
             <div class="flex items-center">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

                <div class="text-sm">
                @if (Route::has('password.request'))
                    <a class="text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>
            </div>

                <x-button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-center">
                    {{ __('Log in') }}
                </x-button>
                <x-button class="flex items-center justify-center mt-2">
                    <a class="text-blue-600 hover:underline" href="{{ route('dashboard') }}">
                        {{ __('Go back') }}
                    </a>
                </x-button>
                <div class="flex items-center justify-center mt-2">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Not Registered? <a href="" class="text-blue-600 dark:text-blue-500 hover:underline">Create Account</a></p>
                  </div> 
                </form>
</div>



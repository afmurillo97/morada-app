<x-guest-layout>
    <div class="w-full max-w-md m-4 bg-white p-6 rounded-lg shadow-xl">
        @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
            <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto">
            @csrf
            <!-- Terms / Title Section -->
            <div class="space-y-2 text-center p-6">
                <h1 class="text-3xl font-bold">{{ __('Login') }}</h1>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="text-zinc-500 dark:text-zinc-400">
                    {!! __('By logging in, you accept our :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="" class="text-blue-500 hover:text-blue-700">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="" class="text-blue-500 hover:text-blue-700">'.__('Privacy Policy').'</a>',
                    ]) !!}
                </div>
                @endif
            </div>
            <!-- Google OAuth 2.0 Section -->
            <div class="flex items-center justify-center">
                <a href="{{ route('auth.google') }}" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                        <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd"/>
                    </svg>
                    {{ __('Sign in with Google') }}
                </a>
            </div>
            <div class="flex items-center space-x-2 space-y-2">
                <hr class="flex-grow border-zinc-400 dark:border-zinc-700" />
                <span class="text-zinc-400 dark:text-zinc-300 text-sm">OR</span>
                <hr class="flex-grow border-zinc-400 dark:border-zinc-700" />
            </div>
            <!-- Authentication With user-password Section afmurillo@gm.com -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white focus:outline-none focus:ring-0 peer @error('email') border-red-500 dark:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror" placeholder=" " required autocomplete="username" autofocus/>
                <label for="email" class="peer-focus:font-medium absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 @error('email') text-red-500 dark:text-red-600 @else text-gray-500 dark:text-gray-400 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 @enderror">
                    {{ __('Email Address') }}
                </label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white focus:outline-none focus:ring-0 peer @error('password') border-red-500 dark:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror" placeholder=" " required autocomplete="current-password"/>
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    {{ __('Password') }}
                </label>
            </div>


            <div class="flex items-center mb-4">
                <input id="remember_me" name="remember" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="remember_me" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('Remember me') }}
                </label>
            </div>
            <!-- Login / Forgot Password Section -->
            <div class="flex items-center justify-between">
                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        {{ __('Login') }}
                    </span>
                </button>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>

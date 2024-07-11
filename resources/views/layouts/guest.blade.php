<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Morada') . ' | ' . __('Access Panel')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <!-- Morada navbar menu  -->
        <nav class="bg-white shadow">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <div>
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-900">{{ config('app.name', 'Morada') }}</a>
                    </div>
                    <div>
                        <ul class="flex space-x-4">
                            @guest
                                <li>
                                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                            {{ __('Register') }}
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="{{ route('logout') }}" class="text-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="bg_image" class="min-h-screen bg-cover bg-center">
            <div class="flex items-center justify-center min-h-screen">
                {{ $slot }}
            </div>
        </div>
        <!-- Script to change background image -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const images = [
                    "{{ asset('images/auth/background_1.jpg') }}",
                    "{{ asset('images/auth/background_2.jpg') }}",
                    "{{ asset('images/auth/background_3.jpg') }}"
                ];
                const randomImage = images[Math.floor(Math.random() * images.length)];
                document.getElementById('bg_image').style.backgroundImage = `url(${randomImage})`;
            });
        </script>
        <!-- Other livewire Scripts -->
        @livewireScripts
    </body>
</html>

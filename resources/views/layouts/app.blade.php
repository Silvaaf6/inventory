<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

</head>

<body>
    <div id="app">
        <nav class="bg-white py-4 sticky-top">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Left Side Of Navbar -->
                <div class="flex items-center space-x-8">
                    <a class="text-black no-underline text-2xl" href="{{ url('/') }}">
                        {{ config('app.name', 'INVENTORY') }}
                    </a>
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden focus:outline-none" id="mobileMenuButton">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <div class="hidden md:flex items-center space-x-4" id="desktopMenu">
                        <a class="no-underline text-black text-lg" href="/buku/">Buku</a>
                        <a class="no-underline text-black text-lg" href="/kategori/">Kategori</a>
                        <a class="no-underline text-black text-lg" href="/hobby/">Hobby</a>
                    </div>
                </div>

                <!-- Right Side Of Navbar -->
                <div class="relative">
                    @guest
                        <div class="hidden md:flex space-x-4">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="ml-4 text-gray-700" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                    @else
                        <div class="relative">
                            <button class="focus:outline-none text-lg" id="userMenuButton">
                                {{ Auth::user()->name }}
                            </button>
                            <!-- Dropdown -->
                            <div id="userMenu" class="absolute right-0 mt-2 bg-white hidden">
                                <a class="hover:bg-gray-300 text-black no_underline block px-3 py-2"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                                <a class="hover:bg-gray-300 text-black no_underline block px-3 py-2"
                                    href="{{ route('profile.index') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="hover:bg-gray-300 text-black no_underline block px-3 py-2"
                                    href="{{ route('password.edit') }}">
                                    {{ __('Edit Password') }}
                                </a>
                            </div>
                        </div>
                        <script>
                            document.getElementById('userMenuButton').addEventListener('click', function() {
                                document.getElementById('userMenu').classList.toggle('hidden');
                            });
                        </script>
                    @endguest
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden">
                <a class="no-underline block hover:bg-sky-200 px-4 py-2 text-black text-lg" href="/buku/">Buku</a>
                <a class="no-underline block hover:bg-sky-200 px-4 py-2 text-black text-lg"
                    href="/kategori/">Kategori</a>
                <a class="no-underline block hover:bg-sky-200 px-4 py-2 text-black text-lg" href="/profile/">Profile</a>

                @guest
                    @if (Route::has('login'))
                        <a class="no-underline text-lg hover:bg-sky-200 block px-4 py-2"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="no-underline text-lg hover:bg-sky-200 block px-4 py-2"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif

                @endguest
            </div>

        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>

    @include('sweetalert::alert')
</body>

</html>

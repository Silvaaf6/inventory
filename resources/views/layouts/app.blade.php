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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>

<body>
    <div id="app">
        <nav class="bg-white py-3 sticky-top">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Left Side Of Navbar (Logo Laravel dan Links) -->
                <div class="flex items-center space-x-8">
                    <a class="text-xl no-underline text-black" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <!-- Right Side Of Navbar (Link Produk, Kategori, Hobi di Layar Besar) -->
                    <div class="hidden sm:flex items-center space-x-4" id="navMenu">
                        <a class="no-underline text-black" href="/kategori/">Kategori</a>
                        <a class="no-underline text-black" href="/buku/">Buku</a>
                        <a class="no-underline text-black" href="/hobi/">Hobi</a>
                    </div>
                </div>

                <!-- User Menu -->
                <div class="relative">
                    @guest
                        @if (Route::has('login'))
                            <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="ml-4 text-gray-700" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <!-- Dropdown User Menu untuk Desktop -->
                        <div class="hidden sm:flex relative">
                            <button id="desktopUserMenuButton" class="focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                            <!-- Dropdown Desktop -->
                            <div id="desktopUserMenu" class="absolute hidden mt-3 bg-white z-10 -right-5">
                                <a class="block hover:text-blue-600 px-3 py-2 no-underline" href="/profile">Profile</a>
                                <a class="block hover:text-red-600 px-3 py-2 no-underline" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Burger Menu Button (Muncul di Layar Kecil) -->
                <div class="sm:hidden flex items-center">
                    <button id="burgerButton" class="focus:outline-none text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="hidden sm:hidden" id="mobileMenu">
                <a href="/kategori/" class="block px-4 py-2 no-underline text-black ">Kategori</a>
                <a href="/buku/" class="block px-4 py-2 no-underline text-black">Buku</a>
                <a href="/hobi/" class="block px-4 py-2 no-underline text-black">Hobi</a>
                @auth
                    <div class="py-2 border-t">
                        <a href="/profile" class="block px-4 py-2 hover:bg-gray-300 no-underline text-black">Profile</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 hover:bg-gray-300 no-underline text-black">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @endauth
            </div>

            <script>
                // Toggle untuk mobile menu
                document.getElementById('burgerButton').addEventListener('click', function() {
                    document.getElementById('mobileMenu').classList.toggle('hidden');
                });

                // Toggle untuk dropdown user menu di desktop
                document.getElementById('desktopUserMenuButton').addEventListener('click', function() {
                    document.getElementById('desktopUserMenu').classList.toggle('hidden');
                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
            <script>
                $(document).ready(function() {
                    $('.select-multiple').select2();
                });
            </script>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
</body>

</html>

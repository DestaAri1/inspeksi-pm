<header class="sticky top-0 items-center hidden w-full px-4 py-2 bg-white sm:flex">
    <div class="flex w-1/2">
        <div class="pr-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('kso_logo.png') }}" alt="logo" class="w-16 h-10">
            </a>
        </div>
        <div class="self-center text-center w-[5rem]">
            <a href="{{ route('home') }}" class="nav-link text-xl {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        </div>
        <div class="self-center border-l-2 text-center w-[7.5rem]">
            <a href="{{ route('panduan') }}" class="text-xl nav-link {{ request()->routeIs('panduan') ? 'active' : '' }}">Panduan</a>
        </div>
        <div class="self-center border-l-2 text-center w-[7.5rem]">
            <a href="{{ route('inspeksi') }}" class="text-xl nav-link {{ request()->routeIs('inspeksi') || request()->routeIs('pertanyaan') || request()->routeIs('cari_data') ? 'active' : '' }}">Inspeksi</a>
        </div>
        @if (Auth::user()->role == 'admin')
        <div class="self-center border-l-2 text-center w-[5rem]">
            <a href="{{ route('user') }}" class="text-xl nav-link {{ request()->routeIs('user') || request()->routeIs('show_user') || request()->routeIs('search_user') ? 'active' : '' }}">User</a>
        </div>
        @endif
    </div>

    <div x-data="{ isOpen: false }" class="relative flex justify-end w-1/2">
        <button @click="isOpen = !isOpen" class="z-10 w-10 h-10 overflow-hidden border-4 border-gray-400 rounded-full realtive hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <i class="fa fa-user" aria-hidden="true"></i>
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="fixed inset-0 w-full h-full cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 py-2 mt-16 bg-white rounded-lg shadow-lg">
            <a href="{{ route('profile') }}" class="block px-4 py-2 account-link hover:text-white">Profile</a>
            <div class="separator"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="block px-4 py-2 account-link hover:text-white"
                onclick="event.preventDefault();
                this.closest('form').submit();">Sign Out</a>
            </form>
        </div>
    </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full px-6 py-5 bg-sidebar sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">{{ strtoupper(Auth::user()->role) }}</a>
        <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="{{ route('home') }}" class="flex items-center py-2 pl-4 text-white {{ request()->routeIs('home') ? 'active-nav-link' : '' }} nav-item">
            <i class="mr-3 fas fa-tachometer-alt"></i>
            Dashboard
        </a>
        <a href="{{ route('panduan') }}" class="flex items-center py-2 pl-4 text-white {{ request()->routeIs('panduan') ? 'active-nav-link' : '' }} nav-item">
            <i class="mr-4 fas fa-book"></i>
            Panduan
        </a>
        <a href="{{ route('inspeksi') }}" class="flex items-center py-2 pl-4 text-white {{ request()->routeIs('inspeksi') || request()->routeIs('pertanyaan') || request()->routeIs('cari_data') ? 'active-nav-link' : '' }} opacity-75 hover:opacity-100 nav-item">
            <i class="mr-3.5 fas fa-magnifying-glass"></i>
            Inspeksi
        </a>
        @if (Auth::user()->role == 'admin')
        <a href="{{ route('user') }}" class="flex items-center py-2 pl-4 text-white {{ request()->routeIs('user') || request()->routeIs('show_user') || request()->routeIs('search_user') ? 'active-nav-link' : '' }} opacity-75 hover:opacity-100 nav-item">
            <i class="mr-3 fa fa-user-plus"></i>
            User
        </a>
        @endif
        <a href="{{ route('profile') }}" class="flex items-center py-2 pl-4 text-white {{ request()->routeIs('profile') ? 'active-nav-link' : '' }} opacity-75 hover:opacity-100 nav-item">
            <i class="mr-4 fa fa-user" aria-hidden="true"></i>
            Profile
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="#" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item" onclick="event.preventDefault();
            this.closest('form').submit();">
                <i class="mr-3.5 fas fa-sign-out-alt"></i>
                Sign Out
            </a>
        </form>
    </nav>
</header>

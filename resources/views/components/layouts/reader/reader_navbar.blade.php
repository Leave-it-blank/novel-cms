<header class="relative bg-white dark:bg-darker">
    <div class="dark:border-gray-700">

        <!-- Toggle dark theme button -->
        <button aria-hidden="true" class="absolute top-5 right-1/4 sm:right-1/2 2xl:right-1/4 focus:outline-none" @click="toggleTheme">
            <div class="w-12 h-6 transition bg-blue-100 rounded-full outline-none dark:bg-blue-400"></div>
            <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm translate-x-6 text-blue-100 bg-blue-800" :class="{ 'translate-x-0 -translate-y-px  bg-white text-blue-700': !isDark, 'translate-x-6 text-blue-100 bg-blue-800': isDark }">
                <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
                <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
            </div>
        </button>
<nav x-data="{ drop_mobile: false, drop_desktop: false }" id="nav_main_page_bar"
     class="text-right text-black bg-red-200 dark:bg-black  dark:text-white">

    <div class="flex justify-between items-center">
        <ul class="inline-flex">

            <h1 class="p-4 font-bold uppercase border-b border-gray-100 hover:border-yellow-500">
                <a href="/"
                   class="pl-2 m-2 text-xl tracking-widest transition duration-300 ease-out transform hover:text-yellow-600 hover:bg-opacity-50">{{ 'cms' }}</a>
            </h1>


        </ul>

        <div class="hidden cursor-pointer md:block">
            <span class="rounded-xl">
                <ul class="flex inline-flex justify-center m-1">
                    <form action="#" method="GET" class="flex justify-center mt-1">
                        <input id="search_bar_lib " class="w-40 h-8 text-right rounded-md" type="text" name="search"
                               placeholder=" Search   " required/>

                        <button
                            class="mr-4 mb-1 ml-3 transform material-icons focus:border-0 hover:scale-105 hover:text-yellow-500 hover:bg-opacity-50"
                            type="submit">search</button>
                    </form>

                    <div class="inline-flex" aria-haspopup="true" aria-expanded="true">

                        @guest
                            <a class="pr-2 my-2 mx-1 uppercase transform hover:text-yellow-500 hover:bg-opacity-50"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))

                                <a class="pr-2 my-2 mx-1 uppercase transform hover:text-yellow-500 hover:bg-opacity-50"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>

                            @endif

                        @else
                            <div @click="drop_desktop = true" type="button"
                                 class="transform hover:scale-125 hover:text-yellow-500 hover:bg-opacity-50">
                                <i class="my-2 mr-2 material-icons">settings</i>   </div>
                        @endguest
                    </div>


                </ul>
            </span>
        </div>

        <!-- mobile menu -->

        <div class="px-4 transition duration-500 ease-out transform cursor-pointer md:hidden hover:bg-opacity-50"
             @click="drop_mobile = true">
            <svg class="w-6 h-6 hover:text-yellow-500" fill="none" stroke-linecap="round" stroke-linejoin="round"
                 stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </div>
    </div>

    <ul class="mt-6 md:hidden hover:bg-opacity-50" x-show="drop_mobile" x-cloak
        @click.away="drop_mobile = false">
        <x-reader-nav-links :href="route('home')" :active="request()->routeIs('read.dashboard')">
            {{ __('Home') }}<i class="material-icons">cabin</i>
        </x-reader-nav-links>
        <x-reader-nav-links :href="route('home')" :active="request()->routeIs('read.latest')">
            {{ __('Latest') }} <i class="material-icons">
                published_with_changes </i>

        </x-reader-nav-links>
        <x-reader-nav-links :href="route('home')" :active="request()->routeIs('read.novels')">
            {{ __('Novels') }} <i class="material-icons">auto_stories</i>
        </x-reader-nav-links>
        <x-reader-nav-links :href="route('home')" :active="request()->routeIs('read.comics')">
            {{ __('Comics') }} <i class="material-icons">book</i>
        </x-reader-nav-links>
        @guest
            <x-reader-nav-links :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }} <i class="material-icons">login</i>
            </x-reader-nav-links>
            @if (Route::has('register'))
                <x-reader-nav-links :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}<i class="material-icons">logout</i>
                </x-reader-nav-links>
            @endif


        @else

            @can('edit series')
                <x-reader-nav-links :href="route('admin.dashboard')" :active="request()->routeIs('read.comics')">
                    {{ __('Dashboard') }} <i class="material-icons">input</i>
                </x-reader-nav-links>
            @endcan
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-reader-nav-links :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log out') }} <i class="material-icons">logout</i>

                </x-reader-nav-links>
            </form>

        @endguest


    </ul>



    @guest

        @if (Route::has('register'))


        @endif
    @else



        <div class="absolute right-2 mt-2 w-32 bg-gray-300 rounded-md origin-top-right"
             x-show="drop_desktop" x-cloak
             @click.away="drop_desktop = false">
            <div class="bg-gray-400 bg-opacity-50 rounded-md shadow-xs">

                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">

                    @can('edit series')
                        <a href="{{route('admin.dashboard')}}"
                           class="block py-2 px-4 text-sm leading-5 text-gray-900 hover:bg-gray-100 hover:text-yellow-500 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                           role="menuitem">Dashboard</a>

                    @endcan

                    <a href="#"
                       class="block py-2 px-4 text-sm leading-5 text-gray-900 hover:bg-gray-100 hover:text-yellow-500focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                       role="menuitem">Support</a>
                    <a href="#"
                       class="block py-2 px-4 text-sm leading-5 text-gray-900 hover:bg-gray-100 hover:text-yellow-500 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                       role="menuitem">random</a>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-dropdown-link>
                    </form>
                    @endguest
                </div>
            </div>
        </div>
        </div>
        </div>
</nav>

        <div>
</header>

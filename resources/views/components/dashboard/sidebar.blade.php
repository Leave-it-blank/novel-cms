
<!-- Sidebar -->
<aside class="flex-shrink-0 hidden w-64 bg-white border-r  dark:border-gray-700 dark:bg-darker md:block">
    <div class="flex flex-col h-full">
        <!-- Sidebar links -->
        <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
            <!-- Dashboards links -->


            <div x-data="{ isActive:  @if (Route::currentRouteName() == 'admin.dashboard') true @else false @endif}">

                <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                <a href="{{ route('admin.dashboard')}}"  class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600" :class="{ 'bg-blue-100 dark:bg-blue-600': isActive } ">
                  <span class="">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                  </span>
                    <span  class="block p-2 text-sm transition-colors duration-200 rounded-md dark:hover:text-light"> Dashboards </span>

                </a>
            </div>

            <!-- Components links -->
            <div class="my-2" x-data="{ isActive:  @if(Request::is('admin/books'))  true @else false @endif, open: @if(Request::is('admin/book/*') )true @else false @endif }">
                <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                <a href="{{route('admin.books')}}" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600" :class="{ 'bg-blue-100 dark:bg-blue-600': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="false">
                  <span aria-hidden="true">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                  </span>
                    <span class="ml-2 text-sm"> Library </span>
                    <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </span>
                </a>
                <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components" style="display: none;">
                    <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                    <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                    <a href="{{route('admin.books')}}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                        All Books
                    </a>
                    {{-- <a href="#" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                    Novels
                </a>
                    <a href="#" role="menuitem"
                       class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                        Comics
                    </a>
                   --}}

                </div>

                <!-- Pages links -->
                <div class="my-2" x-data="{ isActive:  @if(Request::is('admin/management/*' )) true @else false @endif , open:  @if(Request::is('admin/management/*' )) true @else false @endif }">
                    <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600 bg-blue-100 dark:bg-blue-600" :class="{ 'bg-blue-100 dark:bg-blue-600': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="true">
                  <span aria-hidden="true">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                  </span>
                        <span class="ml-2 text-sm">Management </span>
                        <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 transition-transform transform rotate-180" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{route('admin.roles')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">

                            Roles
                        </a>
                        <a href="{{route('admin.permissions')}}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                            Permissions
                        </a>
                        <a href="{{route('admin.countries')}}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Countries
                        </a>
                        {{-- <a href="{{route('admin.tags')}}" role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md
                        dark:hover:text-light hover:text-gray-700">

                        Tags
                        </a>--}}
                        <a href="{{route('admin.users')}}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                           Users
                        </a>


                    </div>
                </div>
                <!-- Pages links -->
                <div class="my-2" x-data="{ isActive:  @if(Request::is('admin/advertisement/*' )) true @else false @endif , open:  @if(Request::is('admin/advertisement/*' )) true @else false @endif }">
                    <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600 bg-blue-100 dark:bg-blue-600" :class="{ 'bg-blue-100 dark:bg-blue-600': isActive || open }" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="true">
                  <span aria-hidden="true">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                  </span>
                        <span class="ml-2 text-sm"> Site Ads Management </span>
                        <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 transition-transform transform rotate-180" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="{{route('admin.ads')}}" role="menuitem" class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                            Ads
                        </a>
                        <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                            Tracking
                        </a>
                        <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Analytics
                        </a>
                    </div>
                </div>
                <!-- Authentication links -->
                <div class="my-2" x-data="{ isActive: false, open: false}">
                    <!-- active & hover classes 'bg-blue-100 dark:bg-blue-600' -->
                    <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600" :class="{'bg-blue-100 dark:bg-blue-600': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'" aria-expanded="false">
                  <span aria-hidden="true">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                  </span>
                        <span class="ml-2 text-sm"> Authentication </span>
                        <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication" style="display: none;">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Features
                        </a>
                        <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Settings
                        </a>
                        <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                            Admin Only
                        </a>
                    </div>
                </div>
        </nav>

        <!-- Sidebar footer -->
        <div class="flex-shrink-0 px-2 py-4 space-y-2">
            <button @click="openSettingsPanel" type="button" class="flex items-center justify-center w-full px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-700 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                <span aria-hidden="true" "="">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                </svg>
                </span>
                <span>Go back</span>
            </button>
        </div>
    </div>
</aside>

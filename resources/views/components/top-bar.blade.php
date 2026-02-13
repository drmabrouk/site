<header class="fixed top-0 right-0 left-0 md:left-64 bg-white shadow z-20">
    <div class="flex items-center justify-between h-16 px-6">
        <!-- Mobile Hamburger -->
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg mr-2">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>

        <!-- Search -->
        <div class="flex-1 max-w-md hidden md:block">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search..." type="search">
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center space-x-4">
            <!-- Stats Counters -->
            <div class="hidden lg:flex space-x-6 text-sm font-medium text-gray-600 mr-4">
                <div class="flex items-center">
                    <span class="bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full text-xs mr-2">12</span>
                    New Jobs
                </div>
                <div class="flex items-center">
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full text-xs mr-2">5</span>
                    Pending
                </div>
            </div>

            <!-- Notifications -->
            <button class="p-1 text-gray-400 hover:text-gray-600 focus:outline-none relative">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 border-2 border-white"></span>
            </button>

            <!-- Profile Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center focus:outline-none">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ Auth::user()->name }}">
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="block px-4 py-2 text-xs text-gray-400">Manage Account</div>
                    <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                    <div class="border-t border-gray-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</header>

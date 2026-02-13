<div class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white transform transition-transform duration-300 -translate-x-full md:translate-x-0 z-30" id="sidebar">
    <div class="p-6">
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-blue-400">Jobedia</a>
    </div>
    <nav class="mt-6 px-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('dashboard') ? 'bg-gray-800 text-blue-400' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Dashboard
        </a>

        @if(Auth::user()->isAdmin())
            <div x-data="{ open: true }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-2 rounded-lg hover:bg-gray-800">
                    <span class="flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Admin
                    </span>
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="ml-9 mt-2 space-y-1">
                    <a href="{{ route('admin.users') }}" class="block p-2 text-sm text-gray-400 hover:text-white {{ request()->routeIs('admin.users') ? 'text-white' : '' }}">Users</a>
                    <a href="{{ route('admin.jobs') }}" class="block p-2 text-sm text-gray-400 hover:text-white {{ request()->routeIs('admin.jobs') ? 'text-white' : '' }}">Jobs</a>
                    <a href="#" class="block p-2 text-sm text-gray-400 hover:text-white">Settings</a>
                    <a href="#" class="block p-2 text-sm text-gray-400 hover:text-white">SEO & Analytics</a>
                </div>
            </div>
        @endif

        @if(Auth::user()->isEmployer())
            <div x-data="{ open: true }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-2 rounded-lg hover:bg-gray-800">
                    <span class="flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Employer
                    </span>
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="ml-9 mt-2 space-y-1">
                    <a href="{{ route('employer.dashboard') }}" class="block p-2 text-sm text-gray-400 hover:text-white">My Jobs</a>
                    <a href="{{ route('jobs.create') }}" class="block p-2 text-sm text-gray-400 hover:text-white">Post Job</a>
                    <a href="{{ route('employer.candidates') }}" class="block p-2 text-sm text-gray-400 hover:text-white">Find Talent</a>
                </div>
            </div>
        @endif

        @if(Auth::user()->isSeeker())
            <div x-data="{ open: true }">
                <button @click="open = !open" class="w-full flex items-center justify-between p-2 rounded-lg hover:bg-gray-800">
                    <span class="flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Job Seeker
                    </span>
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" class="ml-9 mt-2 space-y-1">
                    <a href="{{ route('seeker.dashboard') }}" class="block p-2 text-sm text-gray-400 hover:text-white">Dashboard</a>
                    <a href="{{ route('jobs.index') }}" class="block p-2 text-sm text-gray-400 hover:text-white">Browse Jobs</a>
                    <a href="{{ route('seeker.profile') }}" class="block p-2 text-sm text-gray-400 hover:text-white">My Profile</a>
                </div>
            </div>
        @endif

        <!-- Common -->
        <a href="{{ route('profile.edit') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-800">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Settings
        </a>
    </nav>
</div>

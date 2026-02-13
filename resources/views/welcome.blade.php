<x-guest-layout>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center animate-fade-in">
            <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 tracking-tight">
                Job<span class="text-blue-600">edia</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed">
                The elite career platform for the modern workforce. Connecting visionaries with opportunities.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-16">
                <div class="p-10 bg-white shadow-2xl rounded-3xl border border-gray-100 transform hover:-translate-y-2 transition duration-500 text-left">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Job Seekers</h2>
                    <p class="text-gray-600 mb-8 text-lg">Build an ATS-optimized portfolio, track applications in real-time, and stand out to premium recruiters.</p>
                    <a href="{{ route('register') }}?role=seeker" class="inline-flex items-center justify-center w-full bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                        Join as Seeker
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <div class="p-10 bg-white shadow-2xl rounded-3xl border border-gray-100 transform hover:-translate-y-2 transition duration-500 text-left">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Employers</h2>
                    <p class="text-gray-600 mb-8 text-lg">Streamline your hiring process. Search a global talent pool and manage applicants with ease.</p>
                    <a href="{{ route('register') }}?role=employer" class="inline-flex items-center justify-center w-full bg-gray-900 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-black transition shadow-lg shadow-gray-200">
                        Join as Employer
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="mt-20 pt-10 border-t border-gray-100 flex flex-wrap justify-center gap-12 grayscale opacity-50">
                <!-- Placeholder Logos for Corporate Feel -->
                <span class="text-2xl font-black italic">TECHCORP</span>
                <span class="text-2xl font-black italic">GLOBALINC</span>
                <span class="text-2xl font-black italic">SOFTSTUDIO</span>
                <span class="text-2xl font-black italic">DATAX</span>
            </div>
        </div>
    </div>
</x-guest-layout>

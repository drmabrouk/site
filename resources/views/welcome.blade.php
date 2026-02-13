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

        <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
            <h1 class="text-6xl font-bold text-blue-600 mb-4">Jobedia</h1>
            <p class="text-2xl text-gray-700 mb-8">Connecting Talent with Opportunity. Everywhere.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                <div class="p-8 bg-white shadow-xl rounded-2xl transform hover:scale-105 transition duration-300">
                    <h2 class="text-3xl font-bold mb-4">For Job Seekers</h2>
                    <p class="text-gray-600 mb-6">Find your dream job, build your ATS portfolio, and get direct offers from top employers.</p>
                    <a href="{{ route('register') }}?role=seeker" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-full font-bold">Start Your Career</a>
                </div>

                <div class="p-8 bg-white shadow-xl rounded-2xl transform hover:scale-105 transition duration-300">
                    <h2 class="text-3xl font-bold mb-4">For Employers</h2>
                    <p class="text-gray-600 mb-6">Post job openings, search for the best talent, and hire faster with our advanced tracking system.</p>
                    <a href="{{ route('register') }}?role=employer" class="inline-block bg-green-600 text-white px-8 py-3 rounded-full font-bold">Post a Job</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

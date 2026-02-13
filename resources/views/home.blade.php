<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">Welcome to Jobedia</h1>
                    <p class="mb-6">Find your dream job or post a new opening today.</p>
                    <div class="flex space-x-4">
                        <a href="{{ route('jobs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Browse Jobs
                        </a>
                        <a href="{{ route('jobs.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Post a Job
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

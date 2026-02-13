<x-app-layout>
    <x-slot name="header">
        Search Candidates
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
        <form method="GET" action="{{ route('employer.candidates') }}" class="flex-1 w-full max-w-2xl relative">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by name, skills, or location..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </form>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200">Advanced Filters</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($candidates as $candidate)
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img class="h-14 w-14 rounded-full mr-4 border border-gray-200" src="https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}" alt="">
                    <div>
                        <h4 class="font-bold text-gray-900">{{ $candidate->name }}</h4>
                        <p class="text-xs text-gray-500">{{ $candidate->username }}</p>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="text-sm text-gray-600 line-clamp-2">Experienced professional with a strong background in software development and project management.</p>
                </div>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase rounded">Laravel</span>
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase rounded">Tailwind</span>
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase rounded">PHP</span>
                </div>
                <div class="flex gap-2 pt-4 border-t border-gray-50">
                    <button class="flex-1 py-2 bg-blue-600 text-white rounded-lg text-xs font-bold hover:bg-blue-700">View Profile</button>
                    <button class="flex-1 py-2 border border-blue-600 text-blue-600 rounded-lg text-xs font-bold hover:bg-blue-50">Direct Offer</button>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-gray-500">
                No candidates found matching your search.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $candidates->links() }}
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        Seeker Dashboard
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Profile Completion Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Profile Completion</h3>
            <div class="flex items-center justify-between mb-2">
                <span class="text-2xl font-bold text-gray-900">{{ $completion }}%</span>
                <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded">Good</span>
            </div>
            <div class="w-full bg-gray-100 rounded-full h-2 mb-4">
                <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ $completion }}%"></div>
            </div>
            <p class="text-xs text-gray-500">Complete your profile to increase your visibility to employers by 40%.</p>
        </div>

        <!-- Applications Count -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-full bg-green-50 text-green-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Applications</p>
                <p class="text-2xl font-bold text-gray-900">{{ $applications->count() }}</p>
            </div>
        </div>

        <!-- Profile Download -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-center">
            <a href="{{ route('seeker.portfolio.download') }}" class="flex items-center justify-center gap-2 w-full py-3 bg-gray-900 text-white rounded-lg font-bold hover:bg-black transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Download ATS Resume
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Applications -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Recent Applications</h3>
                <a href="#" class="text-sm text-blue-600 font-bold hover:underline">View All</a>
            </div>
            <div class="p-0">
                @forelse($applications as $app)
                    <div class="px-6 py-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded bg-blue-50 text-blue-600 flex items-center justify-center font-bold mr-4">
                                {{ substr($app->job->employer->company_name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{ $app->job->title }}</p>
                                <p class="text-xs text-gray-500">{{ $app->job->employer->company_name }} • {{ $app->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $app->status === 'accepted' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $app->status }}
                        </span>
                    </div>
                @empty
                    <div class="p-12 text-center text-gray-500">
                        <p class="mb-4">You haven't applied for any jobs yet.</p>
                        <a href="{{ route('jobs.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold">Find Jobs</a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Job Suggestions Placeholder -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-6">Recommended Jobs</h3>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="h-10 w-10 rounded bg-gray-100 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-bold">Frontend Engineer</p>
                        <p class="text-xs text-gray-500">Remote • $80k - $120k</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="h-10 w-10 rounded bg-gray-100 flex-shrink-0"></div>
                    <div>
                        <p class="text-sm font-bold">Product Designer</p>
                        <p class="text-xs text-gray-500">London • $60k - $90k</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-8 py-2 text-sm text-blue-600 font-bold border border-blue-600 rounded-lg hover:bg-blue-50 transition">See More Suggestions</button>
        </div>
    </div>
</x-app-layout>

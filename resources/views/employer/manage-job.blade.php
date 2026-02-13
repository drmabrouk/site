<x-app-layout>
    <x-slot name="header">
        Manage Job: {{ $job->title }}
    </x-slot>

    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('employer.dashboard') }}" class="flex items-center text-sm text-gray-500 hover:text-gray-900">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Dashboard
        </a>
        <div class="flex gap-2">
            <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-bold hover:bg-gray-50">Edit Job</button>
            <button class="px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-bold hover:bg-red-100">Close Position</button>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-900">Applicants ({{ $applications->count() }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-100">Candidate</th>
                        <th class="px-6 py-3 border-b border-gray-100">Applied Date</th>
                        <th class="px-6 py-3 border-b border-gray-100">Status</th>
                        <th class="px-6 py-3 border-b border-gray-100 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @forelse($applications as $app)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 flex items-center">
                                <img class="h-10 w-10 rounded-full mr-3 border border-gray-200" src="https://ui-avatars.com/api/?name={{ urlencode($app->seeker->name) }}" alt="">
                                <div>
                                    <p class="font-bold text-gray-900">{{ $app->seeker->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $app->seeker->email }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $app->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-bold uppercase bg-blue-100 text-blue-700">
                                    {{ $app->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-blue-600 hover:text-blue-900 font-bold mr-3">View Resume</button>
                                <button class="text-gray-600 hover:text-gray-900 font-bold">Message</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                No applications received for this job yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

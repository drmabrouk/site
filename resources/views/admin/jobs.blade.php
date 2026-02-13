<x-app-layout>
    <x-slot name="header">
        Manage Jobs
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search jobs..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <select class="border border-gray-300 rounded-lg text-sm py-2 px-4 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Status</option>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-100">Job Title</th>
                        <th class="px-6 py-3 border-b border-gray-100">Employer</th>
                        <th class="px-6 py-3 border-b border-gray-100">Posted At</th>
                        <th class="px-6 py-3 border-b border-gray-100">Status</th>
                        <th class="px-6 py-3 border-b border-gray-100 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach($jobs as $job)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-900">{{ $job->title }}</p>
                                <p class="text-xs text-gray-500">{{ $job->type }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded bg-gray-200 flex items-center justify-center mr-2 text-xs font-bold text-gray-600 uppercase">
                                        {{ substr($job->employer->company_name, 0, 1) }}
                                    </div>
                                    <span class="text-gray-900">{{ $job->employer->company_name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $job->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'open' => 'bg-green-100 text-green-700',
                                        'closed' => 'bg-red-100 text-red-700',
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                    ];
                                @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-bold uppercase {{ $statusColors[$job->status] ?? 'bg-gray-100' }}">
                                    {{ $job->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 font-bold">Review</button>
                                <button class="text-red-600 hover:text-red-900 font-bold">Archive</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-100">
            {{ $jobs->links() }}
        </div>
    </div>
</x-app-layout>

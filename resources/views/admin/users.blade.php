<x-app-layout>
    <x-slot name="header">
        Manage Users
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search users..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <select class="border border-gray-300 rounded-lg text-sm py-2 px-4 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Roles</option>
                    <option value="seeker">Seekers</option>
                    <option value="employer">Employers</option>
                    <option value="admin">Admins</option>
                </select>
            </div>
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200">Bulk Action</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700">Add User</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-100">User</th>
                        <th class="px-6 py-3 border-b border-gray-100">Role</th>
                        <th class="px-6 py-3 border-b border-gray-100">Status</th>
                        <th class="px-6 py-3 border-b border-gray-100">Joined</th>
                        <th class="px-6 py-3 border-b border-gray-100 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 flex items-center">
                                <img class="h-10 w-10 rounded-full mr-3 border border-gray-200" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" alt="">
                                <div>
                                    <p class="font-bold text-gray-900">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $roleColors = [
                                        'admin' => 'bg-purple-100 text-purple-700',
                                        'employer' => 'bg-blue-100 text-blue-700',
                                        'seeker' => 'bg-green-100 text-green-700',
                                    ];
                                @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-bold uppercase {{ $roleColors[$user->role] ?? 'bg-gray-100' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center">
                                    <span class="h-2 w-2 rounded-full bg-green-500 mr-2"></span>
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 font-bold">Edit</button>
                                <button class="text-red-600 hover:text-red-900 font-bold">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-100">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>

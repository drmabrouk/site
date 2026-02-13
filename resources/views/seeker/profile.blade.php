<x-app-layout>
    <x-slot name="header">
        My Career Profile
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Profile Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="relative inline-block mb-4">
                    <img class="h-24 w-24 rounded-full mx-auto border-4 border-white shadow-md object-cover" src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&size=128' }}" alt="">
                    <button class="absolute bottom-0 right-0 p-1.5 bg-blue-600 text-white rounded-full shadow-lg">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </button>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                <p class="text-sm text-gray-500 mb-4">{{ '@' . $user->username }}</p>
                <div class="flex flex-wrap justify-center gap-2 mb-6">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold uppercase rounded">Developer</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold uppercase rounded">London, UK</span>
                </div>
                <button class="w-full py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700">Update Info</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Experience Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Professional Experience
                    </h3>
                    <button class="text-blue-600 hover:text-blue-900 text-sm font-bold">+ Add New</button>
                </div>
                <div class="p-0 divide-y divide-gray-50">
                    @forelse($user->experiences as $exp)
                        <div class="p-6 hover:bg-gray-50 transition group relative">
                            <div class="flex justify-between mb-1">
                                <h4 class="font-bold text-gray-900">{{ $exp->position }}</h4>
                                <span class="text-xs text-gray-500">{{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}</span>
                            </div>
                            <p class="text-blue-600 text-sm font-medium mb-2">{{ $exp->company }}</p>
                            <p class="text-sm text-gray-600">{{ $exp->description }}</p>
                            <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition">
                                <button class="text-gray-400 hover:text-blue-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></button>
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center text-gray-500">
                            Tell employers about your professional journey.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Certifications Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Certifications & Licenses
                    </h3>
                    <button class="text-blue-600 hover:text-blue-900 text-sm font-bold">+ Add New</button>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($user->certifications as $cert)
                        <div class="flex gap-4 p-4 border border-gray-100 rounded-xl hover:border-blue-200 transition">
                            <div class="h-12 w-12 bg-gray-50 rounded-lg flex-shrink-0 flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $cert->name }}</h4>
                                <p class="text-xs text-gray-600">{{ $cert->issuing_organization }}</p>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-tight">Issued {{ $cert->issue_date->format('M Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-6 text-center text-gray-500">
                            Highlight your expertise with certifications.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

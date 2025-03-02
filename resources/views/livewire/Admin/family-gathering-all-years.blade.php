<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Main container with no padding on mobile, small padding on larger screens -->
        <div class="h-screen flex flex-col">
            <!-- Header Section with minimal padding -->
            <div class="bg-white border-b p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Registered Members</h2>
                        <p class="mt-1 text-sm text-gray-500">For the year All Years</p>
                    </div>
                </div>
            </div>

            <!-- Table Section - takes up remaining height -->
            <div class="flex-1 overflow-hidden">
                <div class="h-full overflow-auto">
                    <table class="w-full bg-white">
                        <thead class="bg-gray-50 sticky top-0">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Full Name</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Residence</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Contact</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Gender</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Church</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">Year</th>

                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($familiesByYear as $family)
                            <tr class="hover:bg-gray-50 transition-all duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $family->first_name }} {{ $family->other_names }} {{ $family->last_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $family->residence }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $family->contact }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                        {{ $family->gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                        {{ $family->gender }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $family->church }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $family->year }}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{$familiesByYear->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

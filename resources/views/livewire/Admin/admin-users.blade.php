<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Users Directory</h1>
                </div>
                <a href="patients"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New User
                </a>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <!-- Card Header -->
                <div class="border-b border-gray-100 px-6 py-4">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <h2 class="text-xl font-semibold text-gray-800">Users List</h2>
                        <div class="relative">
                            <div class="flex items-center bg-gray-50 rounded-lg">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                       class="pl-10 pr-4 py-2 w-full md:w-64 bg-gray-50 rounded-lg border-0 focus:ring-2 focus:ring-blue-500"
                                       placeholder="Search patients...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Full Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Contact</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Gender</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Date of Birth</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Role</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Profile Picture</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 font-semibold">
                                        {{$user->first_name[0]}} {{$user->last_name[0]}}
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">{{$user->first_name}} {{$user->last_name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    {{$user->email}}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{$user->contact}}</td>
                            <td class="px-6 py-4 text-gray-500">Male</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    {{$user->date_of_birth}}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{$user->role}}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-gray-500 text-sm truncate block max-w-xs">
                                    @if($user->profile_picture)
                                        <img
                                            class=" transform transition-transform duration-700 group-hover:scale-110 rounded-full motion-preset-shake motion-duration-1000"
                                            src="{{asset($user->profile_picture)}}"
                                            alt="Family Gathering event"
                                            width="50%"
                                        />
                                    @else
                                        <img
                                        class=" transform transition-transform duration-700 group-hover:scale-110 rounded-full motion-preset-shake motion-duration-1000"
                                        src="../../../images/user-icon-on-transparent-background-free-png.webp"
                                        alt="profile Picture"
                                        width="20%"
                                        />
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3">
                                    <button
                                        class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Edit
                                    </button>
                                    <a href="patients/file/add"
                                       class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Users Directory</h1>
                </div>
                <a href="/register"
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
                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if($isEdit)
                    <form
                        class="bg-white shadow-2xl rounded-2xl overflow-hidden max-w-xl mx-auto transform transition-all duration-300 hover:scale-[1.01]"
                        wire:submit="update">
                        <!-- Gradient Header with Subtle Animation -->
                        <div
                            class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 opacity-50 animate-pulse"></div>
                            <h2 class="text-3xl font-bold text-white text-center relative z-10 tracking-wide">
                                Update User Role
                            </h2>
                        </div>

                        <!-- Form Content with Enhanced Spacing and Design -->
                        <div class="p-8 space-y-6">
                            <!-- First Name Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input wire:model="first_name"
                                       type="text"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                          hover:shadow-md group-focus-within:shadow-lg"
                                       disabled
                                >
                                @error('first_name')
                                <div class="text-red-600 mt-1 text-sm animate-bounce">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Phone Number Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input wire:model="last_name"
                                       type="text"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                          hover:shadow-md group-focus-within:shadow-lg"
                                       disabled
                                >
                                @error('last_name')
                                <div class="text-red-600 mt-1 text-sm animate-bounce">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    Email
                                </label>
                                <input
                                    wire:model="email"
                                    type="email"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                       hover:shadow-md group-focus-within:shadow-lg"
                                    disabled
                                >
                                @error('email')
                                <div class="text-red-600 mt-1 text-sm animate-bounce">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Contact Field -->
                            <div class="group">
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    Contact
                                </label>
                                <input
                                    wire:model="contact"
                                    type="number"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                       hover:shadow-md group-focus-within:shadow-lg"
                                    disabled
                                >
                                @error('contact')
                                <div class="text-red-600 mt-1 text-sm animate-bounce">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Role Selection with Enhanced Styling -->
                            <div class="group">
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                    Role
                                </label>
                                <div class="relative">
                                    <select
                                        wire:model="role"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                           appearance-none bg-white hover:shadow-md group-focus-within:shadow-lg
                           pr-10 cursor-pointer"
                                    >
                                        <option value="" disabled>Select a Role</option>
                                        <option value="admin" class="hover:bg-blue-50">Admin</option>
                                        <option value="finance" class="hover:bg-blue-50">Finance</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('role')
                                <div class="text-red-600 mt-1 text-sm animate-bounce">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button with Hover and Transition Effects -->
                        <div class="p-6">
                            <button
                                type="submit"
                                class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300
                   transform hover:-translate-y-1 active:translate-y-0 shadow-lg hover:shadow-xl
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                            >
            <span class="flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                <span>Update Role</span>
            </span>
                            </button>
                        </div>
                    </form>
                    @endif
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
                                            <div
                                                class="font-medium text-gray-900">{{$user->first_name}} {{$user->last_name}}</div>
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
                                            wire:click="edit({{$user->id}})"
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
                                        <button wire:click="delete({{$user->id}})"
                                           class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
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

    <div class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
            <!-- Header Section -->
            <header class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
                        <p class="text-gray-600 mt-1">Welcome back, Daniel</p>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                                OP
                            </div>
                            <span class="ml-3 font-medium text-gray-700">Daniel</span>
                        </div>
                        <button class="px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors duration-200 flex items-center gap-2">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </div>
                </div>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Patients Card -->
                <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user text-xl text-blue-500"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500">Total Users</h3>
                            <p class="text-2xl font-bold text-blue-500">32</p>
                        </div>
                    </div>
                </div>

                <!-- All Patients Card -->
                <div class="bg-white rounded-xl shadow-sm border-l-4 border-purple-500 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-users text-xl text-purple-500"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500">Total Members</h3>
                            <p class="text-2xl font-bold text-purple-500">42</p>
                        </div>
                    </div>
                </div>

                <!-- Admitted Patients Card -->
                <div class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-male text-xl text-green-500"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500">Total Male Members</h3>
                            <p class="text-2xl font-bold text-green-500">567</p>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div class="bg-white rounded-xl shadow-sm border-l-4 border-yellow-500 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-female text-xl text-yellow-500"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500">Total Female Members</h3>
                            <p class="text-2xl font-bold text-yellow-500">45,00</p>
                        </div>
                    </div>
                </div>

                <!-- Pending Bills Card -->
                <div class="bg-white rounded-xl shadow-sm border-l-4 border-red-500 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                            <i class="fas fa-child text-xl text-red-500"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500">Total Number of Children </h3>
                            <p class="text-2xl font-bold text-red-500">424</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

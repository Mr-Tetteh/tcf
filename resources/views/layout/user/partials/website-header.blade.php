<header class="fixed top-0 left-0 w-full bg-white/95 backdrop-blur-sm shadow-lg shadow-gray-100/10 z-50 transition-all duration-300 ">
    <div class="container mx-auto px-4 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo Section -->
            <a href="{{route('home')}}" class="group flex items-center space-x-3 transition-transform duration-300 hover:scale-105">
                <div class="relative h-10 w-10 overflow-hidden rounded-xl">
                    <img src="../../../images/309372872_460971846059341_4824700090279169467_n.jpg" alt="Logo"
                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 ring-1 ring-black/5 rounded-xl"></div>
                </div>
                <span class="hidden sm:block">
                    <span class="text-xl font-black tracking-tight bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Tabernacle
                    </span>
                    <span class="block text-sm text-gray-600 font-medium">Christian Fellowship</span>
                </span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block">
                <ul class="flex items-center space-x-1">
                    <li class="relative group">
                        <a href="{{route('admin.dashboard')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Admin
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('home')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Home
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('about')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            About
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('sermons')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Sermon
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('study_materials')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Study Material
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>

                    <li class="relative group">
                        <a href="{{route('gallery')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Gallery
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('events')}}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Events
                            <span class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}" class="ml-3 inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-sm shadow-blue-200 hover:bg-blue-700 hover:shadow-md hover:shadow-blue-200 transition-all duration-200">
                            Contact
                            <svg class="w-4 h-4 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 hand_bugger">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>

            <!-- Mobile Menu (Hidden by default) -->
            <div class=" hidden lg:hidden absolute top-full left-0 right-0 bg-white/95 backdrop-blur-sm shadow-lg border-t border-gray-100 nav_menu">
                <nav class="container mx-auto px-4 py-6 space-y-1">
                    <a href="{{route('admin.dashboard')}}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Admin
                    </a>

                    <a href="{{route('home')}}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200"> Home</a>
                    <a href="{{route('about')}}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">About</a>
                    <a href="{{route('sermons')}}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Sermon</a>
                    <a href="{{route('gallery')}}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Gallery</a>
                    <a href="{{route('events')}}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Events</a>
                    <a href="{{route('contact')}}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all duration-200">
                        Contact
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>

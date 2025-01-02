<header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50 transition-all duration-300">
    <div class="container mx-auto px-4 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo Section -->
            <a href="#" class="flex items-center space-x-3">
                <img src="path-to-your-logo/logo_white.png" alt="Logo" class="h-8 w-auto">
                <span class="text-gray-800 text-xl font-bold hidden sm:block">Your Logo</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block">
                <ul class="flex items-center space-x-8">
                    <li><a href="#admin" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Go to Admin</a></li>
                    <li><a href="#home" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Home</a></li>
                    <li><a href="#services" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">About</a></li>
                    <li><a href="#about" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Sermon</a></li>
                    <li><a href="#gallery" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Gallery</a></li>
                    <li><a href="#team" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Events</a></li>
                    <li><a href="#contact" class="text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Contact</a></li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Mobile Menu (Hidden by default) -->
            <div class="hidden lg:hidden absolute top-full left-0 right-0 bg-white shadow-lg p-4 border-t">
                <nav class="space-y-4">
                    <a href="#home" class="block text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Home</a>
                    <a href="#about" class="block text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">About</a>
                    <a href="#about" class="block text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Sermon</a>
                    <a href="#gallery" class="block text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Gallery</a>
                    <a href="#team" class="block text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Events</a>
                    <a href="#contact" class="block text-gray-600 hover:text-blue-600 transition-colors duration-200 font-medium">Contact</a>
                </nav>
            </div>
        </div>
    </div>
</header>

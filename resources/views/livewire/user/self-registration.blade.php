<div class="min-h-screen w-full bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <section class="relative overflow-hidden w-full">
        <div class="container mx-auto max-w-2xl">
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>

            <div class="relative mt-32">
                <!-- Success Message -->
               

                <!-- Registration Form -->
                <form wire:submit="{{$isEdit ? 'update': 'create' }}"
                      class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                      

                       @if (session()->has('message'))
                    <div class="mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-xl shadow-lg transform transition-all duration-500 hover:scale-102">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">{{ session('message') }}</span>
                        </div>
                    </div>
                @endif
                    
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-8 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold mb-2">
                                    Family Gathering {{\Carbon\Carbon::now()->year}}
                                </h1>
                                <p class="text-blue-100 text-sm font-medium">Join us for a memorable celebration</p>
                            </div>
                            <div class="hidden sm:block">
                                <svg class="w-16 h-16 text-white/20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Form Body -->
                    <div class="px-8 py-10 space-y-8">
                        <!-- Personal Information Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                                <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mr-3 text-sm">1</span>
                                Personal Information
                            </h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Full Name -->
                                <div class="space-y-2 sm:col-span-2">
                                    <label for="fullName" class="block text-sm font-semibold text-gray-700">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <input
                                            wire:model="full_name"
                                            type="text"
                                            id="fullName"
                                            name="fullName"
                                            placeholder="Enter your full name"
                                            autocomplete="name"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 outline-none"
                                        >
                                    </div>
                                    @error('full_name') 
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Contact Number -->
                                <div class="space-y-2">
                                    <label for="contact" class="block text-sm font-semibold text-gray-700">
                                        Contact Number <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <input
                                            wire:model="contact"
                                            type="tel"
                                            id="contact"
                                            name="contact"
                                            placeholder="(233) 000-0000"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 outline-none"
                                        >
                                    </div>
                                    @error('contact') 
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Residence -->
                                <div class="space-y-2">
                                    <label for="residence" class="block text-sm font-semibold text-gray-700">
                                        Residence <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <input
                                            wire:model="residence"
                                            type="text"
                                            id="residence"
                                            name="residence"
                                            placeholder="Enter your residence"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 outline-none"
                                        >
                                    </div>
                                    @error('residence') 
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Church Information Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                                <span class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-3 text-sm">2</span>
                                Church Information
                            </h2>
                            
                            <div class="space-y-2">
                                <label for="denomination" class="block text-sm font-semibold text-gray-700">
                                    Denomination <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <input
                                        wire:model="denomination"
                                        type="text"
                                        id="denomination"
                                        name="denomination"
                                        placeholder="Enter your denomination"
                                        class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 transition-all duration-200 outline-none"
                                    >
                                </div>
                                @error('denomination') 
                                    <p class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6">
                            <button
                                type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-blue-500/50 transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0"
                            >
                                <span class="flex items-center justify-center">
                                    {{$isEdit ? "Update Registration" : "Submit Registration"}}
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Footer Note -->
                <p class="mt-8 text-center text-sm text-gray-600">
                    Need help? Contact the organizing committee
                </p>
            </div>
        </div>
    </section>

    <style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    
    /* Toast animations */
    @keyframes slide-in {
        0% {
            transform: translateX(400px);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slide-out {
        0% {
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateX(400px);
            opacity: 0;
        }
    }
    
    .animate-slide-in {
        animation: slide-in 0.3s ease-out forwards;
    }
    
    .animate-slide-out {
        animation: slide-out 0.3s ease-in forwards;
    }
    
    /* Mobile toast positioning */
    @media (max-width: 640px) {
        .toast-notification {
            left: 1rem;
            right: 1rem;
            top: 1rem;
        }
    }
</style>

</div>

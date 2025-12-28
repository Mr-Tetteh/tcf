<div class="min-h-screen w-full bg-gradient-to-b from-gray-50 to-white motion-preset-slide-right motion-duration-2000">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

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
    </style>

    <section class="relative overflow-hidden py-20">
                    <div class="flex flex-col items-center lg:flex-row lg:justify-between lg:space-x-12">
                <div class="w-full text-center lg:w-1/2 lg:text-left mt-20">

        <div class="max-w-2xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8 animate-fade-in">
                <!-- Church Logo/Icon -->
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full shadow-lg mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-3">
                    Family Gathering {{\Carbon\Carbon::now()->year}}
                </h1>
                <p class="text-lg text-gray-600 font-medium">Tabernacle Christian Fellowship</p>
                <div class="mt-2 inline-block px-4 py-1.5 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                    Self Registration Portal
                </div>
            </div>

            <!-- Success Message -->
            @if (session()->has('message'))
            <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg shadow-md animate-fade-in">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('message') }}</span>
                </div>
            </div>
            @endif

            <!-- Registration Form -->
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'create' }}" class="relative">
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8 sm:p-10 space-y-8 border border-white/20">
                    
                    <!-- Form Header -->
                    <div class="text-center pb-6 border-b-2 border-gradient-to-r from-blue-200 to-purple-200">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Register Your Attendance</h2>
                        <p class="text-sm text-gray-500">Please fill in your information below</p>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Personal Information</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Full Name -->
                            <div class="space-y-2">
                                <label for="fullName" class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Full Name <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    wire:model="full_name"
                                    type="text"
                                    id="fullName"
                                    name="fullName"
                                    placeholder="John Doe"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 bg-white shadow-sm hover:border-gray-300"
                                >
                                <div class="text-red-500 text-xs font-medium">
                                    @error('full_name') {{$message}} @enderror
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="space-y-2">
                                <label for="contact" class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Contact Number <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    wire:model="contact"
                                    type="number"
                                    id="contact"
                                    name="contact"
                                    placeholder="0XXXXXXXXX"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 bg-white shadow-sm hover:border-gray-300"
                                >
                                <div class="text-red-500 text-xs font-medium">
                                    @error('contact') {{$message}} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location & Church Information Section -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Location & Church Details</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Residence -->
                            <div class="space-y-2">
                                <label for="residence" class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-1.5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Residence <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    wire:model="residence"
                                    type="text"
                                    id="residence"
                                    name="residence"
                                    placeholder="Enter your residence"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition-all duration-200 bg-white shadow-sm hover:border-gray-300"
                                >
                                <div class="text-red-500 text-xs font-medium">
                                    @error('residence') {{$message}} @enderror
                                </div>
                            </div>

                            <!-- Denomination -->
                            <div class="space-y-2">
                                <label for="denomination" class="flex items-center text-sm font-semibold text-gray-700">
                                    <svg class="w-4 h-4 mr-1.5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Denomination <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    wire:model="denomination"
                                    type="text"
                                    id="denomination"
                                    name="denomination"
                                    placeholder="Enter your denomination"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 transition-all duration-200 bg-white shadow-sm hover:border-gray-300"
                                >
                                <div class="text-red-500 text-xs font-medium">
                                    @error('denomination') {{$message}} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                
                                       <div class="pt-6">
                                        <button
                                            type="submit"
                                            wire:loading.attr="disabled"
                                            wire:target="{{ $isEdit ? 'update' : 'create' }}"
                                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl
                                                hover:from-blue-700 hover:to-purple-700
                                                focus:outline-none focus:ring-4 focus:ring-blue-300
                                                transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl
                                                transform hover:scale-[1.02] active:scale-[0.98]
                                                flex items-center justify-center space-x-2
                                                disabled:opacity-60 disabled:cursor-not-allowed"
                                        >
                                            <!-- Icon -->
                                            <svg wire:loading.remove wire:target="{{ $isEdit ? 'update' : 'create' }}"
                                                class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>

                                            <!-- Loading Spinner -->
                                            <svg wire:loading wire:target="{{ $isEdit ? 'update' : 'create' }}"
                                                class="w-6 h-6 animate-spin" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8v8z"/>
                                            </svg>

                                            <span wire:loading.remove wire:target="{{ $isEdit ? 'update' : 'create' }}">
                                                {{ $isEdit ? "Update Registration" : "Submit Registration" }}
                                            </span>

                                            <span wire:loading wire:target="{{ $isEdit ? 'update' : 'create' }}">
                                                Processing...
                                            </span>
                                        </button>
                                    </div>


                    <!-- Helper Text -->
                    <div class="text-center pt-4">
                        <p class="text-sm text-gray-500">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Your information is secure and will only be used for event registration
                        </p>
                    </div>
                </div>
            </form>

            <!-- Footer -->
            
        </div>
                    </div>
                     <div class="mb-12 w-full lg:mt-0 lg:w-1/3 ml-10">
                    <div class="relative">
                        <img class="w-full rounded-xl object-cover shadow-2xl" 
                             src="../../images/8ef279c1-6174-481e-a8de-40ecf32aaf9b.JPG" alt=""/>
                             
                    </div>
                </div>

                </div>
                    
    </section>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').classList.remove('hidden');
                    document.querySelector('label[for="photo-upload"]').classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
        
        function removeImage() {
            document.getElementById('photo-upload').value = '';
            document.getElementById('image-preview').classList.add('hidden');
            document.querySelector('label[for="photo-upload"]').classList.remove('hidden');
            
            // Trigger Livewire update to clear the photo
            if (window.Livewire) {
                window.Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).set('photo', null);
            }
        }
        
        // Drag and drop functionality
        const dropZone = document.querySelector('label[for="photo-upload"]');
        
        if (dropZone) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight(e) {
                dropZone.classList.add('border-indigo-500', 'bg-indigo-50');
            }
            
            function unhighlight(e) {
                dropZone.classList.remove('border-indigo-500', 'bg-indigo-50');
            }
            
            dropZone.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length > 0) {
                    document.getElementById('photo-upload').files = files;
                    previewImage({ target: { files: files } });
                }
            }
        }
    </script>
</div>
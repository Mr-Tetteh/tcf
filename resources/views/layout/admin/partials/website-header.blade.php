@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Storage; @endphp

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-3 mt-3 ms-3 text-sm text-gray-600 rounded-xl sm:hidden hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:text-gray-300 dark:hover:bg-gradient-to-r dark:hover:from-gray-800 dark:hover:to-gray-700 dark:focus:ring-blue-400 transition-all duration-300 ease-in-out shadow-sm hover:shadow-md">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6 transition-transform duration-200 hover:scale-110" aria-hidden="true" fill="currentColor"
         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="default-sidebar"
       class="fixed top-0 left-0 z-40 w-72 h-screen transition-all duration-500 -translate-x-full sm:translate-x-0 motion-preset-blur-right motion-duration-1500 backdrop-blur-sm"
       aria-label="Sidebar">
    <div
        class="h-full px-6 py-8 overflow-y-auto bg-gradient-to-br from-slate-50 via-white to-blue-50 dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 border-r border-slate-200 dark:border-gray-700 shadow-xl">

        <!-- User Profile Section -->
        <div
            class="flex flex-col items-center mb-8 space-y-4 p-4 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-slate-200/50 dark:border-gray-700/50 shadow-lg">
            @if(Auth::user()->profile_picture)
                <div class="relative">
                    <img src="{{Storage::url(Auth::user()->profile_picture)}}" alt="profile_picture"
                         class="size-16 rounded-2xl ring-4 ring-blue-100 dark:ring-blue-900 shadow-lg hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full shadow-sm"></div>
                </div>
            @else
                <div class="relative">
                    <img
                        class="size-16 rounded-2xl ring-4 ring-blue-100 dark:ring-blue-900 shadow-lg hover:scale-105 transition-transform duration-300"
                        src="../../../images/user-icon-on-transparent-background-free-png.webp"
                        alt="profile Picture"
                    />
                    <div
                        class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full shadow-sm"></div>
                </div>
            @endif
            <div class="text-center">
                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">Welcome back!</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">{{Auth::user()->name ?? 'Admin'}}</p>
            </div>
        </div>

        <ul class="space-y-3 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{route('admin.dashboard')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-blue-500 hover:to-indigo-600 hover:text-white dark:hover:from-blue-600 dark:hover:to-indigo-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-blue-200 dark:hover:border-blue-800">
                    <div
                        class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-blue-600 dark:text-blue-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Dashboard</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
            </li>

            <!-- Register User -->
            <li>
                <a href="{{route('register')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-emerald-500 hover:to-teal-600 hover:text-white dark:hover:from-emerald-600 dark:hover:to-teal-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-emerald-200 dark:hover:border-emerald-800">
                    <div
                        class="p-2 bg-emerald-100 dark:bg-emerald-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <span class="flex-1 ms-3 font-medium whitespace-nowrap">Register User</span>
                
                </a>
            </li>

            <!-- Users -->
            <li>
                <a href="{{route('admin.admin_users')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-600 hover:text-white dark:hover:from-purple-600 dark:hover:to-pink-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-purple-200 dark:hover:border-purple-800">
                    <div
                        class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-purple-600 dark:text-purple-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <span class="flex-1 ms-3 font-medium whitespace-nowrap">Users</span>
    
                </a>
            </li>

            <!-- Members Management -->

            <li>
                <a href="{{route('admin.register_member')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-600 hover:text-white dark:hover:from-indigo-600 dark:hover:to-purple-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-indigo-200 dark:hover:border-indigo-800">
                    <div
                        class="p-2 bg-indigo-100 dark:bg-indigo-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-orange-600 dark:text-orange-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Member Management</span>
                </a>
            </li>

            <!-- Sermon -->
            <li>
                <a href="{{route('admin.sermon')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-600 hover:text-white dark:hover:from-indigo-600 dark:hover:to-purple-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-indigo-200 dark:hover:border-indigo-800">
                    <div
                        class="p-2 bg-indigo-100 dark:bg-indigo-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-indigo-600 dark:text-indigo-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Sermon</span>
                
                </a>
            </li>

            <!-- Gallery -->
            <li>
                <a href="{{route('admin.gallery')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-pink-500 hover:to-rose-600 hover:text-white dark:hover:from-pink-600 dark:hover:to-rose-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-pink-200 dark:hover:border-pink-800">
                    <div
                        class="p-2 bg-pink-100 dark:bg-pink-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-pink-600 dark:text-pink-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Gallery</span>
            
                </a>
            </li>

            <!-- Upcoming Events -->
            <li>
                <a href="{{route('admin.events')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-600 hover:text-white dark:hover:from-cyan-600 dark:hover:to-blue-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-cyan-200 dark:hover:border-cyan-800">
                    <div
                        class="p-2 bg-cyan-100 dark:bg-cyan-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-cyan-600 dark:text-cyan-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Upcoming events</span>
                
                </a>
            </li>

            <!-- Study Materials -->
            <li>
                <a href="{{route('admin.study_material')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-amber-500 hover:to-orange-600 hover:text-white dark:hover:from-amber-600 dark:hover:to-orange-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-amber-200 dark:hover:border-amber-800">
                    <div
                        class="p-2 bg-amber-100 dark:bg-amber-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-amber-600 dark:text-amber-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6c-.6-.45-1.25-.75-2-1zm0 13.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5v-12c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5v12z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Study Materials</span>
                
                </a>
            </li>

                <li>
                <a href="{{route('admin.pledge')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-amber-500 hover:to-orange-600 hover:text-white dark:hover:from-amber-600 dark:hover:to-orange-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-amber-200 dark:hover:border-amber-800">
                    <div
                        class="p-2 bg-amber-100 dark:bg-amber-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-amber-600 dark:text-amber-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6c-.6-.45-1.25-.75-2-1zm0 13.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5v-12c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5v12z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Pledge</span>
                
                </a>
            </li>


           

            <!-- Family Gathering Management -->
            <li class="menu-item relative z-20">
                <button
                    type="button"
                    class="flex items-center w-full p-3 text-gray-700 rounded-xl dark:text-gray-200
               hover:bg-gradient-to-r hover:from-teal-500 hover:to-green-600 hover:text-white
               dark:hover:from-teal-600 dark:hover:to-green-700 group transition-all
               duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg
               border border-transparent hover:border-teal-200 dark:hover:border-teal-800"
                    onclick="this.nextElementSibling.classList.toggle('hidden');
                 this.querySelector('.menu-arrow').classList.toggle('rotate-90')"
                    aria-expanded="false"
                    aria-controls="family-gathering-submenu"
                >
                    <div
                        class="p-2 bg-teal-100 dark:bg-teal-900 rounded-lg
                   group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-teal-600 dark:text-teal-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4.5c0-1.1.9-2
                       2-2 .85 0 1.6.55 1.85 1.35L8.8 15c.2.65.9 1.15 1.7 1.15H14c1.1 0 2 .9 2 2v2H4zm12.5-11.5c.83
                       0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S15 4.67 15 5.5s.67 1.5 1.5 1.5zM6.5 6C7.33 6 8
                       5.33 8 4.5S7.33 3 6.5 3 5 3.67 5 4.5 5.67 6 6.5 6zm5
                       6.5c.83 0 1.5-.67 1.5-1.5S12.33 9 11.5 9 10
                       9.67 10 10.5s.67 1.5 1.5 1.5z"/>
                        </svg>
                    </div>
                    <span class="flex-1 ms-3 text-left font-medium whitespace-nowrap">
            Family Gathering Mgmt
        </span>
                    <svg class="w-4 h-4 menu-arrow transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="family-gathering-submenu"
                    class="submenu hidden py-20 space-y-4 pl-4 mt-2 border-l-2 border-teal-200 dark:border-teal-800 overflow-y-auto">

                    <!-- Register Member -->
                    <li class="bg-white dark:bg-gray-800 shadow-md rounded-xl hover:shadow-lg transition duration-300 ">
                        <a href="{{route('admin.family_gathering')}}"
                           class="flex items-center w-full p-4 text-gray-600 dark:text-gray-300
                      rounded-xl group hover:bg-gradient-to-r hover:from-teal-500
                      hover:to-green-600 hover:text-white">
                            <svg class="w-4 h-4 mr-2 text-teal-500 group-hover:text-white"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10.293 15.707a1 1 0 010-1.414L14.586
                             10l-4.293-4.293a1 1 0 111.414-1.414L16
                             10l-5.293 5.293a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Register & Registered Member(s)
                        </a>
                         <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    </li>

                       <li class="bg-white dark:bg-gray-800 shadow-md rounded-xl hover:shadow-lg transition duration-300">
                        <a href="{{route('admin.expenditure')}}"
                           class="flex items-center w-full p-4 text-gray-600 dark:text-gray-300
                      rounded-xl group hover:bg-gradient-to-r hover:from-teal-500
                      hover:to-green-600 hover:text-white">
                            <svg class="w-4 h-4 mr-2 text-teal-500 group-hover:text-white"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10.293 15.707a1 1 0 010-1.414L14.586
                             10l-4.293-4.293a1 1 0 111.414-1.414L16
                             10l-5.293 5.293a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Expenditure Management
                             
                        </a>
                    </li>


                     <li class="bg-white dark:bg-gray-800 shadow-md rounded-xl hover:shadow-lg transition duration-300">
                        <a href="{{route('admin.familyGatheringAllYears')}}"
                           class="flex items-center w-full p-4 text-gray-600 dark:text-gray-300
                      rounded-xl group hover:bg-gradient-to-r hover:from-teal-500
                      hover:to-green-600 hover:text-white">
                            <svg class="w-4 h-4 mr-2 text-teal-500 group-hover:text-white"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10.293 15.707a1 1 0 010-1.414L14.586
                             10l-4.293-4.293a1 1 0 111.414-1.414L16
                             10l-5.293 5.293a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Registered Participants All Years
                             
                        </a>
                    </li>

                    

                    <!-- Record Management -->
                    <li class="bg-white dark:bg-gray-800 shadow-md rounded-xl hover:shadow-lg transition duration-300">
                        <a href="{{route('admin.record_management')}}"
                           class="flex items-center w-full p-4 text-gray-600 dark:text-gray-300
                      rounded-xl group hover:bg-gradient-to-r hover:from-teal-500
                      hover:to-green-600 hover:text-white">
                            <svg class="w-4 h-4 mr-2 text-teal-500 group-hover:text-white"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10.293 15.707a1 1 0 010-1.414L14.586
                             10l-4.293-4.293a1 1 0 111.414-1.414L16
                             10l-5.293 5.293a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Record Management
                        </a>
                    </li>

                    <!-- Family Gathering Registration -->
                   
                </ul>
            </li>

            <!-- Financial Management -->
            <li class="menu-item relative z-20">
                <button
                    type="button"
                    class="flex items-center w-full p-3 text-gray-700 rounded-xl dark:text-gray-200
               hover:bg-gradient-to-r hover:from-yellow-500 hover:to-amber-600 hover:text-white
               dark:hover:from-yellow-600 dark:hover:to-amber-700 group transition-all
               duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg
               border border-transparent hover:border-yellow-200 dark:hover:border-yellow-800"
                    onclick="this.nextElementSibling.classList.toggle('hidden');
                 this.querySelector('.menu-arrow').classList.toggle('rotate-90')"
                    aria-expanded="false"
                    aria-controls="financial-submenu"
                >
                    <div
                        class="p-2 bg-yellow-100 dark:bg-yellow-900 rounded-lg
                   group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-yellow-600 dark:text-yellow-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85
                       1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5
                       1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3
                       2.41 0 .69-.49 1.79-2.7 1.79-2.07 0-2.87-.92-2.98-2.1h-2.2c.12
                       2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5
                       3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                        </svg>
                    </div>
                    <span class="flex-1 ms-3 text-left font-medium whitespace-nowrap">
            Financial Mgmt
        </span>
                    <svg class="w-4 h-4 menu-arrow transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="financial-submenu"
                    class="submenu hidden py-7 space-y-2 pl-4 mt-2 border-l-2 border-yellow-200 dark:border-yellow-800 overflow-y-auto">

                    <!-- Record Financial -->
                    <li>
                        <a href="{{route('admin.finance')}}"
                           class="flex items-center w-full p-2 text-gray-600 dark:text-gray-300
                      transition duration-200 rounded-lg pl-8 group
                      hover:bg-yellow-50 dark:hover:bg-yellow-900/20
                      hover:text-yellow-700 dark:hover:text-yellow-300">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10.293 15.707a1 1 0 010-1.414L14.586
                             10l-4.293-4.293a1 1 0 111.414-1.414L16
                             10l-5.293 5.293a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Record Financial
                        </a>
                    </li>

                    <!-- Online Transaction -->
                    <li>
                        <a href="{{route('admin.online')}}"
                           class="flex items-center w-full p-2 text-gray-600 dark:text-gray-300
                      transition duration-200 rounded-lg pl-8 group
                      hover:bg-yellow-50 dark:hover:bg-yellow-900/20
                      hover:text-yellow-700 dark:hover:text-yellow-300">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M10.293 15.707a1 1 0 010-1.414L14.586
                             10l-4.293-4.293a1 1 0 111.414-1.414L16
                             10l-5.293 5.293a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Online Transaction
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Divider -->
            <li class="my-4">
                <hr class="border-gray-300 dark:border-gray-600">
            </li>

            <!-- Home -->
            <li>
                <a href="{{route('home')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-green-500 hover:to-emerald-600 hover:text-white dark:hover:from-green-600 dark:hover:to-emerald-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-green-200 dark:hover:border-green-800">
                    <div
                        class="p-2 bg-green-100 dark:bg-green-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-green-600 dark:text-green-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Home</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
            </li>

            <!-- FAQs -->
            <li>
                <a href="{{route('admin.contact')}}"
                   class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-violet-500 hover:to-purple-600 hover:text-white dark:hover:from-violet-600 dark:hover:to-purple-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-violet-200 dark:hover:border-violet-800">
                    <div
                        class="p-2 bg-violet-100 dark:bg-violet-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-violet-600 dark:text-violet-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">Faqs</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </a>
            </li>

            <!-- Profile -->
            <li>
                <x-responsive-nav-link :href="route('profile.edit')"
                                       class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-gradient-to-r hover:from-slate-500 hover:to-gray-600 hover:text-white dark:hover:from-slate-600 dark:hover:to-gray-700 group transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg border border-transparent hover:border-slate-200 dark:hover:border-slate-800">
                    <div
                        class="p-2 bg-slate-100 dark:bg-slate-900 rounded-lg group-hover:bg-white/20 transition-colors duration-300">
                        <svg
                            class="w-5 h-5 text-slate-600 dark:text-slate-400 group-hover:text-white transition duration-300"
                            fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <span class="ms-3 font-medium">{{ __('Profile') }}</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </x-responsive-nav-link>
            </li>
        </ul>
    </div>
</aside>

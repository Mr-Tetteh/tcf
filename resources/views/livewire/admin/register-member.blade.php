<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="mb-8 bg-white p-6 rounded-xl shadow-sm w-1/2 lg:ml-52">
                    <button wire:click="toggleModalOn"
                            class="w-full bg-blue-400 text-gray-700 py-3 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 font-medium text-lg flex items-center justify-center gap-2"
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Member
                    </button>


                    <button
                        type="button"
                        wire:click="export"
                        class="w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 font-medium text-lg flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download Excel Template
                    </button>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Import Records</h2>
                    <form wire:submit="import" class="space-y-4">
                        @csrf
                        <div class="flex items-center gap-4">
                            <div class="flex-1">
                                <label
                                    class="flex items-center justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-lg appearance-none cursor-pointer hover:border-blue-500 focus:outline-none">
                                    <input type="file" wire:model="csv" class="">
                                </label>
                                <div class="text-red-400 text-sm mt-2">
                                    @error('csv') {{$message}} @enderror
                                </div>
                            </div>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            @if($modal)
                <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <!-- Backdrop -->
                    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

                    <!-- Modal Container -->
                    <div class="fixed inset-0 z-50 overflow-y-auto">
                        <div class="flex min-h-full items-center justify-center p-4">
                            <div
                                class="relative w-full max-w-5xl transform rounded-2xl bg-white shadow-2xl transition-all">
                                <!-- Modal Header -->
                                <div class="absolute right-4 top-4">
                                    <button wire:click="closeModal"
                                            class="rounded-full p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Modal Content -->
                                <div class="p-6 sm:p-8">
                                    <!-- Success Message -->
                                    @if (session()->has('message'))
                                        <div class="mb-6 animate-fade-in">
                                            <div
                                                class="flex items-center rounded-lg bg-green-50 p-4 text-green-700 shadow-sm">
                                                <svg class="h-5 w-5 text-green-400" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                                </svg>
                                                <span class="ml-3 font-medium">{{ session('message') }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    <form wire:submit="{{$isEdit ? 'update' : 'create'}}" class="space-y-8">
                                        <!-- Form Header -->
                                        <div class="border-b border-gray-200 pb-6">
                                            <h2 class="text-3xl font-bold text-gray-900">Members Registration</h2>
                                            <p class="mt-2 text-sm text-gray-600">Please complete all required
                                                fields marked with an asterisk (*)</p>
                                        </div>

                                        <!-- Form Sections -->
                                        <div class="grid gap-8">
                                            <!-- Personal Information -->
                                            <div
                                                class="rounded-xl bg-gradient-to-r from-gray-50 to-white p-6 shadow-sm">
                                                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                                    <svg class="mr-2 h-5 w-5 text-blue-500" fill="none"
                                                         stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                    </svg>
                                                    Personal Information
                                                </h3>
                                                <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-3">
                                                    <!-- First Name -->
                                                    <div class="relative">
                                                        <label for="firstName"
                                                               class="block text-sm font-medium text-gray-700">
                                                            First Name <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" id="firstName" wire:model="first_name"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                               placeholder="Enter first name">
                                                        @error('first_name')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="relative">
                                                        <label for="lastName"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Last Name <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" id="lastName" wire:model="last_name"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                               placeholder="Enter last name">
                                                        @error('last_name')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Other Names -->
                                                    <div class="relative">
                                                        <label for="otherNames"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Other Names
                                                        </label>
                                                        <input type="text" id="otherNames" wire:model="other_names"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                               placeholder="Enter other names">
                                                        @error('other_names')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contact Information -->
                                            <div
                                                class="rounded-xl bg-gradient-to-r from-gray-50 to-white p-6 shadow-sm">
                                                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                                    <svg class="mr-2 h-5 w-5 text-blue-500" fill="none"
                                                         stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>
                                                    Contact Information
                                                </h3>
                                                <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                                                    <!-- Residence -->
                                                    <div class="relative">
                                                        <label for="residence"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Residence <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="text" id="residence" wire:model="residence"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                               placeholder="Enter residence">
                                                        @error('residence')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Contact -->
                                                    <div class="relative">
                                                        <label for="contact"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Contact Number <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="tel" id="contact" wire:model="contact"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                               placeholder="Enter contact number">
                                                        @error('contact')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Church Information -->
                                            <div
                                                class="rounded-xl bg-gradient-to-r from-gray-50 to-white p-6 shadow-sm">
                                                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                                    <svg class="mr-2 h-5 w-5 text-blue-500" fill="none"
                                                         stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                    </svg>
                                                    Church Information
                                                </h3>
                                                <div class="mt-6">
                                                    <label for="church"
                                                           class="block text-sm font-medium text-gray-700">
                                                        Church Name <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" id="church" wire:model="church"
                                                           class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                           placeholder="Enter church name">
                                                    @error('church')
                                                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Additional Information -->
                                            <div
                                                class="rounded-xl bg-gradient-to-r from-gray-50 to-white p-6 shadow-sm">
                                                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                                    <svg class="mr-2 h-5 w-5 text-blue-500" fill="none"
                                                         stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    Additional Information
                                                </h3>
                                                <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-3">
                                                    <!-- Age -->
                                                    <div class="relative">
                                                        <label for="age"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Age <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="number" id="age" wire:model="age"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
                                                               placeholder="Enter age">
                                                        @error('age')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Date of Birth -->
                                                    <div class="relative">
                                                        <label for="dob"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Date of Birth <span class="text-red-500">*</span>
                                                        </label>
                                                        <input type="date" id="dob" wire:model="date_of_birth"
                                                               class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                                                        @error('date_of_birth')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Gender -->
                                                    <div class="relative">
                                                        <label for="gender"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Gender <span class="text-red-500">*</span>
                                                        </label>
                                                        <select id="gender" wire:model="gender"
                                                                class="mt-1 block w-full rounded-lg border-gray-300 px-4 py-3 shadow-sm transition duration-150 ease-in-out focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20">
                                                            <option value="">Select gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                        @error('gender')
                                                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Age Category -->
                                                    <div class="relative md:col-span-3">
                                                        <label for="ageCategory"
                                                               class="block text-sm font-medium text-gray-700">
                                                            Age Category <span class="text-red-500">*</span>
                                                        </label>
                                                        <select
                                                            id="ageCategory"
                                                            name="ageCategory"
                                                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                            wire:model="age_category"
                                                        >
                                                            <option value="">Select age category</option>
                                                            <option value="child">Child</option>
                                                            <option value="youth">Youth</option>
                                                            <option value="adult">Adult</option>
                                                        </select>
                                                        <div class="text-red-400">
                                                            @error('age_category')
                                                            {{$message}}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="pt-4">
                                                        <button
                                                            type="submit"
                                                            class="w-full bg-blue-600 text-white py-2 px-4
                                                                rounded-lg hover:bg-blue-700 focus:outline-none
                                                                 focus:ring-2 focus:ring-blue-500
                                                                 focus:ring-offset-2 transition-colors duration-200"
                                                        >
                                                            Submit Registration
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>


@endif
</div>
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="text-xl font-semibold text-gray-800 mb-6">Registered Members</div>
    <div class="overflow-x-auto">
        <table id="sorting-table" class="w-full">

            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">

                <span class="flex items-center">
                    Full Name
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>
                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    	RESIDENCE
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>
                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    CONTACT
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>
                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                    <span class="flex items-center">
                    GENDER
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>
                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    CHURCH
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>
                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    AGE
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    DATE OF BIRTH
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    Age Category
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider bg-gray-50">
                <span class="flex items-center">
                    ACTIONS
                </span>
                </th>
            </tr>

            </thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($members as $member)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 font-semibold">
                                {{$member->first_name[0]}}{{$member->other_names[0] ?? ''}}{{$member->last_name[0]}}

                            </div>
                            <div class="ml-4">
                                <div
                                    class="font-medium text-gray-900">{{$member->first_name}} {{$member->other_names}} {{$member->last_name}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    {{$member->residence}}
                                </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{$member->contact}}</td>
                    <td class="px-6 py-4 text-gray-500">{{$member->gender}}</td>
                    <td class="px-6 py-4">
                                <span class="font-medium text-gray-900">
                                   {{$member->church}}
                                </span>
                    </td>
                    <td class="px-6 py-4">
                                <span
                                    class="font-medium text-gray-900">
                                    {{$member->age}}
                                </span>
                    </td>
                    <td class="px-6 py-4">
                                     <span
                                         class="font-medium text-gray-900">
                                    {{$member->date_of_birth}}
                                </span>
                    </td>
                    <td class="px-6 py-4">
                                     <span
                                         class="font-medium text-gray-900">
                                    {{$member->age_category}}
                                </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-3">
                            <button
                                wire:click="edit({{$member->id}})"
                                class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5"
                                     fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Edit
                            </button>
                            <button wire:click="delete({{$member->id}})"
                                    class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5"
                                     fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$members->links()}}
    </div>

</div>

@script
<script>

    if (document.getElementById("sorting-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#sorting-table", {
            searchable: false,
            perPageSelect: false,
            sortable: true
        });
    }

</script>
@endscript

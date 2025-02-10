<div class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit="{{$isEdit ? "update" : "create"}}" class="bg-white rounded-xl shadow-sm p-6 space-y-6">
                        <div class="text-xl font-semibold text-gray-800 mb-6">Members Registration </div>

                        <!-- Name Fields Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input
                                    type="text"
                                    id="firstName"
                                    name="firstName"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="first_name"
                                >
                                <div class="text-red-400">
                                    @error('first_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input
                                    type="text"
                                    id="lastName"
                                    name="lastName"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="last_name"
                                >
                                <div class="text-red-400">
                                    @error('last_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="otherNames" class="block text-sm font-medium text-gray-700">Other Names</label>
                                <input
                                    type="text"
                                    id="otherNames"
                                    name="otherNames"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="other_names"
                                >
                                <div class="text-red-400">
                                    @error('other_names')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Residence</label>
                                <input
                                    type="text"
                                    id="email"
                                    name="email"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="residence"
                                >
                                <div class="text-red-400">
                                    @error('residence')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                <input
                                    type="text"
                                    id="contact"
                                    name="contact"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="contact"
                                >
                                <div class="text-red-400">
                                    @error('contact')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Church Info -->
                        <div class="space-y-2">
                            <label for="church" class="block text-sm font-medium text-gray-700">Church</label>
                            <input
                                type="text"
                                id="church"
                                name="church"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                wire:model="church"
                            >
                            <div class="text-red-400">
                                @error('church')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <!-- Age, DOB, and Gender Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                                <input
                                    type="number"
                                    id="age"
                                    name="age"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="age"
                                >
                                <div class="text-red-400">
                                    @error('age')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <input
                                    type="date"
                                    id="dob"
                                    name="dob"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="date_of_birth"
                                >
                                <div class="text-red-400">
                                    @error('date_of_birth')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select
                                    id="gender"
                                    name="gender"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    wire:model="gender"
                                >
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <div class="text-red-400">
                                    @error('gender')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Age Category -->
                        <div class="space-y-2">
                            <label for="ageCategory" class="block text-sm font-medium text-gray-700">Age Category</label>
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

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200"
                            >
                                Submit Registration
                            </button>
                        </div>
                    </form>

                </div>
                <div class="lg:w-7/12">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="text-xl font-semibold text-gray-800 mb-6">Registered Members</div>
                        <div class="overflow-x-auto">
                            <table class="w-full">

                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Full Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Residence</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Contact</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Gender</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Church</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Age</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Date of Birth</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Age Category</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach($members as $member)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 font-semibold">
                                                {{$member->first_name[0]}}{{$member->other_names[0]}}{{$member->last_name[0]}}

                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{$member->first_name}} {{$member->other_names}} {{$member->last_name}}</div>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                Edit
                                            </button>
                                            <button wire:click="delete({{$member->id}})"
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
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

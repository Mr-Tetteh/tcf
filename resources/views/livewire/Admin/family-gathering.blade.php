<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-5/12">
                    <form wire:submit="{{$isEdit ? "update": "create" }}" class="bg-white rounded-xl shadow-sm p-6 space-y-6">

                        <div class="text-xl font-semibold text-gray-800 mb-6">Family Gathering {{\Carbon\Carbon::now()->year}}
                            Registration Form
                        </div>

                        <!-- Name Fields Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="firstName" class="block text-sm font-medium text-gray-700">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="first_name"
                                    type="text"
                                    id="firstName"
                                    name="firstName"
                                    placeholder="Enter first name"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                                <div class="text-red-400">
                                    @error('first_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="lastName" class="block text-sm font-medium text-gray-700">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="last_name"
                                    type="text"
                                    id="lastName"
                                    name="lastName"
                                    placeholder="Enter last name"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >

                                <div class="text-red-400">
                                    @error('last_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Other Names and Residence -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="otherNames" class="block text-sm font-medium text-gray-700">Other
                                    Names</label>
                                <input
                                    wire:model="other_names"
                                    type="text"
                                    id="otherNames"
                                    name="otherNames"
                                    placeholder="Enter other names"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >

                                <div class="text-red-400">
                                    @error('other_names')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="residence" class="block text-sm font-medium text-gray-700">
                                    Residence <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="residence"
                                    type="text"
                                    id="residence"
                                    name="residence"
                                    placeholder="Enter residence"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                                <div class="text-red-400">
                                    @error('residence')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- Gender and Age Group -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="gender" class="block text-sm font-medium text-gray-700">
                                    Gender <span class="text-red-500">*</span>
                                </label>
                                <select
                                    wire:model="gender"
                                    id="gender"
                                    name="gender"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                <div class="text-red-400">
                                    @error('gender')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="contact" class="block text-sm font-medium text-gray-700">
                                    Contact Number <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="contact"
                                    type="number"
                                    id="contact"
                                    name="contact"
                                    placeholder="Enter contact number"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                                <div class="text-red-400">
                                    @error('contact')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- Contact and Church -->

                        <div class="space-y-2">
                            <label for="church" class="block text-sm font-medium text-gray-700">
                                Church <span class="text-red-500">*</span>
                            </label>
                            <input
                                wire:model="church"
                                type="text"
                                id="church"
                                name="church"
                                placeholder="Enter church name"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                            <div class="text-red-400">
                                @error('church')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 font-medium text-lg"
                            >
                                Submit Registration
                            </button>
                        </div>
                    </form>
                </div>
                <div class="lg:w-7/12">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="text-xl font-semibold text-gray-800 mb-6">Registered Members
                            for {{\Carbon\Carbon::now()->year}}</div>
                        <div class="overflow-x-auto">
                            @foreach($familiesByYear as $year => $families)
                                <h2 class="text-lg font-bold text-gray-700 mt-6">Year: {{ $year }}</h2>
                                <table class="w-full border-collapse border border-gray-300 mt-3">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Full Name</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Residence</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Contact</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Gender</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Church</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Actions</th>
                                    </tr>
                                    </thead>
                                    <div class="flex flex-row gap-10">
                                        @foreach($familiesByYear as $year => $families)
                                            <h2>Year {{ $year }}</h2>
                                            Males: {{ $males[$year] }}
                                            Females: {{ $females[$year] }}
                                        @endforeach
                                    </div>
                                    <tbody class="divide-y divide-gray-100">
                                    @foreach($families as $family)
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4">{{ $family->first_name }} {{ $family->other_names }} {{ $family->last_name }}</td>
                                            <td class="px-6 py-4">{{ $family->residence }}</td>
                                            <td class="px-6 py-4">{{ $family->contact }}</td>
                                            <td class="px-6 py-4">{{ $family->gender }}</td>
                                            <td class="px-6 py-4">{{ $family->church }}</td>
                                            <td class="px-6 py-4">
                                                <button
                                                    wire:click="edit({{$family->id}})"
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
                                                <button
                                                    class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


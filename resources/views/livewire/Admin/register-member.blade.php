<div class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    <form class="bg-white rounded-xl shadow-sm p-6 space-y-6">
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
                                    required
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input
                                    type="text"
                                    id="lastName"
                                    name="lastName"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="otherNames" class="block text-sm font-medium text-gray-700">Other Names</label>
                                <input
                                    type="text"
                                    id="otherNames"
                                    name="otherNames"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Residence</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                <input
                                    type="tel"
                                    id="contact"
                                    name="contact"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >
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
                                required
                            >
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
                                    required
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <input
                                    type="date"
                                    id="dob"
                                    name="dob"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select
                                    id="gender"
                                    name="gender"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required
                                >
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- Age Category -->
                        <div class="space-y-2">
                            <label for="ageCategory" class="block text-sm font-medium text-gray-700">Age Category</label>
                            <select
                                id="ageCategory"
                                name="ageCategory"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required
                            >
                                <option value="">Select age category</option>
                                <option value="child">Child</option>
                                <option value="youth">Youth</option>
                                <option value="adult">Adult</option>
                            </select>
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
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 font-semibold">
                                                JD
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">John Doe</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    Meduma
                                </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">0244544661</td>
                                    <td class="px-6 py-4 text-gray-500">Male</td>
                                    <td class="px-6 py-4">
                                <span class="font-medium text-gray-900">
                                   BBT
                                </span>
                                    </td>
                                    <td class="px-6 py-4">
                                <span
                                    class="font-medium text-gray-900">
                                    20
                                </span>
                                    </td>
                                    <td class="px-6 py-4">
                                     <span
                                         class="font-medium text-gray-900">
                                    29-20-2000
                                </span>
                                    </td>
                                    <td class="px-6 py-4">
                                     <span
                                         class="font-medium text-gray-900">
                                    youth
                                </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <button
                                                class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                Edit Member
                                            </button>
                                            <a href="patients/file/add"
                                               class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

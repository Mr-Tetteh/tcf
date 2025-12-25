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
                    <!-- Form Container -->
                    <form class="max-w-3xl mx-auto" wire:submit="{{$isEdit? 'update': 'create'}}">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl p-6">
                            <h2 class="text-2xl font-bold text-white">Picture Upload</h2>
                            <p class="text-blue-100 mt-1">Add a new picture to the Gallery</p>
                        </div>

                        <!-- Form Content -->
                        <div class="bg-white rounded-b-xl shadow-lg p-8 space-y-8">
                            <!-- Picture Details Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Picture Details</h3>

                                <div class="space-y-6">
                                    <!-- Image Name -->
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Image name <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the image name"
                                            wire:model="name"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Image <span class="text-red-500">*</span>
                                        </label>

                                        <!-- Upload Area -->
                                        <div class="relative">
                                            <input
                                                type="file"
                                                accept="image/*"
                                                class="hidden"
                                                id="image-upload"
                                                wire:model="image"
                                            >
                                            <label
                                                for="image-upload"
                                                class="w-full h-48 flex flex-col items-center justify-center px-4 py-6 rounded-lg border-2 border-dashed border-gray-300 hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 cursor-pointer"
                                            >
                                                <!-- Upload Icon Placeholder -->
                                                <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                                </svg>

                                                @if ($image && method_exists($image, 'temporaryUrl'))

                                                    <img src="{{ $image->temporaryUrl() }}" class="mt-5" alt="" width="40%" height="40%">
                                                @endif
                                                <p class="text-sm text-gray-600">Click or drag image to upload</p>
                                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 10MB</p>
                                            </label>
                                        </div>
                                        <div class="text-red-600">
                                            @error('image')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button
                                        type="submit"
                                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center gap-2"
                                    >
                                        <!-- Upload Icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        {{$isEdit? "Update image": "Upload Picture"}}

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>                </div>

                <div class="lg:w-7/12">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="text-xl font-semibold text-gray-800 mb-6">Uploaded Images</div>
                        <div class="overflow-x-auto">
                            <table class="w-full">

                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Image Name </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Image</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Action</th>

                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach($galleries as $gallery)
                                    @if($gallery)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{$gallery->name}}</div>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 text-gray-500">
                                        <img
                                            class="transform transition-transform duration-700 group-hover:scale-110 motion-preset-shake motion-duration-1000"
                                            src="{{ Storage::url($gallery->image) }}"
                                            alt="Family Gathering event"
                                            width="30%"
                                        />
                                    </td>


                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <button
                                                wire:click="edit({{$gallery->id}})"
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
                                            <button wire:click="$set('deleteId', {{ $gallery->id }})"
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
                                    @endif
                                @endforeach
                                </tbody>
                                                                       @if ($deleteId)
       <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fade-in">
    <!-- Modal Container -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md transform transition-all animate-scale-in">
        <!-- Modal Header with Icon -->
        <div class="relative pt-8 pb-6 px-8 text-center">
            <!-- Warning Icon Circle -->
            <div class="mx-auto w-20 h-20 bg-gradient-to-br from-red-100 to-red-50 rounded-full flex items-center justify-center mb-6 shadow-lg animate-bounce-gentle">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center">
                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 mb-3">
                Confirm Deletion
            </h2>
            
            <!-- Description -->
            <p class="text-gray-600 leading-relaxed">
                Are you sure you want to delete this item? 
                <span class="block mt-2 font-semibold text-red-600">This action cannot be undone.</span>
            </p>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-100"></div>

        <!-- Modal Footer with Buttons -->
        <div class="px-8 py-6 bg-gray-50 rounded-b-2xl">
            <div class="flex gap-3">
                <!-- Cancel Button -->
                <button 
                    wire:click="$set('deleteId', null)" 
                    class="flex-1 px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]"
                >
                    Cancel
                </button>
                
                <!-- Delete Button -->
                <button 
                    wire:click="delete" 
                    class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-xl hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-4 focus:ring-red-200 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center space-x-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span>Delete</span>
                </button>
            </div>
        </div>
    </div>
</div>
        @endif
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

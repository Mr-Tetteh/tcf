@php use Illuminate\Support\Facades\Storage; @endphp
<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    <!-- Form Container -->
                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="max-w-3xl mx-auto" wire:submit="{{$isEdit ? 'update' :'create' }} ">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl p-6">
                            <h2 class="text-2xl font-bold text-white">Upcoming Events</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="bg-white rounded-b-xl shadow-lg p-8 space-y-8">
                            <!-- Picture Details Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Events Details</h3>

                                <div class="space-y-6">
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Events Name <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_name"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_name')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Event Time <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="time"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            wire:model="event_time"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_time')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Event Date <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="date"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            wire:model="event_date"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_date')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Events Location <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_location"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_location')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Events Image <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="file"
                                                accept="image/*"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_image"
                                        >
                                    </div>
                                    @if ($event_image && method_exists($event_image, 'temporaryUrl'))

                                        <img src="{{$event_image->temporaryUrl()}}" width="60%" height="40%">
                                    @endif
                                    @if($isEdit && $event_image !==null)
                                        <img src="{{Storage::url($event_image)}}" class="rounded-2xl" width="50%"
                                             alt="">
                                    @endif
                                    <div class="text-red-600">
                                        @error('event_image')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Events Host <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_host"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_host')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Main speaker
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_1"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_1')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Second Events speaker 
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_2"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_2')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Third Events speaker
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_3"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_3')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Fourth Events speaker 
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_4"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_4')
                                        {{$message}}
                                        @enderror
                                    </div>
                                     <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Fifth Events speaker 
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_5"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_5')
                                        {{$message}}
                                        @enderror
                                    </div>
                                     <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Sixth Events speaker 
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_6"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_6')
                                        {{$message}}
                                        @enderror
                                    </div>

                                     <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Seventh Events speaker 
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_7"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_7')
                                        {{$message}}
                                        @enderror
                                    </div>


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Seventh Events speaker 
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="event_speaker_7"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('event_speaker_7')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                           Self Registration Link
                                        </label>
                                        <input
                                            type="text"

                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="self_registration_link"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('self_registration_link')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    

                                    <!-- Submit Button -->
                                    <button
                                        type="submit"
                                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center gap-2"
                                    >
                                        <!-- Upload Icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        {{$isEdit ? "Update Record" : "Upload Record"}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="lg:w-7/12">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="text-xl font-semibold text-gray-800 mb-6">Uploaded Record Management</div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Name
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Time
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Date</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Location
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Image</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Host</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Event Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Second Event
                                        Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Third Event
                                        Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Fourth Event
                                        Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Fifth Event
                                        Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Sixth Event
                                        Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Seventh Event
                                        Speaker
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Self Registration
                                        Link
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Action</th>


                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach($records as $record)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{$record->event_name}}</div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{$record->event_time}}</div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{$record->event_date}}</div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_location}}</div>
                                                </div>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="relative group">
                                                <img
                                                    class="object-cover rounded-lg shadow-md transition-all duration-300 group-hover:scale-105 group-hover:shadow-lg"
                                                    src="{{Storage::url($record->event_image)}}" alt="Event image">
                                            </div>
                                        </td>


                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{$record->event_host}}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_1}}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_2}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_3}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_4}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_5}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_6}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div
                                                        class="font-medium text-gray-900">{{$record->event_speaker_7}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <a href="{{$record->self_registration_link}}"
                                                       target="_blank"
                                                       class="text-blue-500 hover:text-blue-700 underline">{{$record->self_registration_link}}</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex space-x-3">
                                                <button
                                                    wire:click="edit({{$record->id}})"
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
                                                <button wire:click="delete({{$record->id}})"
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@php use Illuminate\Support\Facades\Storage; @endphp
<div class="min-h-screen w-full bg-gradient-to-b from-gray-50 to-white motion-preset-compress motion-duration-1500">
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <!-- Enhanced Header -->
            <div class="text-center mb-16">
                <span class="text-blue-600 text-lg font-semibold">Join Us</span>
                <h2 class="text-2xl  md:2xl: font-bold text-gray-900 mt-2">Upcoming Events</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
            </div>

            <!-- Events Container -->
            <div class="max-w-7xl mx-auto space-y-16 py-12 px-4 sm:px-6 lg:px-8">
                @foreach($events as $event)
                    <!-- Event Card -->
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                        <div class="flex flex-col lg:flex-row">
                            <!-- Event Image Section -->
                            <div class="w-full lg:w-2/5 relative overflow-hidden">
                                <div class="absolute top-4 left-4 z-10">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-indigo-600 text-white shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            Flyer
                        </span>
                                </div>
                                <img
                                    class="h-[400px] w-full object-cover transform transition-transform duration-700 group-hover:scale-110"
                                    src="{{Storage::url($event->event_image)}}"
                                    alt="{{$event->event_name}}"
                                />
                            </div>

                            <!-- Event Details Section -->
                            <div class="w-full lg:w-3/5 p-8 lg:p-10">
                                <!-- Event Name -->
                                <div class="mb-6">
                        <span class="inline-block text-xl px-4 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 text-indigo-700 rounded-full font-bold shadow-sm">
                            {{$event->event_name}}
                        </span>
                                </div>

                                <div class="space-y-6">
                                    <!-- Date -->
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <p class="ml-4 text-gray-700 text-lg font-medium">{{$event->event_date}}</p>
                                    </div>

                                    <!-- Time -->
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <p class="ml-4 text-gray-700 text-lg font-medium">{{$event->event_time}}</p>
                                    </div>

                                    <!-- Host -->
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <p class="ml-4 text-gray-700 text-lg"><span class="font-semibold">Host:</span> {{$event->event_host}}</p>
                                    </div>

                                    <!-- Speaker 1 -->
                                    @if($event->event_speaker_1)
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-purple-50 flex items-center justify-center shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <p class="ml-4 text-gray-700 text-lg"><span class="font-semibold">Speaker:</span> {{$event->event_speaker_1}}</p>
                                        </div>
                                    @endif

                                    <!-- Speaker 2 -->
                                    @if($event->event_speaker_2)
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>
                                            <p class="ml-4 text-gray-700 text-lg"><span class="font-semibold">Speaker:</span> {{$event->event_speaker_2}}</p>
                                        </div>
                                    @endif

                                    <!-- Speaker 3 (fixed the conditional that was checking speaker_4 instead of speaker_3) -->
                                    @if($event->event_speaker_3)
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                                </svg>
                                            </div>
                                            <p class="ml-4 text-gray-700 text-lg"><span class="font-semibold">Speaker:</span> {{$event->event_speaker_3}}</p>
                                        </div>
                                    @endif

                                    <!-- Speaker 4 -->
                                    @if($event->event_speaker_4)
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-full bg-teal-50 flex items-center justify-center shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                            </div>
                                            <p class="ml-4 text-gray-700 text-lg"><span class="font-semibold">Speaker:</span> {{$event->event_speaker_4}}</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-8 flex flex-wrap gap-4">
                                    <button class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-300 shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Add to Calendar
                                    </button>

                                    <button class="inline-flex items-center gap-2 px-6 py-3 bg-white text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                        </svg>
                                        Share Event
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

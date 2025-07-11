<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white motion-preset-expand motion-duration-2000">
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center lg:flex-row lg:justify-between lg:space-x-12">
                <div class="w-full text-center lg:w-1/2 lg:text-left">
                    <h1 class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-4xl font-bold tracking-tight text-transparent sm:text-6xl">
                        Inspiring Sermons
                    </h1>
                    <p class="mt-6 text-xl text-gray-600">
                        Elevate your spirit through powerful messages that transform lives
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4 justify-center lg:justify-start">
                        <span
                            class="inline-flex items-center rounded-full bg-purple-100 px-4 py-1 text-sm font-medium text-purple-700">
                            Latest Uploads
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sermons List Section -->
    <section class="py-5">
        <div class="container mx-auto px-4">
            <div class="mb-16 text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest Sermons</h2>
                <p class="text-lg text-gray-600">Listen and be blessed by our collection of inspiring messages</p>
            </div>

            <!-- Sermon Card -->
            <div class="space-y-12 max-w-5xl mx-auto">
                @foreach($datas as $data)
                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex flex-col lg:flex-row">
                            <div class="lg:w-2/5">
                                <div class="relative h-full">
                                    <img class="w-full h-64 lg:h-full object-cover"
                                         src="../../../images/png-clipart-headphones-computer-icons-headphones-electronics-sound.png"
                                         alt="Sermon"/>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-blue-600/20"></div>
                                </div>
                            </div>
                            <div class="lg:w-3/5 p-8">
                                <div class="flex items-center gap-4 mb-4">
                                    <span
                                        class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Date</span>
                                    <span class="text-gray-500">{{$data->created_at->format('jS D Y')}}</span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{$data->title}}</h3>
                                <div class="flex items-center gap-4 mb-6">
                                    <div>
                                        <p class="text-sm text-gray-500"><i>Preacher </i></p>
                                        <p class="font-medium text-gray-900">{{$data->preacher}}</p>
                                    </div>
                                </div>
                                <!-- Audio Player -->
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <div class="flex items-center gap-4">
                                        @if($data->sermon)
                                            <audio controls>
                                                <source src="{{ Storage::url($data->sermon) }}" type="audio/mpeg">

                                            </audio>
                                        @else
                                            <iframe src="{{ Storage::url($data->sermon_file) }}"></iframe>

                                            <a href="{{Storage::url($data->sermon_file) }}"  class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                Download Sermon File
                                            </a>
{{--file--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$datas->links()}}
            </div>
        </div>
    </section>
</div>

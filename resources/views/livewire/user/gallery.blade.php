<div class="min-h-screen w-full bg-gradient-to-b from-gray-50 to-white">
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <!-- Elegant Header -->
            <div class="relative text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-4">Moments</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <!-- Masonry Gallery -->
            @if($gallerys->isNotEmpty())
            @foreach($gallerys as $gallery)
            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8 max-w-7xl mx-auto">
                <!-- Saturday Meetings -->
                <div class="relative break-inside-avoid-column group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl">
                        <img
                            class="w-full transform transition-transform duration-700 group-hover:scale-110 motion-preset-shake motion-duration-1000"
                            src="{{\Illuminate\Support\Facades\Storage::url($gallery->image)}}"
                            alt="Saturday Meeting gathering"
                        />
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="absolute bottom-0 left-0 w-full p-6 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <span class="inline-block px-4 py-1 bg-blue-600 text-white text-sm rounded-full mb-3">{{$gallery->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            @else
                    <h1 class="text-center text-lg font-semibold mt-8">No Images</h1>
                @endif


            </div>
        </div>
    </section>
</div>

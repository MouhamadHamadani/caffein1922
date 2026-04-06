<div>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#3B1E0E] mb-4">Gallery</h1>
                <p class="text-[#8B6347] italic">A glimpse into our world.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($albums as $album)
                    <a href="{{ route('gallery.album', $album->slug) }}" wire:navigate class="group relative overflow-hidden rounded-lg shadow-lg aspect-square">
                        @if($album->hasMedia('cover'))
                            <img src="{{ $album->getFirstMediaUrl('cover') }}" alt="{{ $album->translated_title }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">No Cover</div>
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                            <h3 class="text-white text-2xl font-bold">{{ $album->translated_title }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>

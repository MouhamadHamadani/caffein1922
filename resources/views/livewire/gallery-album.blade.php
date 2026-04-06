<div>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#3B1E0E] mb-4">{{ $album->translated_title }}</h1>
                <a href="{{ route('gallery') }}" wire:navigate class="text-[#C8922A] font-bold hover:underline">← Back to Gallery</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($photos as $photo)
                    <div class="aspect-square overflow-hidden rounded-lg shadow-md">
                        @if($photo->hasMedia('photo'))
                            <img src="{{ $photo->getFirstMediaUrl('photo') }}" alt="{{ $photo->translated_caption }}" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $photos->links() }}
            </div>
        </div>
    </section>
</div>

<div>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#3B1E0E] mb-4">Our Blog</h1>
                <p class="text-[#8B6347] italic">Stories, news, and coffee culture.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                        <div class="h-48 bg-gray-200">
                            @if($post->hasMedia('cover'))
                                <img src="{{ $post->getFirstMediaUrl('cover') }}" alt="{{ $post->translated_title }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-[#3B1E0E] mb-2">{{ $post->translated_title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $post->translated_excerpt }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" wire:navigate class="text-[#C8922A] font-bold hover:underline">Read More →</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</div>

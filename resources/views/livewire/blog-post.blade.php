<div>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                @if($post->hasMedia('cover'))
                    <img src="{{ $post->getFirstMediaUrl('cover') }}" alt="{{ $post->translated_title }}" class="w-full h-96 object-cover rounded-lg shadow-lg">
                @endif
            </div>
            <h1 class="text-5xl font-bold text-[#3B1E0E] mb-4">{{ $post->translated_title }}</h1>
            <div class="flex items-center text-gray-500 text-sm mb-8">
                <span>By {{ $post->user->name }}</span>
                <span class="mx-2">•</span>
                <span>{{ $post->published_at->format('M d, Y') }}</span>
            </div>
            <div class="prose prose-lg max-w-none text-[#3B1E0E]">
                {!! $post->translated_body !!}
            </div>
            <div class="mt-12 pt-8 border-t border-gray-200">
                <a href="{{ route('blog') }}" wire:navigate class="text-[#C8922A] font-bold hover:underline">← Back to Blog</a>
            </div>
        </div>
    </section>
</div>

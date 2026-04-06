<div>
    {{-- Hero Section --}}
    <section class="relative h-screen flex items-center justify-center bg-[#3B1E0E] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero-section.png') }}" alt="Caffeine 1922 Hero" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="text-5xl md:text-8xl font-bold text-white mb-4 tracking-tighter">Caffeine 1922</h1>
            <p class="text-xl md:text-2xl text-[#F0E0C8] mb-8 italic">{{ \App\Models\Setting::get('tagline_' . app()->getLocale()) }}</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="{{ route('menu') }}" wire:navigate class="bg-[#C8922A] text-white px-8 py-4 rounded-full font-bold hover:bg-[#B07D1E] transition">{{ __('site.cta.explore_menu') }}</a>
                <a href="{{ route('reserve') }}" wire:navigate class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-bold hover:bg-white hover:text-[#3B1E0E] transition">{{ __('site.cta.reserve_table') }}</a>
            </div>
        </div>
    </section>

    {{-- About Teaser --}}
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold text-[#3B1E0E] mb-6">Our Story</h2>
                    <p class="text-lg text-[#8B6347] mb-6 leading-relaxed">
                        @if(app()->getLocale() === 'en')
                            Since 1922, Caffeine has been more than a coffee shop — it's a ritual. Born in the heart of Beirut, we roast every bean with the same devotion that has made us a neighborhood institution for over a century. Come for the coffee. Stay for the feeling.
                        @else
                            منذ عام ١٩٢٢، كانت كافيين أكثر من مجرد مقهى — إنها طقس يومي. وُلدنا في قلب بيروت، ونحمّص كل حبة قهوة بنفس الشغف الذي جعلنا جزءاً من نسيج الحي لأكثر من قرن. تعال من أجل القهوة. وابقَ من أجل الإحساس.
                        @endif
                    </p>
                    <a href="{{ route('about') }}" wire:navigate class="text-[#C8922A] font-bold hover:underline">{{ __('site.cta.our_story') }} →</a>
                </div>
                <div class="relative h-96 rounded-lg shadow-xl overflow-hidden" data-aos="fade-left">
                    <img src="{{ asset('images/story.png') }}" alt="Our Story" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Bar --}}
    <section class="bg-[#3B1E0E] py-12 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div data-aos="zoom-in">
                    <div class="text-4xl font-bold text-[#C8922A] mb-2">100+</div>
                    <div class="text-sm uppercase tracking-widest">Years of Heritage</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-4xl font-bold text-[#C8922A] mb-2">{{ \App\Models\Setting::get('rating', '4.9') }}★</div>
                    <div class="text-sm uppercase tracking-widest">Google Rating</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-4xl font-bold text-[#C8922A] mb-2">{{ \App\Models\Setting::get('reviews_count', '500') }}+</div>
                    <div class="text-sm uppercase tracking-widest">Happy Reviews</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Menu --}}
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#3B1E0E]">Our Signature Drinks</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredItems as $item)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                        <div class="h-64 bg-gray-200">
                            @if($item->hasMedia('image'))
                                <img src="{{ $item->getFirstMediaUrl('image') }}" alt="{{ $item->translated_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-[#3B1E0E] mb-2">{{ $item->translated_name }}</h3>
                            <p class="text-[#C8922A] font-bold">{{ $item->price }} {{ $item->currency }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('menu') }}" wire:navigate class="inline-block border-2 border-[#3B1E0E] text-[#3B1E0E] px-8 py-3 rounded-full font-bold hover:bg-[#3B1E0E] hover:text-white transition">{{ __('site.cta.view_menu') }}</a>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="py-20 bg-[#F0E0C8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#3B1E0E]">What People Say</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($testimonials as $testimonial)
                    <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                        <div class="flex justify-center mb-4 text-[#C8922A]">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                ★
                            @endfor
                        </div>
                        <p class="text-lg italic text-[#3B1E0E] mb-6">"{{ $testimonial->content }}"</p>
                        <h4 class="font-bold text-[#3B1E0E]">{{ $testimonial->author_name }}</h4>
                        <span class="text-xs text-gray-500 uppercase tracking-widest">{{ $testimonial->source }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Reservation CTA --}}
    <section class="bg-[#C8922A] py-16 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-white mb-6">Reserve your table today</h2>
            <a href="{{ route('reserve') }}" wire:navigate class="inline-block bg-[#3B1E0E] text-white px-10 py-4 rounded-full font-bold hover:bg-black transition shadow-lg">{{ __('site.cta.book_now') }}</a>
        </div>
    </section>
</div>

<div>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#3B1E0E] mb-4">Our Menu</h1>
                <p class="text-[#8B6347] italic">Handcrafted with passion, served with love.</p>
            </div>

            @foreach($categories as $category)
                <div class="mb-20">
                    <div class="flex items-center mb-8">
                        <h2 class="text-3xl font-bold text-[#3B1E0E] whitespace-nowrap">{{ $category->translated_name }}</h2>
                        <div class="ml-6 rtl:ml-0 rtl:mr-6 flex-grow border-t-2 border-[#F0E0C8]"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        @foreach($category->menuItems as $item)
                            <div class="flex justify-between items-start group">
                                <div class="flex-grow">
                                    <div class="flex items-center">
                                        <h3 class="text-xl font-bold text-[#3B1E0E] group-hover:text-[#C8922A] transition">{{ $item->translated_name }}</h3>
                                        <div class="mx-2 flex-grow border-b border-dotted border-gray-300"></div>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">{{ $item->translated_description }}</p>
                                </div>
                                <div class="ml-4 rtl:ml-0 rtl:mr-4 text-lg font-bold text-[#3B1E0E]">
                                    {{ $item->price }} {{ $item->currency }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

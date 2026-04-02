<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-[#FDF6EC] shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-[#3B1E0E] tracking-wider">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="h-20 w-auto inline-block mr-2">
                    {{-- {{ __('site.name') }} --}}
                </a>
            </div>
            <div class="hidden md:flex items-center gap-8 rtl:space-x-reverse">
                <a href="{{ route('home') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.home') }}</a>
                <a href="{{ route('menu') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.menu') }}</a>
                <a href="{{ route('about') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.about') }}</a>
                <a href="{{ route('gallery') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.gallery') }}</a>
                <a href="{{ route('reserve') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.reserve') }}</a>
                <a href="{{ route('blog') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.blog') }}</a>
                <a href="{{ route('contact') }}" class="text-[#3B1E0E] hover:text-[#C8922A] transition">{{ __('site.nav.contact') }}</a>
                
                <div class="flex items-center border-l border-gray-300 pl-4 rtl:border-l-0 rtl:border-r rtl:pl-0 rtl:pr-4">
                    @if(app()->getLocale() === 'en')
                        <a href="{{ route('lang.switch', 'ar') }}" class="text-sm font-medium text-[#3B1E0E]">AR</a>
                    @else
                        <a href="{{ route('lang.switch', 'en') }}" class="text-sm font-medium text-[#3B1E0E]">EN</a>
                    @endif
                </div>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-[#3B1E0E]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div x-show="open" class="md:hidden bg-[#FDF6EC] border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.home') }}</a>
            <a href="{{ route('menu') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.menu') }}</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.about') }}</a>
            <a href="{{ route('gallery') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.gallery') }}</a>
            <a href="{{ route('reserve') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.reserve') }}</a>
            <a href="{{ route('blog') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.blog') }}</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-[#3B1E0E]">{{ __('site.nav.contact') }}</a>
            <div class="px-3 py-2">
                @if(app()->getLocale() === 'en')
                    <a href="{{ route('lang.switch', 'ar') }}" class="text-[#3B1E0E] font-bold">العربية</a>
                @else
                    <a href="{{ route('lang.switch', 'en') }}" class="text-[#3B1E0E] font-bold">English</a>
                @endif
            </div>
        </div>
    </div>
</nav>

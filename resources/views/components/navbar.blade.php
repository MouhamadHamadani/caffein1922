<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-[#FDF6EC] shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" wire:navigate class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Caffeine 1922 Logo" class="h-20 w-auto mr-3 rtl:mr-0 rtl:ml-3">
                    {{-- <span class="text-2xl font-bold text-[#3B1E0E] tracking-wider hidden sm:inline">CAFFEINE 1922</span> --}}
                </a>
            </div>
            <div class="hidden md:flex items-center gap-8 rtl:space-x-reverse">
                <a href="{{ route('home') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('home') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.home') }}</a>
                <a href="{{ route('menu') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('menu') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.menu') }}</a>
                <a href="{{ route('about') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('about') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.about') }}</a>
                <a href="{{ route('gallery') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('gallery*') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.gallery') }}</a>
                <a href="{{ route('reserve') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('reserve') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.reserve') }}</a>
                <a href="{{ route('blog') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('blog*') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.blog') }}</a>
                <a href="{{ route('contact') }}" wire:navigate class="text-[#3B1E0E] hover:text-[#C8922A] transition {{ request()->routeIs('contact') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.contact') }}</a>
                
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
    <div x-show="open" x-cloak class="md:hidden bg-[#FDF6EC] border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('home') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.home') }}</a>
            <a href="{{ route('menu') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('menu') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.menu') }}</a>
            <a href="{{ route('about') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('about') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.about') }}</a>
            <a href="{{ route('gallery') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('gallery*') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.gallery') }}</a>
            <a href="{{ route('reserve') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('reserve') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.reserve') }}</a>
            <a href="{{ route('blog') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('blog*') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.blog') }}</a>
            <a href="{{ route('contact') }}" wire:navigate class="block px-3 py-2 text-[#3B1E0E] {{ request()->routeIs('contact') ? 'font-bold text-[#C8922A]' : '' }}">{{ __('site.nav.contact') }}</a>
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

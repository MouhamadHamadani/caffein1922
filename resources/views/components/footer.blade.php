<footer class="bg-[#3B1E0E] text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-4">CAFFEINE 1922</h3>
                <p class="text-gray-300 mb-4">{{ \App\Models\Setting::get('tagline_' . app()->getLocale()) }}</p>
                <p class="text-gray-400 text-sm">Roasted with passion since 1922. Born in the heart of Beirut.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.home') }}</a></li>
                    <li><a href="{{ route('menu') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.menu') }}</a></li>
                    <li><a href="{{ route('about') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.about') }}</a></li>
                    <li><a href="{{ route('reserve') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.reserve') }}</a></li>
                    <li><a href="{{ route('gallery') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.gallery') }}</a></li>
                    <li><a href="{{ route('blog') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.blog') }}</a></li>
                    <li><a href="{{ route('contact') }}" wire:navigate class="text-gray-300 hover:text-[#C8922A] transition">{{ __('site.nav.contact') }}</a></li>
                </ul>
            </div>
            @php
                $phone = \App\Models\Setting::get('phone');
                $whatsapp = $phone ? preg_replace('/\D+/', '', $phone) : null;
                $facebook = \App\Models\Setting::get('facebook');
                $instagram = \App\Models\Setting::get('instagram');
            @endphp
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2 text-gray-300">
                    @if($phone)
                        <li>Phone: <a href="tel:{{ preg_replace('/[^\d+]/', '', $phone) }}" class="hover:text-[#C8922A] transition">{{ $phone }}</a></li>
                    @endif
                    <li>Address: {{ \App\Models\Setting::get('address_' . app()->getLocale()) }}</li>
                    <li class="whitespace-pre-line">Hours: {{ \App\Models\Setting::get('hours_' . app()->getLocale()) }}</li>
                </ul>

                @if($whatsapp)
                    <a href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener noreferrer"
                       aria-label="{{ __('site.a11y.whatsapp') }}"
                       class="mt-6 inline-flex items-center gap-2 bg-[#25D366] text-[#0B3B22] px-4 py-2 rounded-full font-bold hover:bg-[#1EBE5A] transition">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.86 9.86 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2Zm0 18.13h-.01a8.2 8.2 0 0 1-4.19-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.36c0-4.54 3.7-8.24 8.25-8.24 2.2 0 4.27.86 5.83 2.42a8.19 8.19 0 0 1 2.41 5.83c0 4.54-3.7 8.21-8.24 8.21Zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.13-.16.24-.64.8-.78.97-.15.16-.29.18-.54.06-.25-.12-1.05-.39-1.99-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.01-.38.11-.5.11-.11.25-.29.37-.44.13-.15.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.12-.56-1.34-.76-1.84-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.07s.9 2.4 1.02 2.56c.12.17 1.76 2.68 4.26 3.76.6.26 1.06.41 1.42.53.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.29Z"/>
                        </svg>
                        WhatsApp
                    </a>
                @endif

                <div class="mt-6 flex space-x-4 rtl:space-x-reverse">
                    @if($facebook)
                        <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" class="text-gray-300 hover:text-[#C8922A] transition">Facebook</a>
                    @endif
                    @if($instagram)
                        <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" class="text-gray-300 hover:text-[#C8922A] transition">Instagram</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
            <p>© {{ date('Y') }} Caffeine 1922. All rights reserved.</p>
        </div>
    </div>
</footer>

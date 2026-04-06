<div>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-xl">
                <h1 class="text-4xl font-bold text-[#3B1E0E] mb-8 text-center">{{ __('site.reservation.title') }}</h1>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="submit" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.name') }}</label>
                            <input type="text" wire:model="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.email') }}</label>
                            <input type="email" wire:model="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.phone') }}</label>
                            <input type="text" wire:model="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.guests') }}</label>
                            <input type="number" wire:model="party_size" min="1" max="20" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                            @error('party_size') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.date') }}</label>
                            <input type="date" wire:model="date" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                            @error('date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.time') }}</label>
                            <input type="time" wire:model="time_slot" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                            @error('time_slot') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.notes') }}</label>
                        <textarea wire:model="notes" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none"></textarea>
                        @error('notes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="w-full bg-[#3B1E0E] text-white py-4 rounded-lg font-bold hover:bg-black transition shadow-lg">
                        <span wire:loading.remove>{{ __('site.reservation.submit') }}</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

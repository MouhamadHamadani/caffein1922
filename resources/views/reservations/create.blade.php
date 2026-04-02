@extends('layouts.app')

@section('content')
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-xl">
                <h1 class="text-4xl font-serif font-bold text-[#3B1E0E] mb-8 text-center">{{ __('site.reservation.title') }}</h1>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('reserve.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.name') }}</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.email') }}</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.phone') }}</label>
                            <input type="text" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.guests') }}</label>
                            <input type="number" name="party_size" min="1" max="20" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.date') }}</label>
                            <input type="date" name="date" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.time') }}</label>
                            <input type="time" name="time_slot" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#3B1E0E] mb-2">{{ __('site.reservation.notes') }}</label>
                        <textarea name="notes" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#C8922A] focus:border-transparent outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#3B1E0E] text-white py-4 rounded-lg font-bold hover:bg-black transition shadow-lg">
                        {{ __('site.reservation.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

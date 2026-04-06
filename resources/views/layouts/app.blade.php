<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    
    {{-- Icon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('icon/site.webmanifest') }}">
    
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-[#FDF6EC] text-[#111111] font-chamberi antialiased">
    <x-navbar />
    
    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>
    
    <x-footer />
    
    @livewireScripts
    @stack('scripts')
</body>
</html>

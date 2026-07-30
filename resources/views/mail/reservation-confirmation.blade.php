<x-mail::message>
# Thank you, {{ $reservation->name }}

We have received your reservation request and will confirm it by email shortly.

- **Date:** {{ $reservation->date->format('D, j M Y') }}
- **Time:** {{ $reservation->time_slot->format('g:i A') }}
- **Party size:** {{ $reservation->party_size }}

@if($reservation->notes)
**Your special requests:** {{ $reservation->notes }}
@endif

This is a request, not a confirmed booking — you will hear from us before your table is held.

See you soon,<br>
Caffeine 1922
</x-mail::message>

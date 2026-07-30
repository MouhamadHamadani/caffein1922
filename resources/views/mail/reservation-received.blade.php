<x-mail::message>
# New reservation request

- **Name:** {{ $reservation->name }}
- **Email:** {{ $reservation->email }}
- **Phone:** {{ $reservation->phone ?: '—' }}
- **Party size:** {{ $reservation->party_size }}
- **Date:** {{ $reservation->date->format('D, j M Y') }}
- **Time:** {{ $reservation->time_slot->format('g:i A') }}

@if($reservation->notes)
**Special requests**

{{ $reservation->notes }}
@endif

<x-mail::button :url="url('/admin/reservations/'.$reservation->id.'/edit')">
Open in admin
</x-mail::button>

Reply to this email to reach {{ $reservation->name }} directly.
</x-mail::message>

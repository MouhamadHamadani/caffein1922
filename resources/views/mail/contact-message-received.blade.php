<x-mail::message>
# New contact message

- **Name:** {{ $contactMessage->name }}
- **Email:** {{ $contactMessage->email }}
- **Phone:** {{ $contactMessage->phone ?: '—' }}
- **Subject:** {{ $contactMessage->subject ?: '—' }}

**Message**

{{ $contactMessage->message }}

Reply to this email to reach {{ $contactMessage->name }} directly.
</x-mail::message>

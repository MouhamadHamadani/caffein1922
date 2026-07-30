<?php

namespace App\Livewire;

use App\Livewire\Concerns\ProtectsAgainstSpam;
use App\Mail\ContactAcknowledgement;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    use ProtectsAgainstSpam;

    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:30',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string|max:2000',
    ];

    public function submit()
    {
        // Bots fill the honeypot or submit instantly — drop it without telling them.
        if ($this->looksAutomated()) {
            $this->finish();

            return;
        }

        if ($this->isRateLimited()) {
            return;
        }

        $this->validate();

        $contactMessage = ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->recordSubmission();

        Mail::to($contactMessage->email)->send(new ContactAcknowledgement($contactMessage));

        if ($owner = config('mail.admin_address')) {
            Mail::to($owner)->send(new ContactMessageReceived($contactMessage));
        }

        $this->finish();
    }

    private function finish(): void
    {
        session()->flash('success', __('site.contact.success'));

        $this->reset(['name', 'email', 'phone', 'subject', 'message', 'website']);
    }

    public function render()
    {
        SEOTools::setTitle(__('site.seo.contact.title'), false);
        SEOTools::setDescription(__('site.seo.contact.description'));

        return view('livewire.contact')->layout('layouts.app');
    }
}

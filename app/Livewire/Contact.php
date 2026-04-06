<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

class Contact extends Component
{
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
        $this->validate();

        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        session()->flash('success', __('site.contact.success'));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact')->layout('layouts.app');
    }
}

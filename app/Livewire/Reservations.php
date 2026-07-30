<?php

namespace App\Livewire;

use App\Livewire\Concerns\ProtectsAgainstSpam;
use App\Mail\ReservationConfirmation;
use App\Mail\ReservationReceived;
use App\Models\Reservation;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Reservations extends Component
{
    use ProtectsAgainstSpam;

    public $name;
    public $email;
    public $phone;
    public $party_size;
    public $date;
    public $time_slot;
    public $notes;

    protected $rules = [
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:30',
        'party_size' => 'required|integer|min:1|max:20',
        'date' => 'required|date|after:today',
        'time_slot' => 'required',
        'notes' => 'nullable|string|max:500',
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

        $reservation = Reservation::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'party_size' => $this->party_size,
            'date' => $this->date,
            'time_slot' => $this->time_slot,
            'notes' => $this->notes,
        ]);

        $this->recordSubmission();

        Mail::to($reservation->email)->send(new ReservationConfirmation($reservation));

        if ($owner = config('mail.admin_address')) {
            Mail::to($owner)->send(new ReservationReceived($reservation));
        }

        $this->finish();
    }

    private function finish(): void
    {
        session()->flash('success', __('site.reservation.success'));

        $this->reset(['name', 'email', 'phone', 'party_size', 'date', 'time_slot', 'notes', 'website']);
    }

    public function render()
    {
        SEOTools::setTitle(__('site.seo.reserve.title'), false);
        SEOTools::setDescription(__('site.seo.reserve.description'));

        return view('livewire.reservations')->layout('layouts.app');
    }
}

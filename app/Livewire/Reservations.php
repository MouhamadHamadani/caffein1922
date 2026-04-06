<?php

namespace App\Livewire;

use App\Models\Reservation;
use Livewire\Component;

class Reservations extends Component
{
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
        $this->validate();

        Reservation::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'party_size' => $this->party_size,
            'date' => $this->date,
            'time_slot' => $this->time_slot,
            'notes' => $this->notes,
        ]);

        session()->flash('success', __('site.reservation.success'));

        $this->reset();
    }

    public function render()
    {
        return view('livewire.reservations')->layout('layouts.app');
    }
}

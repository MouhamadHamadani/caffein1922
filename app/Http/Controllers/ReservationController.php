<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:30',
            'party_size' => 'required|integer|min:1|max:20',
            'date' => 'required|date|after:today',
            'time_slot' => 'required',
            'notes' => 'nullable|string|max:500',
        ]);

        Reservation::create($validated);

        return redirect()->back()->with('success', __('site.reservation.success'));
    }
}

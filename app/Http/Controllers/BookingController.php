<?php

// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Tour $tour)
    {
        return view('bookings.create', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'tour_date' => 'required|date',
            'number_of_travellers' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        $booking = $tour->bookings()->create($validated);

        return redirect()->back()->with('success', 'Booked successfully.');
    }

    public function confirmation(Booking $booking)
    {
        return view('bookings.confirmation', compact('booking'));
    }
}
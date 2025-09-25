<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('tour')->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $tours = Tour::where('is_published', true)->get();
        return view('admin.bookings.create', compact('tours'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'tour_date' => 'required|date|after_or_equal:today',
            'number_of_travellers' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        Booking::create($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking created successfully!');
    }

    public function edit(Booking $booking)
    {
        $tours = Tour::where('is_published', true)->get();
        return view('admin.bookings.edit', compact('booking', 'tours'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'tour_date' => 'required|date',
            'number_of_travellers' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking deleted successfully!');
    }

    // Bulk actions
    public function bulkAction(Request $request)
    {
        //dd($request->all());
        $action = $request->input('action');
        $ids = $request->input('selected_ids', []);

        if (empty($ids)) {
            return back()->with('error', 'No bookings selected!');
        }

        switch ($action) {
            case 'delete':
                Booking::whereIn('id', $ids)->delete();
                return back()->with('success', 'Selected bookings deleted!');

            case 'confirm':
                Booking::whereIn('id', $ids)->update(['status' => 'confirmed']);
                return back()->with('success', 'Selected bookings confirmed!');

            case 'cancel':
                Booking::whereIn('id', $ids)->update(['status' => 'cancelled']);
                return back()->with('success', 'Selected bookings cancelled!');

            default:
                return back()->with('error', 'Invalid action!');
        }
    }

    // Export functionality
    public function export(Request $request)
    {
        // Implement export logic (CSV, Excel, etc.)
    }
}
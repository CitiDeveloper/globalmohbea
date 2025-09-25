<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Summary Statistics
        $tourCount = Tour::count();
        $bookingCount = Booking::count();
        $postsCount = Post::count();
        $customerCount = Booking::where('status', 'confirmed')->count();

        // Recent Bookings
        $recentBookings = Booking::with(['tour'])
            ->latest()
            ->take(10)
            ->get();

        // Booking Status Counts
        $bookingStats = [
            'pending' => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        // Top Tours (by booking count)
        $topTours = Tour::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();

        return view('home', [
            'tourCount' => $tourCount,
            'postsCount' => $postsCount,
            'bookingCount' => $bookingCount,
            'customerCount' => $customerCount,
            'recentBookings' => $recentBookings,
            'bookingStats' => $bookingStats,
            'topTours' => $topTours
        ]);
    }
}

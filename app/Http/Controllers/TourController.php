<?php

// app/Http/Controllers/TourController.php
namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Category;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $featuredTours = Tour::where('is_featured', true)->paginate(1);
        $categories = Category::with('tours')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('tours.index', compact('featuredTours', 'categories'));
    }

    public function show($slug)
    {
        $tour = Tour::with(['inclusions', 'itineraryItems', 'locations', 'galleryImages', 'exclusions'])
            ->where('slug', $slug)
            ->firstOrFail();

        $location = $tour->location;

        return view('tours.show', compact('tour', 'location'));
    }

    public function search(Request $request)
    {
        $query = Tour::query();

        // Search by category (slug)
        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Add other search filters as needed (date, guests, etc.)

        $tours = $query->paginate(10);
        $categories = Category::all();



        return view('tours.index', [
            'featuredTours' => $tours,
            'categories' => $categories,
            'reviews' => [], // Empty if not needed in search results
            'searchPerformed' => true
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $tours = Tour::whereHas('category', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })
            ->paginate(10);

        $categories = Category::all();

        return view('tours.index', [
            'featuredTours' => $tours,
            'categories' => $categories,
            'currentCategory' => $slug, // Pass the current category slug
            'reviews' => [],
            'searchPerformed' => true
        ]);
    }
}

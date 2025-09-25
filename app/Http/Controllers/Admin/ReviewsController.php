<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::latest();

        if ($request->filter === 'featured') {
            $query->where('is_featured', true);
        }

        $reviews = $query->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:500',
            'content' => 'required|string|max:500',
            'author_name' => 'required|string|max:100',
            'author_title' => 'required|string|max:100',
            'rating' => 'required|integer|between:1,5',
            'is_featured' => 'boolean',
            'is_published' => 'boolean'
        ]);

        Review::create($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review created successfully!');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:500',
            'content' => 'required|string|max:500',
            'author_name' => 'required|string|max:100',
            'author_title' => 'required|string|max:100',
            'rating' => 'required|integer|between:1,5',
            'is_featured' => 'boolean',
            'is_published' => 'boolean'
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted successfully!');
    }

    public function toggleFeatured(Review $review)
    {
        $review->update(['is_featured' => !$review->is_featured]);
        return back()->with('success', 'Featured status updated!');
    }

    public function togglePublished(Review $review)
    {
        $review->update(['is_published' => !$review->is_published]);
        return back()->with('success', 'Published status updated!');
    }
}
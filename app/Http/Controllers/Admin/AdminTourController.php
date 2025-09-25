<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Category;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ItineraryItem;
use App\Models\Location;
use App\Models\TourInclusion;
use Illuminate\Support\Facades\Storage;

class AdminTourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category')->latest()->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.tours.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tours,slug',
            'description' => 'required',
            'overview' => 'required',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'required|image',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['featured_image'] = $request->file('featured_image')->store('tours', 'public');

        Tour::create($validated);

        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully.');
    }

    public function show(Tour $tour)
    {
        $itineraryItems = $tour->itineraryItems()->orderBy('day_number')->get();
        $location = $tour->location;
        $inclusions = $tour->inclusions;
        $exclusions = $tour->exclusions;

        return view('admin.tours.show', compact('tour', 'itineraryItems', 'location', 'inclusions', 'exclusions'));
    }

    public function storeItineraryItem(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'day_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'accommodation' => 'nullable|string',
            'activities' => 'nullable|string',
        ]);

        $tour->itineraryItems()->create($validated);

        return redirect()->route('admin.tours.show', $tour)->with('success', 'Itinerary item added successfully.');
    }

    public function updateItineraryItem(Request $request, Tour $tour, ItineraryItem $itineraryItem)
    {
        $validated = $request->validate([
            'day_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'accommodation' => 'nullable|string',
            'activities' => 'nullable|string',
        ]);

        $itineraryItem->update($validated);

        return redirect()->route('admin.tours.show', $tour)->with('success', 'Itinerary item updated successfully.');
    }

    public function destroyItineraryItem(Tour $tour, ItineraryItem $itineraryItem)
    {
        $itineraryItem->delete();

        return redirect()->route('admin.tours.show', $tour)->with('success', 'Itinerary item deleted successfully.');
    }

    public function edit(Tour $tour)
    {
        $categories = Category::all();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tours,slug,' . $tour->id,
            'description' => 'required',
            'overview' => 'required',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            Storage::disk('public')->delete($tour->featured_image);
            $validated['featured_image'] = $request->file('featured_image')->store('tours', 'public');
        }

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $tour->update($validated);

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully.');
    }

    public function destroy(Tour $tour)
    {
        Storage::disk('public')->delete($tour->featured_image);
        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully.');
    }

    public function storeLocation(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        // This will automatically set tour_id correctly via the relationship
        $tour->location()->updateOrCreate([], $validated);

        return redirect()->route('admin.tours.show', $tour)
            ->with('success', 'Tour location saved successfully.');
    }



    public function deleteLocation(Tour $tour)
    {
        $tour->location()->delete();

        return redirect()->route('admin.tours.show', $tour)
            ->with('success', 'Tour location removed successfully.');
    }

    public function storeGallery(Request $request, Tour $tour)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'captions' => 'nullable|array',
        ]);

        if (!$request->hasFile('images')) {
            return back()->with('error', 'No images were uploaded.');
        }

        $uploadedImages = 0;
        $errors = [];

        foreach ($request->file('images') as $key => $image) {
            try {
                if (!$image->isValid()) {
                    $errors[] = "File {$image->getClientOriginalName()} is invalid.";
                    continue;
                }

                // Store file in storage/app/public/gallery
                $path = $image->store('gallery', 'public'); // 'public' disk targets storage/app/public

                if (!$path) {
                    $errors[] = "Failed to store {$image->getClientOriginalName()}.";
                    continue;
                }

                $tour->galleryImages()->create([
                    'image_path' => $path, // no need to strip 'public/' since this path is correct relative to the public disk
                    'caption' => $request->captions[$key] ?? null,
                ]);

                $uploadedImages++;
            } catch (\Exception $e) {
                $errors[] = "Error uploading {$image->getClientOriginalName()}: " . $e->getMessage();
            }
        }

        $message = "Successfully uploaded {$uploadedImages} images.";
        if (!empty($errors)) {
            $message .= ' Errors: ' . implode(', ', $errors);
        }

        return back()->with(
            $uploadedImages > 0 ? 'success' : 'error',
            $message
        );
    }


    public function destroyGallery(Tour $tour, GalleryImage $galleryImage)
    {
        // Delete the file from storage
        Storage::delete('public/' . $galleryImage->image_path);

        // Delete the record from database
        $galleryImage->delete();

        return back()->with('success', 'Image deleted successfully!');
    }

    public function storeInclusion(Request $request, Tour $tour)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'included' => 'required|boolean',
        ]);

        $tour->inclusions()->create([
            'item' => $request->item,
            'included' => $request->included,
        ]);

        return redirect()->back()->with('success', 'Item added successfully');
    }

    public function updateInclusion(Request $request, Tour $tour, TourInclusion $inclusion)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'included' => 'required|boolean',
        ]);

        $inclusion->update([
            'item' => $request->item,
            'included' => $request->included,
        ]);

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function destroyInclusion(Tour $tour, TourInclusion $inclusion)
    {
        $inclusion->delete();
        return redirect()->back()->with('success', 'Item deleted successfully');
    }
}

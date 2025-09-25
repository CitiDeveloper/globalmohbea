@extends('layouts.admin')

@section('content')
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 class="h4 fw-bold mb-4">{{ isset($tour) ? 'Edit' : 'Create' }} Tour</h1>
                
                <form action="{{ isset($tour) ? route('admin.tours.update', $tour) : route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($tour))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="{{ old('title', $tour->title ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (optional)</label>
                        <input type="text" name="slug" value="{{ old('slug', $tour->slug ?? '') }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description', $tour->description ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="overview" class="form-label">Overview</label>
                        <textarea name="overview" class="form-control" rows="3" required>{{ old('overview', $tour->overview ?? '') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="duration_days" class="form-label">Duration (Days)</label>
                            <input type="number" name="duration_days" value="{{ old('duration_days', $tour->duration_days ?? '') }}" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="duration_nights" class="form-label">Duration (Nights)</label>
                            <input type="number" name="duration_nights" value="{{ old('duration_nights', $tour->duration_nights ?? '') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $tour->price ?? '') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $tour->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Featured Image</label>
                        <input type="file" name="featured_image" class="form-control" {{ isset($tour) ? '' : 'required' }}>
                        @if(isset($tour) && $tour->featured_image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $tour->featured_image) }}" class="img-thumbnail" style="max-height: 120px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured', $tour->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Featured
                        </label>
                    </div>

                    <button class="btn btn-primary">{{ isset($tour) ? 'Update' : 'Create' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
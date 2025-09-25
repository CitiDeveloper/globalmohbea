<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ isset($review) ? 'Edit' : 'Create' }} Review</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ isset($review) ? route('admin.reviews.update', $review->id) : route('admin.reviews.store') }}">
            @csrf
            @if(isset($review)) @method('PUT') @endif

            <div class="form-group">
             
                        <label for="title">Review Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $review->title ?? '') }}" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
              
            <div class="form-group">
                <label for="content">Review Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" required>{{ old('content', $review->content ?? '') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="author_name">Author Name</label>
                        <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" name="author_name" value="{{ old('author_name', $review->author_name ?? '') }}" required>
                        @error('author_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="author_title">Author Title</label>
                        <input type="text" class="form-control @error('author_title') is-invalid @enderror" id="author_title" name="author_title" value="{{ old('author_title', $review->author_title ?? '') }}" required>
                        @error('author_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <select class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                    <option value="5" {{ old('rating', $review->rating ?? '') == 5 ? 'selected' : '' }}>★★★★★ (5)</option>
                    <option value="4" {{ old('rating', $review->rating ?? '') == 4 ? 'selected' : '' }}>★★★★☆ (4)</option>
                    <option value="3" {{ old('rating', $review->rating ?? '') == 3 ? 'selected' : '' }}>★★★☆☆ (3)</option>
                    <option value="2" {{ old('rating', $review->rating ?? '') == 2 ? 'selected' : '' }}>★★☆☆☆ (2)</option>
                    <option value="1" {{ old('rating', $review->rating ?? '') == 1 ? 'selected' : '' }}>★☆☆☆☆ (1)</option>
                </select>
                @error('rating')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $review->is_featured ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">
                    Featured Review
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $review->is_published ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">
                    Publish Immediately
                </label>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ isset($review) ? 'Update' : 'Create' }} Review
            </button>
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
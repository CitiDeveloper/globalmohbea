@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">


                <div class="card-body">
                    <h1 class="h2 font-weight-bold mb-4">{{ $tour->title }}</h1>
                    <p class="mb-4">{{ $tour->description }}</p>
                    <p class="mb-2"><strong>Overview:</strong> {{ $tour->overview }}</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ number_format($tour->price, 2) }}</p>
                    <p class="mb-4"><strong>Duration:</strong> {{ $tour->duration_days }} Days /
                        {{ $tour->duration_nights }} Nights</p>
                    <img src="{{ asset('storage/' . $tour->featured_image) }}" class="img-fluid mb-4 rounded"
                        style="max-height: 300px;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="h4 font-weight-bold mb-4">INCLUSIONS & EXCLUSIONS
                            </h2>
                            <!-- Add Inclusion/Exclusion Form -->
                            <div class="bg-light p-4 rounded mb-4">
                                <h3 class="h5 font-weight-bold mb-3">Add New Inclusion/Exclusion</h3>
                                <form action="{{ route('admin.tours.inclusions.store', $tour) }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label for="item" class="form-label">Item</label>
                                            <input type="text" name="item" id="item"
                                                placeholder="e.g. Park entry fees" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="included" class="form-label">Status</label>
                                            <select name="included" id="included" class="form-control" required>
                                                <option value="1">Included</option>
                                                <option value="0">Excluded</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Add Item
                                    </button>
                                </form>
                            </div>

                            <!-- Inclusions & Exclusions List -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-success text-white">
                                            <h3 class="h5 mb-0">Included Items</h3>
                                        </div>
                                        <div class="card-body">
                                            @forelse($tour->inclusions->where('included', true) as $inclusion)
                                                <div
                                                    class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                                    <div>
                                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                                        <span>{{ $inclusion->item }}</span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button onclick="toggleEditInclusionForm({{ $inclusion->id }})"
                                                            class="btn btn-sm btn-link text-primary">
                                                            Edit
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.tours.inclusions.destroy', [$tour, $inclusion]) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-link text-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Edit Form (Hidden by default) -->
                                                <div id="edit-inclusion-form-{{ $inclusion->id }}"
                                                    class="d-none mt-3 bg-light p-3 rounded">
                                                    <form
                                                        action="{{ route('admin.tours.inclusions.update', [$tour, $inclusion]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row mb-3">
                                                            <div class="col-md-8">
                                                                <label for="edit-item-{{ $inclusion->id }}"
                                                                    class="form-label">Item</label>
                                                                <input type="text" name="item"
                                                                    id="edit-item-{{ $inclusion->id }}"
                                                                    value="{{ $inclusion->item }}" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="edit-included-{{ $inclusion->id }}"
                                                                    class="form-label">Status</label>
                                                                <select name="included"
                                                                    id="edit-included-{{ $inclusion->id }}"
                                                                    class="form-control" required>
                                                                    <option value="1"
                                                                        {{ $inclusion->included ? 'selected' : '' }}>
                                                                        Included</option>
                                                                    <option value="0"
                                                                        {{ !$inclusion->included ? 'selected' : '' }}>
                                                                        Excluded</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">
                                                            Update Item
                                                        </button>
                                                        <button type="button"
                                                            onclick="toggleEditInclusionForm({{ $inclusion->id }})"
                                                            class="btn btn-secondary ml-2">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                </div>
                                            @empty
                                                <p class="text-muted">No included items yet.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-danger text-white">
                                            <h3 class="h5 mb-0">Excluded Items</h3>
                                        </div>
                                        <div class="card-body">
                                            @forelse($tour->exclusions as $exclusion)
                                                <div
                                                    class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                                    <div>
                                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                                        <span>{{ $exclusion->item }}</span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <button onclick="toggleEditInclusionForm({{ $exclusion->id }})"
                                                            class="btn btn-sm btn-link text-primary">
                                                            Edit
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.tours.inclusions.destroy', [$tour, $exclusion]) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-link text-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Edit Form (Hidden by default) -->
                                                <div id="edit-inclusion-form-{{ $exclusion->id }}"
                                                    class="d-none mt-3 bg-light p-3 rounded">
                                                    <form
                                                        action="{{ route('admin.tours.inclusions.update', [$tour, $exclusion]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row mb-3">
                                                            <div class="col-md-8">
                                                                <label for="edit-item-{{ $exclusion->id }}"
                                                                    class="form-label">Item</label>
                                                                <input type="text" name="item"
                                                                    id="edit-item-{{ $exclusion->id }}"
                                                                    value="{{ $exclusion->item }}" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="edit-included-{{ $exclusion->id }}"
                                                                    class="form-label">Status</label>
                                                                <select name="included"
                                                                    id="edit-included-{{ $exclusion->id }}"
                                                                    class="form-control" required>
                                                                    <option value="1"
                                                                        {{ $exclusion->included ? 'selected' : '' }}>
                                                                        Included</option>
                                                                    <option value="0"
                                                                        {{ !$exclusion->included ? 'selected' : '' }}>
                                                                        Excluded</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">
                                                            Update Item
                                                        </button>
                                                        <button type="button"
                                                            onclick="toggleEditInclusionForm({{ $exclusion->id }})"
                                                            class="btn btn-secondary ml-2">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                </div>
                                            @empty
                                                <p class="text-muted">No excluded items yet.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-top pt-4">
                                <h2 class="h4 font-weight-bold mb-4">Itinerary</h2>

                                <!-- Add Itinerary Form -->
                                <div class="bg-light p-4 rounded mb-4">
                                    <h3 class="h5 font-weight-bold mb-3">Add New Itinerary Item</h3>
                                    <form action="{{ route('admin.tours.itinerary.store', $tour) }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="day_number" class="form-label">Day Number</label>
                                                <input type="number" name="day_number" id="day_number" min="1"
                                                    placeholder="Day number" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="title" id="title" placeholder="Title"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" rows="3" placeholder="Description" class="form-control"
                                                required></textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="accommodation" class="form-label">Accommodation</label>
                                                <input type="text" name="accommodation" id="accommodation"
                                                    placeholder="Accommodation" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="activities" class="form-label">Activities</label>
                                                <input type="text" name="activities" id="activities"
                                                    placeholder="Activities" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Add Itinerary Item
                                        </button>
                                    </form>
                                </div>

                                <!-- Itinerary Items List -->
                                @foreach ($itineraryItems as $item)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h3 class="h5 font-weight-bold">Day {{ $item->day_number }}:
                                                    {{ $item->title }}
                                                </h3>
                                                <div class="d-flex">
                                                    <!-- Edit Form Toggle -->
                                                    <button onclick="toggleEditForm({{ $item->id }})"
                                                        class="btn btn-sm btn-link text-primary">
                                                        Edit
                                                    </button>
                                                    <!-- Delete Form -->
                                                    <form
                                                        action="{{ route('admin.tours.itinerary.destroy', [$tour, $item]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this itinerary item?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-link text-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <p class="mt-2 text-muted">{{ $item->description }}</p>
                                            @if ($item->accommodation)
                                                <p class="mt-1"><strong>Accommodation:</strong>
                                                    {{ $item->accommodation }}</p>
                                            @endif
                                            @if ($item->activities)
                                                <p class="mt-1"><strong>Activities:</strong> {{ $item->activities }}</p>
                                            @endif

                                            <!-- Edit Form (Hidden by default) -->
                                            <div id="edit-form-{{ $item->id }}"
                                                class="d-none mt-3 bg-light p-3 rounded">
                                                <form action="{{ route('admin.tours.itinerary.update', [$tour, $item]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="edit-day_number-{{ $item->id }}"
                                                                class="form-label">Day
                                                                Number</label>
                                                            <input type="number" name="day_number"
                                                                id="edit-day_number-{{ $item->id }}"
                                                                value="{{ $item->day_number }}" min="1"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="edit-title-{{ $item->id }}"
                                                                class="form-label">Title</label>
                                                            <input type="text" name="title"
                                                                id="edit-title-{{ $item->id }}"
                                                                value="{{ $item->title }}" class="form-control"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit-description-{{ $item->id }}"
                                                            class="form-label">Description</label>
                                                        <textarea name="description" id="edit-description-{{ $item->id }}" rows="3" class="form-control"
                                                            required>{{ $item->description }}</textarea>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="edit-accommodation-{{ $item->id }}"
                                                                class="form-label">Accommodation</label>
                                                            <input type="text" name="accommodation"
                                                                id="edit-accommodation-{{ $item->id }}"
                                                                value="{{ $item->accommodation }}" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="edit-activities-{{ $item->id }}"
                                                                class="form-label">Activities</label>
                                                            <input type="text" name="activities"
                                                                id="edit-activities-{{ $item->id }}"
                                                                value="{{ $item->activities }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">
                                                        Update Itinerary Item
                                                    </button>
                                                    <button type="button" onclick="toggleEditForm({{ $item->id }})"
                                                        class="btn btn-secondary ml-2">
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border-top pt-4">
                                <h2 class="h4 font-weight-bold mb-4"> {{ $location ? 'Edit' : 'Add' }} Tour Location</h2>
                                <div class="bg-light p-4 rounded mb-4">


                                    <form action="{{ route('admin.tours.location.store', $tour) }}" method="POST">

                                        @csrf

                                        <div class="mb-3">
                                            <label for="location_name" class="form-label">Location Name</label>
                                            <input type="text" name="name" id="location_name" class="form-control"
                                                placeholder="e.g. Serengeti National Park"
                                                value="{{ old('name', $location->name ?? '') }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="location_description" class="form-label">Description
                                                (Optional)</label>
                                            <textarea name="description" id="location_description" class="form-control" rows="3">{{ old('description', $location->description ?? '') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Select Location on Map</label>
                                            <div id="map"
                                                style="height: 400px; width: 100%; border: 1px solid #ddd;"></div>
                                        </div>

                                        <div class="row mb-3 d-none">
                                            <div class="col-md-6">
                                                <label for="latitude" class="form-label">Latitude</label>
                                                <input type="text" name="latitude" id="latitude"
                                                    class="form-control"
                                                    value="{{ old('latitude', $location->latitude ?? '-1.2921') }}"
                                                    required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="longitude" class="form-label">Longitude</label>
                                                <input type="text" name="longitude" id="longitude"
                                                    class="form-control"
                                                    value="{{ old('longitude', $location->longitude ?? '36.8219') }}"
                                                    required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            {{ $location ? 'Update' : 'Save' }} Location
                                        </button>
                                        {{-- 
                    @if ($location)
                        <a href="{{ route('admin.tours.location.destroy', $tour) }}" class="btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('delete-location-form').submit();">
                            Remove Location
                        </a>
                    @endif --}}
                                    </form>

                                    @if ($location)
                                        <form id="delete-location-form"
                                            action="{{ route('admin.tours.location.destroy', $tour) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="border-top pt-4">
                        <h2 class="h4 font-weight-bold mb-4">Tour Gallery</h2>

                        <!-- Gallery Upload Form -->
                        <div class="bg-light p-4 rounded mb-4">
                            <h3 class="h5 font-weight-bold mb-3">Upload Gallery Images</h3>
                            <form action="{{ route('admin.tours.gallery.store', $tour) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="gallery-images" class="form-label">Select Images</label>
                                    <input type="file" name="images[]" id="gallery-images" class="form-control"
                                        multiple required>
                                    <small class="text-muted">You can select multiple images (JPEG, PNG, JPG, GIF, max 2MB
                                        each)</small>
                                </div>

                                <div id="caption-container" class="mb-3">
                                    <!-- Caption inputs will be added here dynamically -->
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Upload Images
                                </button>
                            </form>
                        </div>

                        <!-- Gallery Display -->
                        <div class="row">
                            @foreach ($tour->galleryImages as $image)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top"
                                            style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            @if ($image->caption)
                                                <p class="card-text">{{ $image->caption }}</p>
                                            @else
                                                <p class="card-text text-muted">No caption</p>
                                            @endif
                                            <form action="{{ route('admin.tours.gallery.destroy', [$tour, $image]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this image?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleEditForm(itemId) {
            const form = document.getElementById(`edit-form-${itemId}`);
            form.classList.toggle('d-none');
        }
    </script>
    <script>
        function initMap() {
            // Set default coordinates (Nairobi)
            let defaultLat = {{ old('latitude', $location->latitude ?? '-1.2921') }};
            let defaultLng = {{ old('longitude', $location->longitude ?? '36.8219') }};
            console.log(defaultLat, defaultLng);

            const initialLocation = {
                lat: parseFloat(defaultLat),
                lng: parseFloat(defaultLng)
            };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: initialLocation,
            });

            // Add a marker
            const marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                draggable: true,
                @if ($location)
                    title: "{{ $location->name }}"
                @endif
            });

            // Update form fields when marker is moved
            google.maps.event.addListener(marker, 'dragend', function() {
                document.getElementById('latitude').value = marker.getPosition().lat();
                document.getElementById('longitude').value = marker.getPosition().lng();
            });

            // Update when user clicks on the map
            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }
        document.getElementById('gallery-images').addEventListener('change', function(e) {
            const captionContainer = document.getElementById('caption-container');
            captionContainer.innerHTML = ''; // Clear previous inputs

            // Create a caption input for each selected file
            for (let i = 0; i < this.files.length; i++) {
                const div = document.createElement('div');
                div.className = 'mb-2';

                const label = document.createElement('label');
                label.className = 'form-label';
                label.textContent = `Caption for ${this.files[i].name}`;

                const input = document.createElement('input');
                input.type = 'text';
                input.className = 'form-control';
                input.name = 'captions[]';
                input.placeholder = 'Optional caption for this image';

                div.appendChild(label);
                div.appendChild(input);
                captionContainer.appendChild(div);
            }
        });
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo14Wnrp1iViszO7Bs1CbpVSd_WlkX42k&callback=initMap"></script>

    <script>
        function toggleEditInclusionForm(itemId) {
            const form = document.getElementById(`edit-inclusion-form-${itemId}`);
            form.classList.toggle('d-none');
        }
    </script>
@endsection

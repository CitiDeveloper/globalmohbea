@extends('layouts.app')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@section('content')
    <section class="tour-hero-section" style="background-image: url('{{ asset('storage/' . $tour->featured_image) }}');">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $tour->title }}</h1>


        </div>
    </section>
    <div class="container mx-auto px-4 py-8 bg-[#fff8f0]">
        <div class="flex flex-col lg:flex-row gap-8"><!-- Main Content-->
            <div class="w-full lg:w-2/3"><!-- Tabs-->
                <div class="tab-container">
                    <div class="tabs">
                        <div class="tab active" onclick="openTab('details')">Details</div>
                        <div class="tab" onclick="openTab('itinerary')">Itinerary</div>
                        <div class="tab" onclick="openTab('location')">Location</div>
                        <div class="tab" onclick="openTab('photos')">Photos</div>
                        <div class="tab" onclick="openTab('reviews')">Reviews</div>
                    </div><!-- Details Tab Content-->
                    <div class="tab-content active" id="details">
                        <h2 class="text-2xl font-semibold text-safari-red mb-4">Tour Overview</h2>
                        <p class="mb-6">{{ $tour->description }}</p>
                        <h2 class="text-2xl font-semibold text-safari-red mb-4">Included</h2>
                        <div class="space-y-3">
                            @foreach ($tour->inclusions as $inclusion)
                                <div class="included-item"><i class="bi bi-check-circle"></i><span>{{ $inclusion->item }}</span></div>
                            @endforeach

                        </div>
                        <h2 class="text-2xl font-semibold text-safari-red mb-4">Excluded</h2>
                        <div class="space-y-3">
                            @foreach ($tour->exclusions as $inclusion)
                                <div class="included-item"><i class="bi bi-x-circle"></i><span>{{ $inclusion->item }}</span></div>
                            @endforeach

                        </div>
                    </div><!-- Itinerary Tab Content-->
                    <div class="tab-content" id="itinerary">
                        @foreach ($tour->itineraryItems as $item)
                            <div class="day-content">
                                <div class="day-header">Day {{ $item->day_number }}: {{ $item->title }}</div>
                                <p class="mb-4">{{ $item->description }}</p>

                                @if ($item->accommodation)
                                    <div class="mb-2">
                                        <strong>Accommodation:</strong> {{ $item->accommodation }}
                                    </div>
                                @endif

                                @if ($item->activities)
                                    <div>
                                        <strong>Activities:</strong> {{ $item->activities }}
                                    </div>
                                @endif
                            </div>
                        @endforeach



                    </div><!-- Location Tab Content-->
                    <div class="tab-content" id="location">
                        @foreach ($tour->locations as $location)
                            <div class="map-title mb-4">{{ $location->name }}</div>
                            @if ($location->description)
                                <p class="text-gray-700">{{ $location->description }}</p>
                            @endif
                        @endforeach


                        <div id="map" style="height: 400px; width: 100%; border: 1px solid #ccc;"></div>

                    </div><!-- Photos Tab Content-->
                    <div class="tab-content" id="photos">
                        @foreach ($tour->galleryImages as $image)
                            <div class="overflow-hidden rounded-lg">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="{{ $image->caption ?? 'Tour image' }}"
                                    class="w-full h-64 object-cover hover:scale-105 transition-transform">
                            </div>
                        @endforeach
                    </div><!-- Reviews Tab Content-->
                    <div class="tab-content" id="reviews">
                        <h2 class="text-3xl font-semibold text-safari-red mb-8 text-center">Tour Reviews</h2>
                        <div class="owl-carousel review-carousel">
                            <div class="review-card">
                                <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i></div>
                                <p class="review-text">MOBHEA's dedication to crafting bespoke African adventures is
                                    truly exceptional. Their personal touch and attention to detail ensure every trip is
                                    memorable, seamless, and extraordinary.</p>
                                <p class="reviewer-name">Mnyindo Maseghe</p>
                            </div>
                            <div class="review-card">
                                <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i></div>
                                <p class="review-text">Every trip with MOBHEA is an adventure tailored to the traveler.
                                    Their ability to blend wildlife, culture, and luxury creates experiences that are
                                    not only unique but deeply personal.</p>
                                <p class="reviewer-name">John Orricho</p>
                            </div>
                            <div class="review-card">
                                <div class="star-rating"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i></div>
                                <p class="review-text">The Maasai Mara safari exceeded all expectations. The guides
                                    were knowledgeable, accommodations luxurious, and wildlife sightings incredible. A
                                    once-in-a-lifetime experience!</p>
                                <p class="reviewer-name">Sarah Johnson</p>
                            </div>
                        </div>
                        {{-- <div class="leave-review-form">
                            <h3>Leave a Review</h3>
                            <form>
                                <textarea class="review-textarea" placeholder="Your review"></textarea>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4"><input class="form-input"
                                        type="text" placeholder="Name*"><input class="form-input" type="email"
                                        placeholder="Email Address"><input class="form-input" type="text"
                                        placeholder="Title"></div>
                                <div class="checkbox-container"><input type="checkbox" id="save-info"><label
                                        for="save-info">Save my name, email and title in this browser for the next time
                                        I comment.</label></div><button class="post-review-btn" type="submit">Post
                                    Review</button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div><!-- Sidebar - Booking Form-->
            <div class="w-full lg:w-1/3">
                <div class="booking-form">
                    <h2>Book the tour</h2>

                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    <form action="{{ route('bookings.store', $tour) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>

                                <input type="text" id="name" name="name" required class="form-input" placeholder="Name">
                            </div>

                            <div>

                                <input type="email" id="email" name="email" required class="form-input" placeholder="e-mail"> 
                            </div>

                            <div>

                                <input type="tel" id="phone" name="phone" required class="form-input" placeholder="Phone Number">
                            </div>

                            <div>

                                <input type="date" id="tour_date" name="tour_date" required class="form-input" placeholder="Tour date">
                            </div>

                            <div>

                                <input type="number" id="number_of_travellers" name="number_of_travellers" placeholder="No. of Guests"
                                    min="1" required class="form-input">
                            </div>

                            <div class="md:col-span-2">

                                <textarea id="special_requests" name="special_requests" class="form-input" rows="3" placeholder="Additional special requests if any..."></textarea>
                            </div>
                        </div>

                        <button class="book-button" type="submit">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- src/partials/footer.pug-->
@if($location)
    <script>
        function initMap() {
            const location = {
                lat: parseFloat("{{ $location->latitude }}"),
                lng: parseFloat("{{ $location->longitude }}")
            };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: location
            });

            new google.maps.Marker({
                position: location,
                map: map,
                title: "{{ $location->name }}"
            });
        }
    </script>
    @endif

    <!-- Load the Google Maps JS API -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo14Wnrp1iViszO7Bs1CbpVSd_WlkX42k&callback=initMap">
    </script>
@stop

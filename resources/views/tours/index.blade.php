@extends('layouts.app')
<style>
    .tab-active {
        background-color: #C8102E;
        /* safari-red */
        color: white;
    }

    .tab-inactive {
        background-color: white;
        color: #C8102E;
        transition: all 0.3s ease;
    }

    .tab-inactive:hover {
        background-color: #f8f8f8;
    }
</style>
@section('content')
    <section class="adventures-header">
        <div class="adventures-header-content pt-24">
            <h1 class="adventures-title">Exclusive Adventures</h1>
            <h2 class="adventures-subtitle">Discover Your Dream Journey</h2>
            <p class="adventures-description">Explore our handcrafted safaris, romantic getaways, and immersive
                adventures across Africa. Whether you're chasing the Great Migration, celebrating love, or traveling
                solo, we've curated something extraordinary for every kind of explorer.</p>
        </div>
    </section><!-- Main Content-->
    <section class="py-8 px-4 bg-[#fff8f0]">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full lg:w-2/3"><!-- Tabs (no colons here)-->
                    <div class="flex flex-wrap mb-8 border border-safari-red rounded-md overflow-hidden">
                        @foreach ($categories as $index => $category)
                            <a class="{{ request()->route()->parameter('slug') === $category->slug ||
                            (is_null(request()->route()->parameter('slug')) && $loop->first)
                                ? 'tab-active'
                                : 'tab-inactive' }} 
                               py-3 px-4 flex-1 text-center font-medium cursor-pointer"
                                href="{{ route('tours.category', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="space-y-8">
                        @if (!$featuredTours->isEmpty())
                            @foreach ($featuredTours as $tour)
                                <div class="safari-card-tours flex flex-col md:flex-row">
                                    <div class="md:w-2/5"><img class="safari-image h-full"
                                            src="{{ asset('storage/' . $tour->featured_image) }}"
                                            alt="Maasai Mara Adventure"></div><!-- right panel-->
                                    <div class="p-6 flex flex-col md:w-3/5">
                                        <h3 class="text-2xl font-semibold text-safari-red mb-1"><a
                                                href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }} </a></h3>
                                        <div class="star-rating flex mb-2"><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star star-empty"></i></div>

                                        <p class="text-gray-600 mb-4"> {{ Str::limit($tour->description, 100) }}</p>
                                        <div class="mt-auto flex justify-between items-center">
                                            <div class="bg-safari-red text-white px-3 py-2 rounded-md"><span
                                                    class="calendar-icon"><i class="bi bi-calendar-event"></i>
                                                    {{ $tour->duration_days }} Days | {{ $tour->duration_nights }}
                                                    Nights</span></div><a class="view-itinerary-btn"
                                                href="{{ route('tours.show', $tour->slug) }}">View
                                                Itinerary</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div><!-- Pagination-->
                    <div class="flex justify-center mt-8 gap-2"> {{ $featuredTours->links() }}</div>

                           
                </div>
                <div class="w-full lg:w-1/3"><!-- Find Tours-->
                    <div class="safari-card-tours p-6 mb-8">
                        <h3 class="text-2xl font-semibold text-safari-red mb-6">Find Tours</h3>
                        <form action="{{ route('tours.search') }}" method="GET">
                            <select name="category" class="w-full bg-transparent text-gray-800 focus:outline-none">
                                <option value="all">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>

                            <button class="search-btn w-full" type="submit">Search</button>
                        </form>
                    </div><!-- Top‑rated Safaris-->
                    {{-- <div class="safari-card-tours p-6">
                        <h3 class="text-2xl font-semibold text-safari-red mb-6">Top Rated Safaris</h3>
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <h4 class="font-medium">Bush & Beach</h4><img class="w-16 h-16 object-cover rounded"
                                    src="assets/images/cloudy-mountains-landscape-sunset.jpg" alt="Bush &amp; Beach">
                            </div>
                            <div class="star-rating flex mb-1"><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="text-gray-500">Price</p>
                            <div class="border-b border-gray-200 mt-2"></div>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <h4 class="font-medium">Gorilla Trekking & Wildlife</h4><img
                                    class="w-16 h-16 object-cover rounded"
                                    src="assets/images/cloudy-mountains-landscape-sunset.jpg"
                                    alt="Gorilla Trekking &amp; Wildlife">
                            </div>
                            <div class="star-rating flex mb-1"><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="text-gray-500">Price</p>
                            <div class="border-b border-gray-200 mt-2"></div>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <h4 class="font-medium">Group Safari Adventure</h4><img
                                    class="w-16 h-16 object-cover rounded"
                                    src="assets/images/cloudy-mountains-landscape-sunset.jpg" alt="Group Safari Adventure">
                            </div>
                            <div class="star-rating flex mb-1"><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p class="text-gray-500">Price</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section><!-- src/partials/footer.pug-->

@stop

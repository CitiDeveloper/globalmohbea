@extends('layouts.app')

@section('content')
    <section class="blog-header">
        <div class="blog-header-content">
            <h1 class="blog-title pt-24 !text-white">Blog</h1>
            <h2 class="blog-subtitle">Planning your dream African getaway?</h2>
            <p class="blog-description">We've got you covered! Whether you're dreaming of the perfect safari or looking
                for hidden gems, this is where we share everything you need to know for an unforgettable journey. From
                packing tips to must-see destinations, our blog is your personal guide to exploring Africa like never
                before. Let's dive in!</p>
        </div>
    </section><!-- Main Content-->
    <div class="container mx-auto px-4 py-12 bg-[#fff8f0]">
        <div class="flex flex-col lg:flex-row gap-8"><!-- Blog Posts-->
            
            <div class="w-full lg:w-2/3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8"><!-- Blog Post 1-->
                    @forelse ($posts as $post)
                    <div class="blog-card">
                        @if($post->featured_image)
                        <img class="blog-image"
                        src="{{ asset($post->featured_image) }}" alt="Safari Packing">
                            @endif
                        <div class="p-6 flex flex-col h-full">
                            <div class="blog-category">{{ ucfirst($post->type) }}</div><a class="blog-title-link" href="{{ route('blog.show', $post->slug) }}" >{{ $post->title }}</a>
                            <div class="blog-author">By Admin</div>
                            <p class="blog-excerpt">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                            <div class="mt-auto"><a class="read-more-btn" href="{{ route('blog.show', $post->slug) }}" >Read more</a></div>
                        </div>
                    </div><!-- Blog Post 2-->

                    @empty
            <div class="col-12">
                <div class="alert alert-info">No posts available yet. Check back later!</div>
            </div>
            @endforelse
                  
                </div>
            </div><!-- Sidebar-->
            
            <div class="w-full lg:w-1/3"><!-- Search-->
                <div class="sidebar-section">
                    <form action="{{ route('blog.search') }}" method="POST">
                        @csrf
                        <input class="search-input" 
                               type="text" 
                               name="search" 
                               placeholder="Click enter to search"
                               onkeydown="if(event.keyCode === 13) { this.form.submit(); return false; }">
                    </form>
                </div>
                <!-- Categories-->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Categories</h3>
                    <div class="space-y-2">
                        @foreach(['blog', 'review', 'guide'] as $type)
                        <a href="{{ route('posts.type', $type) }}" 
                        class="category-link">
                        <i class="bi bi-arrow-right"></i> {{ ucfirst($type) }}
                        </a>
                    @endforeach
                       
                    </div>
                </div><!-- Recent Posts-->
               
            </div>
        </div>
    </div><!-- src/partials/footer.pug-->
    @stop
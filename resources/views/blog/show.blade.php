@extends('layouts.app')

@section('content')
<section class="blog-header">
    <div class="blog-header-content">
        <h1 class="blog-title pt-24 !text-white">{{ $post->title }}</h1>
        <h2 class="blog-subtitle">{{ ucfirst($post->type) }}</h2>
        <p class="blog-description">Date Posted: {{ $post->created_at->format('F j, Y') }}, ({{ $post->views }} views)</p>
    </div>
</section>
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8 pt-24"><!-- Blog Post Content-->
            <div class="w-full lg:w-2/3">
                
                @if ($post->featured_image)
                    <img class="blog-image" src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}">
                @endif
                <div class="blog-content">
                    {!! $post->content !!}
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
                @if ($relatedPosts->count())
                <div class="sidebar-section">
         
                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="space-y-4">
                            @foreach ($relatedPosts as $related)
                                <div class="recent-post">
                                    @if ($related->featured_image)
                                        <img class="recent-post-image" src="{{ asset($related->featured_image) }}"
                                            alt="{{ $related->title }}">
                                    @endif
                                    <div><a class="recent-post-title"
                                            href="{{ route('blog.show', $related->slug) }}">{{ Str::limit($related->title, 50) }}</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                   
                </div> @endif
            </div>
        </div>
    </div><!-- src/partials/footer.pug-->

@stop

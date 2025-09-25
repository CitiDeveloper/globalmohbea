<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published posts
     */
    public function index()
    {
        $posts = Post::where('is_published', true)
                    ->latest()
                    ->paginate(6); // 6 posts per page
        
        return view('blog.index', compact('posts'));
    }

    /**
     * Display a single published post
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                   ->where('is_published', true)
                   ->firstOrFail();
        
        // Increment view count (optional)
        $post->increment('views');
        
        // Related posts (optional)
        $relatedPosts = Post::where('type', $post->type)
                           ->where('id', '!=', $post->id)
                           ->where('is_published', true)
                           ->limit(3)
                           ->get();
        
        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function publicByType($type)
    {
        $validTypes = ['blog', 'review', 'guide'];

        if (!in_array($type, $validTypes)) {
            abort(404);
        }

        $posts = Post::where('type', $type)
            ->where('is_published', true)
            ->latest()
            ->paginate(10);

        
        return view('blog.index', [
            'posts' => $posts,
            'currentType' => $type
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:2'
        ]);

        $searchTerm = $request->input('search');

        $posts = Post::where('is_published', true)
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('content', 'LIKE', "%{$searchTerm}%");
            })
            ->latest()
            ->paginate(10);

        return view('blog.index', [
            'posts' => $posts,
            'searchTerm' => $searchTerm
        ]);
    }
}
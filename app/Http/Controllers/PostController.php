<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // List all posts (admin view)
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // Show create form
    public function create()
    {
        
        return view('admin.posts.create');
    }

    // Store new post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:blog,review,guide',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = new Post($validated);
        $post->user_id = auth()->id();
        $post->slug = \Str::slug($request->title);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('public/posts');
            $post->featured_image = str_replace('public/', 'storage/', $path);
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post created!');
    }

    // Show the edit form
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // Handle the update request
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:blog,review,guide',
            'is_published' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->type = $validated['type'];
        $post->is_published = $validated['is_published'] ?? false;

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image) {
                Storage::delete(str_replace('storage/', 'public/', $post->featured_image));
            }
            // Store new image
            $path = $request->file('featured_image')->store('public/posts');
            $post->featured_image = str_replace('public/', 'storage/', $path);
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post updated!');
    }

    // Delete post
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted!');
    }

    // Frontend: Show single post
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }
    public function manage(Post $post)
    {
        return view('admin.posts.manage', compact('post'));
    }

    public function togglePublish(Post $post)
    {
        $post->update(['is_published' => !$post->is_published]);

        return back()->with('success', 'Post status updated!');
    }

  
}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the posts.
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new post.
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post in the database.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Post::create($validated);
        
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');;
    }

    // Display the specified post.
    public function show(Post $post)
    {
        $this->authorize('show'); // Checks if the user can show this post
        
        if (!$post) {
            return abort(404, 'Post not found');
        }

        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified post.
    public function edit(Post $post)
    {
        
        return view('posts.edit', compact('post'));
    }
    
    // Update the specified post in the database.
    public function update(Request $request, Post $post)
    {
        $this->authorize('update');

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
        // DD($validated);
        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post update successfully!');
    }

    // Remove the specified post from the database.
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}

?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str; 

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('welcome', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image ' => 'required|url',
            'excerpt' => 'required',
            'content' => 'required',                      
        ]); 

        $validated['slug'] = Str::slug($validated['title']);  
             \App\Models\Post::create($validated);

    return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}
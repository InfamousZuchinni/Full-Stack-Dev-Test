<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


use function Pest\Laravel\post;

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
            'slug'=> 'required|unique:posts,slug',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10000',
            'excerpt' => 'required',
            'content' => 'required', 
            'date' => 'required'                     
        ]); 

        if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('uploads', 'public');
        }

    Post::create($validated);

    return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

    $post->delete();

    return redirect()->route('posts.index')->with('success','Post Deleted.');
    
    }
}
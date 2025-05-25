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
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([            
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10000',
            'excerpt' => 'required',
            'content' => 'required',
            'date' => 'required'                      
        ]);
        
        if ($request->hasFile('image')) {
            if (!file_exists(public_path('sample-images'))) {
                mkdir(public_path('sample-images'), 0755, true);
            }
            
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            $image->move(public_path('sample-images'), $fileName);
            $validated['image'] = 'sample-images/' . $fileName;
        }
        
        Post::create($validated);
        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }

     public function destroy(Post $post)
    {
        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }
        
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully!');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
        ];
        
        if ($request->hasFile('image')) {
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
            
            if (!file_exists(public_path('sample-images'))) {
                mkdir(public_path('sample-images'), 0755, true);
            }
            
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            
            $image->move(public_path('sample-images'), $fileName);
            $data['image'] = 'sample-images/' . $fileName;
        }
        
        $post->update($data);
        return redirect()->route('home')->with('success', 'Post updated successfully!');
    }


    
}
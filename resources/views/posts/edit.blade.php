@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="max-w-4xl mx-auto px-6 mb-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="max-w-4xl mx-auto px-6 mb-6">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Post</h2>
            
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"required>{{ old('excerpt', $post->excerpt) }}
                    </textarea>
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea id="content" name="content" rows="10"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"required>{{ old('content', $post->content) }}
                    </textarea>
                </div>
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    @if($post->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-600 mt-2">Current image</p>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <p class="text-sm text-gray-600 mt-1">Leave empty to keep current image</p>
                </div>
                <div class="flex justify-between items-center">
                    <a href="{{ route('home') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition-colors">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

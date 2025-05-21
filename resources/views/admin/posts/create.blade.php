@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded shadow">
    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    <h2 class="text-2xl font-bold mb-4">Create New Post</h2>

    <form method="post" action="{{ route('posts.store') }}">
        @csrf 

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror 
        </div>
        
        <div class="mb-4">
            <label class="block font-medium">Image URL</label>
            <input type="text" name="image" class="w-full border p-2 rounded" value="{{ old('image') }}">
            @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Excerpt</label>
            <textarea name="excerpt" class="w-full border p-2 rounded">{{ old('excerpt') }}</textarea>
            @error('excerpt') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium">Content</label>
            <textarea name="content" class="w-full border p-2 rounded">{{ old('content') }}</textarea>
            @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit
        </button>

    </form>
</div>

@endsection
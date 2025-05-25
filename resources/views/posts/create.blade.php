@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-24 p-6 bg-white rounded shadow text-gray-500">
    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    <h2 class="text-2xl font-bold mb-4">New Post</h2>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

        @csrf

            <div class="grid grid-cols-4 gap-4 mb-10 items-center">
                <label class="font-medium">Title</label>
                <input type="text" name="title" class="col-span-3 border p-2 rounded" value="{{ old('title') }}">
                @error('title') <p class="col-span-4 text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            
            <div class="grid grid-cols-4 gap-4 mb-10 items-center">
                <label class="font-medium">Slug</label>
                <input type="text" name="slug" class="col-span-3 border p-2 rounded" value="{{ old('slug') }}">
                @error('slug') <p class="col-span-4 text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            
            <div class="grid grid-cols-4 gap-4 mb-10 items-center">
                <label class="font-medium">Featured Image</label>
                <label for="image" class="col-span-3 inline-block bg-orange-600 text-white px-5 py-2 cursor-pointer hover:bg-orange-700 transition w-fit">
                    Select an Image
                </label>
                <input type="file" name="image" id="image" accept="image/*" class="hidden">
                @error('image') <p class="col-span-4 text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            
            <div class="grid grid-cols-4 gap-4 mb-10 items-start">
                <label class="font-medium">Excerpt</label>
                <textarea name="excerpt" class="col-span-3 border p-2 rounded h-24">{{ old('excerpt') }}</textarea>
                @error('excerpt') <p class="col-span-4 text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            
            <div class="grid grid-cols-4 gap-4 mb-10 items-start">
                <label class="font-medium">Content</label>
                <textarea name="content" class="col-span-3 border p-2 rounded h-32">{{ old('content') }}</textarea>
                @error('content') <p class="col-span-4 text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            
            <div class="grid grid-cols-4 gap-4 mb-10 items-center">
                <label class="font-medium">Published Date</label>
                <input type="date" name="date" class="col-span-3 border p-2 rounded" value="{{ old('date') }}">
                @error('date') <p class="col-span-4 text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            
            <div class="grid grid-cols-4 gap-4">
                <div></div>
                <div class="col-span-3">
                    <button type="submit" class="bg-orange-600 text-white px-9 py-2 mr-2 hover:bg-orange-700 transition">
                        Save
                    </button>
                    <button type="reset" class="bg-gray-300 text-black px-9 py-2 hover:bg-gray-400 transition">
                        Cancel
                    </button>
                </div>
            </div>
    </form>
</div>

@endsection
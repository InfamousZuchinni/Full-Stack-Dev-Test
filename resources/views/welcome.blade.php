<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Baka Blogs</title>
</head>

<body>
    <header class="bg-gradient-to-r from-orange-600 to-orange-300 shadow p-4 mb-6 text-white w-full">
        <div class="w-full flex px-8 justify-between  items-center ">
            <h1 class="text-5xl font-bold mb-4 mt-4 ml-4 flex-grow">
                    <a href="{{ route('home') }}">Baka Blogs</a>
                    <p class="text-xl ">Your daily dose of anime news, reviews, and discussions</p>
            </h1>
        </div>
    </header>

    <main>

         @if(session('success'))
            <div class="max-w-6xl mx-auto px-6 mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <section>
            <div class="text">
                <a href="{{ route('posts.create') }}" class="inline-block ml-15 mt-5 px-7 py-4 bg-orange-600 text-white  hover:bg-orange-700 ">
                    + Add New
                </a>
            </div>
            <div class="grid grid-cols-1 gap-6 ml-10 mr-10 mt-10 mx-auto px-5">
                @foreach ($posts as $post)
                    <div class="flex bg-white shadow-lg mb-9  overflow-hidden">

                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-1/3 object-cover">
                        
                        <div class="p-6 w-2/3 relative">
                            <div class="absolute top-4 right-4 flex gap-2">
                                <a href="{{ route('posts.edit', $post) }}" class="text-gray-500 hover:text-orange-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-gray-800 mb-3 pr-16">{{ $post->title }}</h2>
                            
                            <p class="text-gray-600 mb-4 leading-relaxed">{{ $post->excerpt }}</p>
                            
                            <a href="{{ route('posts.show', $post->slug) }}" class="inline-block mt-7 px-8 py-4 bg-orange-600 text-white rounded hover:bg-orange-700 transition-colors">
                                Read More →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

</body>

</html>


@section('content')
<!DOCTYPE html>
<html> 

<head>
    @vite(['resources/css/app.css'])
    <title>Baka Blogs</title>
</head>
<body>

<section class="bg-gradient-to-r from-orange-700 to-orange-300 text-white py-20">
    <div class="container mx-auto px-5 text-center">
        <h1 class="text-6xl font-bold mb-7">Welcome to Baka Blogs!</h1>
        <p class="text-xl ">Your daily dose of anime news, reviews, and discussions</p>
    </div>
</section>
<section>
    <div class="grid grid-cols-1 gap-6 mt-10">
    @foreach ($posts as $post)
        <div class="flex bg-white shadow rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-1/3 object-cover">
            <div class="p-6 w-2/3">
                <h2 class="text-xl font-bold text-gray-800">{{ $post->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $post->excerpt }}</p>
                <a href="{{ route('posts.show', $post->slug) }}" class="inline-block mt-4 px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
                    Read More →
                </a>
            </div>
        </div>
    @endforeach
</div>
</section>
</body>

</html>


</body>
</html>

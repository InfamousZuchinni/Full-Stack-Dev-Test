<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baka Blogs</title>

    {{-- Include Tailwind CSS via CDN (or swap with your own CSS) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSRF Token for security --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-gradient-to-r from-orange-600 to-orange-300 shadow p-4 mb-6 text-white">
        <div class="container mx-auto flex justify-between items-center ">
            <h1 class="text-5xl font-bold mb-8 mt-4">
                <a href="{{ route('home') }}">Baka Blogs</a>
            </h1>
            <nav>
                <a href="{{ route('posts.create') }}" class=" hover:underline">Create Post</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-">
        @yield('content')
    </main>

    


</body>
</html>

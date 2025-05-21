<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>

    {{-- Include Tailwind CSS via CDN (or swap with your own CSS) --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- CSRF Token for security --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 text-gray-900">

    <header class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                <a href="{{ route('home') }}">My Blog</a>
            </h1>
            <nav>
                <a href="{{ route('posts.create') }}" class="text-blue-600 hover:underline">Create Post</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4">
        @yield('content')
    </main>

    <footer class="mt-10 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} My Blog. All rights reserved.
    </footer>

</body>
</html>

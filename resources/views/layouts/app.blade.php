<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baka Blogs</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 ">

    <header class="bg-gradient-to-r from-orange-600 to-orange-300 shadow p-4 mb-6 text-white w-full">
        <div class="w-full flex px-8 justify-between  items-center ">
            <h1 class="text-7xl font-bold mb-4 mt-4 ml-4 flex-grow">
                <a href="{{ route('home') }}">Baka Blogs</a>
                <p class="ml-2 mt-4 text-3xl ">Your daily dose of Anime news and reviews</p>
            </h1>
        </div>
    </header>

    <main class="">
        @yield('content')
    </main>


</body>
</html>

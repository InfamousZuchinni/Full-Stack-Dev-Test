@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10 text-gray-600">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <img src="{{ asset(path: $post->image) }}" alt="{{ $post->title }}" class="w-full">   
        <div class="prose prose-lg max-w-none text-gray-600 text-xl">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
@endsection

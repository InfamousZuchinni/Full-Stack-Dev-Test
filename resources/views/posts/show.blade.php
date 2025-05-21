@extends('layouts.app') {{-- or use basic layout --}}

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full mb-6 rounded-lg">
        <div class="prose prose-lg max-w-none">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
@endsection

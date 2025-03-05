@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Últimas Publicaciones</h1>
    <div class="post-list">
        @foreach ($posts as $post)
            <div class="post-card">
                <h2>{{ $post->title }}</h2>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('blog.show', $post) }}">Leer más</a>
            </div>
        @endforeach
    </div>
@endsection

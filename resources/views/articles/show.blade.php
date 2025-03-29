@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>Autor: {{ $article->author->name }}</p>
    <p>{{ $article->content }}</p>

    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="Imagen destacada">
    @endif

    <h2>Comentarios</h2>
    @foreach ($article->comments as $comment)
        <div>
            <strong>{{ $comment->username }}</strong> ({{ $comment->email }})
            <p>{{ $comment->content }}</p>
        </div>
    @endforeach

    <h3>Añadir un comentario</h3>
    <form action="{{ route('comments.store', $article) }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Comentario:</label>
        <textarea name="content" required></textarea>

        <button type="submit">Enviar</button>
    </form>

    <a href="{{ route('articles.index') }}">Volver a la lista</a>
@endsection

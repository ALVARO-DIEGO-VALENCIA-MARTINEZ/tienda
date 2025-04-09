@extends('layouts.app')

@section('title', 'Lista de Artículos')

@section('content')
    <h1>Lista de Artículos</h1>

    <a href="{{ route('articles.create') }}">Crear Nuevo Artículo</a>

    @if ($articles->count() > 0)
        @foreach ($articles as $article)
            <div class="article-card">
                <h2>{{ $article->title }}</h2>
                <p>{{ Str::limit($article->content, 150) }}</p>
                <p>Autor: {{ $article->author->name ?? 'Anónimo' }}</p>
                <p>Categoría: {{ $article->category->name ?? 'Sin categoría' }}</p>
                <a href="{{ route('articles.show', $article) }}">Leer más</a>
            </div>
        @endforeach
        {{ $articles->links() }} {{-- Paginación --}}
    @else
        <p>No hay artículos disponibles.</p>
    @endif
   
@endsection

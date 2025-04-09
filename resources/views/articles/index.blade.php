@extends('layouts.app')

@section('content')
    <h1>Lista de Artículos</h1>

    @if (isset($articles) && $articles->count() > 0)
        @foreach ($articles as $article)
            <div>
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->content }}</p>
                <p><strong>Autor:</strong> {{ $article->author->name ?? 'Desconocido' }}</p>
                <p><strong>Publicado:</strong> {{ $article->published_at }}</p>
            </div>
        @endforeach

        {{ $articles->links() }} <!-- Paginación -->
    @else
        <p>No hay artículos disponibles.</p>
    @endif
    <a href="{{route('blog.create')}}">Crear nuevo articulo</a>
@endsection

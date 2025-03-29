@extends('layouts.app')

@section('title', 'Editar Artículo')

@section('content')
    <h1>Editar Artículo</h1>

    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Título:</label>
        <input type="text" name="title" value="{{ $article->title }}" required>

        <label>Contenido:</label>
        <textarea name="content" required>{{ $article->content }}</textarea>

        <label>Imagen destacada:</label>
        <input type="file" name="image">
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="Imagen actual" width="150">
        @endif

        <label>Categoría:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('articles.index') }}">Volver a la lista</a>
@endsection

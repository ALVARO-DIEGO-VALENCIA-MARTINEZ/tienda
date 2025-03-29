@extends('layouts.app')

@section('title', 'Crear Artículo')

@section('content')
    <h1>Crear Nuevo Artículo</h1>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Título:</label>
        <input type="text" name="title" required>

        <label>Contenido:</label>
        <textarea name="content" required></textarea>

        <label>Imagen destacada:</label>
        <input type="file" name="image">

        <label>Categoría:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('articles.index') }}">Volver a la lista</a>
@endsection

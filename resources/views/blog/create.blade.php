@extends('layouts.app')

@section('title', 'Crear Artículo')

@section('content')
    <h1>Crear Nuevo Artículo</h1>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" required>

        <label for="content">Contenido:</label>
        <textarea name="content" required></textarea>

        <label for="image">Imagen destacada:</label>
        <input type="file" name="image">

        <label for="category">Categoría:</label>
        <select name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>
@endsection

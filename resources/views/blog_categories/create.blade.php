@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <h1>Crear Categoría</h1>

    <form action="{{ route('blog-categories.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" required>

        <label for="description">Descripción:</label>
        <textarea name="description"></textarea>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('blog-categories.index') }}">Volver a la lista</a>
@endsection

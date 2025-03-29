@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <h1>Crear Nueva Categoría</h1>

    {{-- Formulario para crear categoría --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="description">Descripción:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('categories.index') }}">Volver a la lista</a>
@endsection

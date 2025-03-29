@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h1>Editar Categoría</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de edición --}}
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre de la Categoría:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('categories.index') }}">Volver a la lista</a>
@endsection

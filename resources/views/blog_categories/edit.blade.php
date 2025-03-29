@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h1>Editar Categoría</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <p>Por favor, corrige los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog-categories.update', $blogCategory) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $blogCategory->name) }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description">{{ old('description', $blogCategory->description) }}</textarea>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('blog-categories.index') }}">Volver a la lista</a>
@endsection

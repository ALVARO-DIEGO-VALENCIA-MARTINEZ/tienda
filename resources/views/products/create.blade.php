@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
    <h1>Agregar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" value="{{ old('price') }}" step="0.01" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock') }}" required>

        <label for="category_id">Categoría:</label>
        <select name="category_id" required>
            <option value="">Seleccione una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="image">Imagen:</label>
        <input type="file" name="image">

        <button type="submit">Guardar Producto</button>
    </form>
@endsection

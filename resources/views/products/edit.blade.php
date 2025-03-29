@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>

        <label for="category_id">Categoría:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label for="image">Imagen:</label>
        <input type="file" name="image" id="image">

        <button type="submit">Actualizar Producto</button>
    </form>

    <a href="{{ route('products.index') }}">Volver a la lista</a>
@endsection

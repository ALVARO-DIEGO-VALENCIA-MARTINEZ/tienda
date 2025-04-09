@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
    <h1>Lista de Productos</h1>

    {{-- Formulario de filtrado por categoría --}}
    <form method="GET" action="{{ route('products.index') }}">
        <label for="category">Filtrar por categoría:</label>
        <select name="category" id="category">
            <option value="">Todas las categorías</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>

    {{-- Botón para agregar un nuevo producto --}}
    <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar Producto</a>

    {{-- Mostrar mensaje de éxito si existe --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Listado de productos --}}
    @if ($products->count() > 0)
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-card">
                    <h2>{{ $product->name }}</h2>
                    <p>Precio: ${{ number_format($product->price, 2) }}</p>
                    <p>Stock: {{ $product->stock }}</p>
                    <p>Categoría: {{ $product->category->name ?? 'Sin categoría' }}</p>
                    @auth
                        
                   
                    <a href="{{ route('products.show', $product) }}">Ver más</a>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>
                    

                    {{-- Formulario para eliminar el producto --}}
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                       
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Eliminar</button>
                        @endauth
                    </form>
                </div>
            @endforeach
        </div>

        {{-- Paginación --}}
        {{ $products->links() }}
    @else
        <p>No hay productos disponibles.</p>
    @endif
@endsection

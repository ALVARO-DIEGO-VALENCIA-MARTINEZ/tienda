@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Precio: ${{ $product->price }}</p>
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
    <a href="{{ route('products.index') }}">Volver a la tienda</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    
@endsection

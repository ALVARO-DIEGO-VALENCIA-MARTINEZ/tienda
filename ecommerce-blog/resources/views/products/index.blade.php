@extends('layouts.app')

@section('title', 'Tienda')

@section('content')
    <h1>Productos</h1>
    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-card">
                <h2>{{ $product->name }}</h2>
                <p>Precio: ${{ $product->price }}</p>
                <a href="{{ route('products.show', $product) }}">Ver más</a>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido a Mi E-commerce</h1>
    <p>Descubre nuestros productos y artículos del blog.</p>
    <a href="{{ route('products.index') }}">Ver tienda</a>
    <a href="{{ route('blog.index') }}">Leer blog</a>
    <a href="{{ route('categories.index') }}">crear categoria</a>
@endsection

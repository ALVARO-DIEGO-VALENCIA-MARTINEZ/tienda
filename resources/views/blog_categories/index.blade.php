@extends('layouts.app')

@section('content')
    <h1>Categorías de Blog</h1>

    @if ($categories->count() > 0)
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay categorías disponibles.</p>
    @endif
@endsection

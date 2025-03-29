@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
    <h1>Lista de Categorías</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">Agregar Categoría</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($categories->count() > 0)
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta categoría?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red;">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $categories->links() }}
    @else
        <p>No hay categorías disponibles.</p>
    @endif
@endsection

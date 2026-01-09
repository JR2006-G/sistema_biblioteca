@extends('layouts.app')

@section('content')
<h2 class="mb-3">📘 Libros</h2>

<a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Nuevo Libro
</a>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Título</th>
            <th>Editorial</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($libros as $libro)
        <tr>
            <td>{{ $libro->titulo }}</td>
            <td>{{ $libro->editorial->nombre }}</td>
            <td>
                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i>
                </a>

                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Seguro que deseas eliminar este libro?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

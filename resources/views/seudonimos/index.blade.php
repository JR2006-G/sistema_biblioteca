@extends('layouts.app')

@section('content')
<h2 class="mb-3">✍️ Seudónimos</h2>

<a href="{{ route('seudonimos.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Nuevo Seudónimo
</a>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>Autor</th>
            <th>Nombre pluma</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($seudonimos as $s)
        <tr>
            <td>{{ $s->autor->nombre_real }}</td>
            <td>{{ $s->nombre_pluma }}</td>
            <td>
                <!-- EDITAR -->
                <a href="{{ route('seudonimos.edit', $s->id) }}" 
                   class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i>
                </a>

                <!-- ELIMINAR -->
                <form action="{{ route('seudonimos.destroy', $s->id) }}" 
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Eliminar este seudónimo?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

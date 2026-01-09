@extends('layouts.app')

@section('content')
<h2>✏️ Editar Libro</h2>

<form action="{{ route('libros.update', $libro->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control"
               value="{{ $libro->titulo }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Editorial</label>
        <select name="editorial_id" class="form-control" required>
            @foreach($editoriales as $editorial)
                <option value="{{ $editorial->id }}"
                    {{ $libro->editorial_id == $editorial->id ? 'selected' : '' }}>
                    {{ $editorial->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">
        <i class="bi bi-save"></i> Actualizar
    </button>

    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

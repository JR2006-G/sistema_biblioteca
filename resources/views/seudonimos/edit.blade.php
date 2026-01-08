@extends('layouts.app')

@section('content')
<h2 class="mb-4">✏️ Editar Seudónimo</h2>

<form action="{{ route('seudonimos.update', $seudonimo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Autor</label>
        <select name="autor_id" class="form-control" required>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}"
                    {{ old('autor_id', $seudonimo->autor_id) == $autor->id ? 'selected' : '' }}>
                    {{ $autor->nombre_real }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre pluma</label>
        <input type="text"
               name="nombre_pluma"
               class="form-control"
               value="{{ old('nombre_pluma', $seudonimo->nombre_pluma) }}"
               required>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('seudonimos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

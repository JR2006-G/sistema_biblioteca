@extends('layouts.app')

@section('content')
<h2 class="mb-4">✍️ Nuevo Seudónimo</h2>

<form action="{{ route('seudonimos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre real del autor</label>
        <input type="text" name="autor_nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre pluma</label>
        <input type="text" name="nombre_pluma" class="form-control" required>
    </div>

    <button class="btn btn-success">
        Guardar
    </button>

    <a href="{{ route('seudonimos.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection

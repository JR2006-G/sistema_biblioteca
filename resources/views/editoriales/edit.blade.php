@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('editoriales.update', $editorial) }}">
    @csrf
    @method('PUT')

    <input name="nombre" class="form-control mb-2"
           value="{{ $editorial->nombre }}">

    <input name="pais" class="form-control mb-2"
           value="{{ $editorial->pais }}">

    <button class="btn btn-warning">Actualizar</button>
</form>
@endsection

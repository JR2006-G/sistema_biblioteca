@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('autores.update', $autor) }}">
    @csrf
    @method('PUT')

    <input name="nombre_real" class="form-control mb-2"
           value="{{ $autor->nombre_real }}">

    <input name="email" class="form-control mb-2"
           value="{{ $autor->email }}">

    <button class="btn btn-warning">Actualizar</button>
</form>
@endsection

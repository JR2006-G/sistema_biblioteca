@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('editoriales.store') }}">
    @csrf
    <input name="nombre" class="form-control mb-2" placeholder="Nombre">
    <input name="pais" class="form-control mb-2" placeholder="País">
    <button class="btn btn-success">Guardar</button>
</form>
@endsection

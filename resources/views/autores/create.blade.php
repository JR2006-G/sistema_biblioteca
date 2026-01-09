@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('autores.store') }}">
    @csrf
    <input name="nombre_real" class="form-control mb-2" placeholder="Nombre real">
    <input name="email" class="form-control mb-2" placeholder="Email">
    <button class="btn btn-success">Guardar</button>
</form>
@endsection

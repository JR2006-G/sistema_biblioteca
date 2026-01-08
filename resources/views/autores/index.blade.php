@extends('layouts.app')

@section('content')
<a href="{{ route('autores.create') }}" class="btn btn-primary mb-3">Nuevo Autor</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
    @foreach($autores as $autor)
    <tr>
        <td>{{ $autor->id }}</td>
        <td>{{ $autor->nombre_real }}</td>
        <td>{{ $autor->email }}</td>
    </tr>
    @endforeach
</table>
@endsection

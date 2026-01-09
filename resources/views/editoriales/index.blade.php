@extends('layouts.app')

@section('content')
<a href="{{ route('editoriales.create') }}" class="btn btn-primary mb-3">Nueva Editorial</a>

<table class="table table-bordered">
    <tr>
        <th>Nombre</th>
        <th>País</th>
    </tr>
    @foreach($editoriales as $editorial)
    <tr>
        <td>{{ $editorial->nombre }}</td>
        <td>{{ $editorial->pais }}</td>
    </tr>
    @endforeach
</table>
@endsection

@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('libros.store') }}">
    @csrf
    <input name="titulo" class="form-control mb-2" placeholder="Título">
    <input name="isbn" class="form-control mb-2" placeholder="ISBN">
    <input name="paginas" type="number" class="form-control mb-2" placeholder="Páginas">

    <select name="editorial_id" class="form-control mb-2">
        @foreach($editoriales as $editorial)
            <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
        @endforeach
    </select>

    @foreach($autores as $autor)
        <div>
            <input type="checkbox" name="autores[]" value="{{ $autor->id }}">
            {{ $autor->nombre_real }}
        </div>
    @endforeach

    <button class="btn btn-success mt-2">Guardar</button>
</form>
@endsection

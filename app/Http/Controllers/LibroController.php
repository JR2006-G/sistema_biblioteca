<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Editorial;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with(['editorial','autores'])->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $editoriales = Editorial::all();
        $autores = Autor::all();
        return view('libros.create', compact('editoriales','autores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'editorial_id' => 'required|exists:editorials,id',
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn',
            'paginas' => 'required|integer|min:1',
            'autores' => 'array',
            'autores.*' => 'exists:autors,id',
        ]);

        $libro = Libro::create($data);
        $libro->autores()->sync($request->autores ?? []);

        return redirect()->route('libros.index');
    }

    public function edit(Libro $libro)
    {
        $editoriales = Editorial::all();
        $autores = Autor::all();
        $seleccionados = $libro->autores->pluck('id')->toArray();

        return view('libros.edit', compact('libro','editoriales','autores','seleccionados'));
    }

    public function update(Request $request, Libro $libro)
    {
        $data = $request->validate([
            'editorial_id' => 'required|exists:editorials,id',
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn,' . $libro->id,
            'paginas' => 'required|integer|min:1',
            'autores' => 'array',
            'autores.*' => 'exists:autors,id',
        ]);

        $libro->update($data);
        $libro->autores()->sync($request->autores ?? []);

        return redirect()->route('libros.index');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}


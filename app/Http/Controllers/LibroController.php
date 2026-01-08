<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Editorial;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    // LISTAR
    public function index()
    {
        $libros = Libro::with('editorial')->get();
        return view('libros.index', compact('libros'));
    }

    // FORM CREAR
    public function create()
    {
        $editoriales = Editorial::all();
        return view('libros.create', compact('editoriales'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial_id' => 'required'
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado correctamente');
    }

    // FORM EDITAR ✅ (ESTE FALTABA)
    public function edit(Libro $libro)
    {
        $editoriales = Editorial::all();
        return view('libros.edit', compact('libro', 'editoriales'));
    }

    // ACTUALIZAR ✅
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial_id' => 'required'
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente');
    }

    // ELIMINAR
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado correctamente');
    }
}

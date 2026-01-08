<?php

namespace App\Http\Controllers;

use App\Models\Seudonimo;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeudonimoController extends Controller
{
    // LISTAR
    public function index()
    {
        $seudonimos = Seudonimo::with('autor')->get();
        return view('seudonimos.index', compact('seudonimos'));
    }

    // FORM CREAR
    public function create()
    {
        return view('seudonimos.create');
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'autor_nombre' => 'required|string|max:255',
            'nombre_pluma' => 'required|string|max:255|unique:seudonimos,nombre_pluma',
        ]);

        // Crear autor
        $autor = Autor::create([
            'nombre_real' => $request->autor_nombre,
            'email' => Str::slug($request->autor_nombre) . rand(100,999) . '@example.com',
        ]);

        // Crear seudónimo
        Seudonimo::create([
            'autor_id' => $autor->id,
            'nombre_pluma' => $request->nombre_pluma,
        ]);

        return redirect()->route('seudonimos.index')
            ->with('success', 'Seudónimo creado correctamente');
    }

    // FORM EDITAR ✅ (AQUÍ ESTABA EL ERROR)
    public function edit(Seudonimo $seudonimo)
    {
        $autores = Autor::all(); // 👈 ESTO FALTABA

        return view('seudonimos.edit', compact('seudonimo', 'autores'));
    }

    // ACTUALIZAR
    public function update(Request $request, Seudonimo $seudonimo)
    {
        $request->validate([
            'autor_id' => 'required|exists:autors,id',
            'nombre_pluma' => 'required|string|max:255|unique:seudonimos,nombre_pluma,' . $seudonimo->id,
        ]);

        $seudonimo->update([
            'autor_id' => $request->autor_id,
            'nombre_pluma' => $request->nombre_pluma,
        ]);

        return redirect()->route('seudonimos.index')
            ->with('success', 'Seudónimo actualizado correctamente');
    }

    // ELIMINAR
    public function destroy(Seudonimo $seudonimo)
    {
        $seudonimo->delete();

        return redirect()->route('seudonimos.index')
            ->with('success', 'Seudónimo eliminado correctamente');
    }
}

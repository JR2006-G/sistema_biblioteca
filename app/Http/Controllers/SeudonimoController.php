<?php

namespace App\Http\Controllers;

use App\Models\Seudonimo;
use App\Models\Autor;
use Illuminate\Http\Request;

class SeudonimoController extends Controller
{
    public function index()
    {
        $seudonimos = Seudonimo::with('autor')->get();
        return view('seudonimos.index', compact('seudonimos'));
    }

    public function create()
    {
        // para mantener 1:1 (solo autores sin seudónimo)
        $autores = Autor::doesntHave('seudonimo')->get();
        return view('seudonimos.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'autor_id' => 'required|exists:autors,id|unique:seudonimos,autor_id',
            'nombre_pluma' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
        ]);

        Seudonimo::create($data);
        return redirect()->route('seudonimos.index');
    }

    public function edit(Seudonimo $seudonimo)
    {
        return view('seudonimos.edit', compact('seudonimo'));
    }

    public function update(Request $request, Seudonimo $seudonimo)
    {
        $data = $request->validate([
            'nombre_pluma' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
        ]);

        $seudonimo->update($data);
        return redirect()->route('seudonimos.index');
    }

    public function destroy(Seudonimo $seudonimo)
    {
        $seudonimo->delete();
        return redirect()->route('seudonimos.index');
    }
}


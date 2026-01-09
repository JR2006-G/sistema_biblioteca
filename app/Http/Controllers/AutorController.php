<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
       $autores = \App\Models\Autor::all();
    return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_real' => 'required|string|max:255',
            'email' => 'required|email|unique:autors,email',
        ]);

        Autor::create($data);
        return redirect()->route('autores.index');
    }

    public function edit(Autor $autore) // resource en español => $autore
    {
        return view('autores.edit', ['autor' => $autore]);
    }

    public function update(Request $request, Autor $autore)
    {
        $data = $request->validate([
            'nombre_real' => 'required|string|max:255',
            'email' => 'required|email|unique:autors,email,' . $autore->id,
        ]);

        $autore->update($data);
        return redirect()->route('autores.index');
    }

    public function destroy(Autor $autore)
    {
        $autore->delete();
        return redirect()->route('autores.index');
    }
}


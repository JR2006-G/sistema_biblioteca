<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $editoriales = Editorial::with('libros')->get();
        return view('editoriales.index', compact('editoriales'));
    }

    public function create()
    {
        return view('editoriales.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
        ]);

        Editorial::create($data);
        return redirect()->route('editoriales.index');
    }

    public function edit(Editorial $editoriale) // resource => $editoriale
    {
        return view('editoriales.edit', ['editorial' => $editoriale]);
    }

    public function update(Request $request, Editorial $editoriale)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
        ]);

        $editoriale->update($data);
        return redirect()->route('editoriales.index');
    }

    public function destroy(Editorial $editoriale)
    {
        $editoriale->delete();
        return redirect()->route('editoriales.index');
    }
}


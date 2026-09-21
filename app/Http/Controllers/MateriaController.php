<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Mostrar la lista de materias.
     */
    public function index()
    {
        $materias = Materia::all();

        return view('materias.index', compact('materias'));
    }

    /**
     * Mostrar el formulario para registrar una materia.
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Guardar una materia nueva.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'clave' => 'required|string|max:255|unique:materias,clave',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        Materia::create($datos);

        return redirect()
            ->route('materias.index')
            ->with('success', 'Materia registrada correctamente.');
    }

    /**
     * Mostrar una materia específica.
     */
    public function show(string $id)
    {
        $materia = Materia::findOrFail($id);

        return view('materias.show', compact('materia'));
    }

    /**
     * Mostrar el formulario para editar una materia.
     */
    public function edit(string $id)
    {
        $materia = Materia::findOrFail($id);

        return view('materias.edit', compact('materia'));
    }

    /**
     * Actualizar una materia.
     */
    public function update(Request $request, string $id)
    {
        $materia = Materia::findOrFail($id);

        $datos = $request->validate([
            'clave' => 'required|string|max:255|unique:materias,clave,' . $id,
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'semestre' => 'required|integer|min:1|max:12',
            'activa' => 'required|boolean',
        ]);

        $materia->update($datos);

        return redirect()
            ->route('materias.index')
            ->with('success', 'Materia actualizada correctamente.');
    }

    /**
     * Eliminar una materia.
     */
    public function destroy(string $id)
    {
        $materia = Materia::findOrFail($id);

        $materia->delete();

        return redirect()
            ->route('materias.index')
            ->with('success', 'Materia eliminada correctamente.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Mostrar todos los grupos.
     */
    public function index()
    {
        $grupos = Grupo::orderBy('grado')
            ->orderBy('nombre')
            ->orderBy('ciclo_escolar', 'desc')
            ->get();

        return view('grupos.index', compact('grupos'));
    }

    /**
     * Mostrar formulario para crear un grupo.
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Guardar un nuevo grupo.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado' => 'required|integer|min:1|max:12',
            'turno' => 'required|string|max:50',
            'ciclo_escolar' => 'required|integer|min:2000|max:2100',
            'activo' => 'nullable|boolean',
        ]);

        Grupo::create([
            'nombre' => $request->nombre,
            'grado' => $request->grado,
            'turno' => $request->turno,
            'ciclo_escolar' => $request->ciclo_escolar,
            'activo' => $request->has('activo'),
        ]);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo creado correctamente.');
    }

    /**
     * Mostrar un grupo específico.
     */
    public function show(Grupo $grupo)
    {
        return view('grupos.show', compact('grupo'));
    }

    /**
     * Mostrar formulario para editar un grupo.
     */
    public function edit(Grupo $grupo)
    {
        return view('grupos.edit', compact('grupo'));
    }

    /**
     * Actualizar un grupo.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado' => 'required|integer|min:1|max:12',
            'turno' => 'required|string|max:50',
            'ciclo_escolar' => 'required|integer|min:2000|max:2100',
            'activo' => 'nullable|boolean',
        ]);

        $grupo->update([
            'nombre' => $request->nombre,
            'grado' => $request->grado,
            'turno' => $request->turno,
            'ciclo_escolar' => $request->ciclo_escolar,
            'activo' => $request->has('activo'),
        ]);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo actualizado correctamente.');
    }

    /**
     * Eliminar un grupo.
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo eliminado correctamente.');
    }
}
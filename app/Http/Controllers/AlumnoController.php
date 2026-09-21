<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'idmatricula' => 'required|string|max:255|unique:alumnos,idmatricula',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'grado' => 'required|integer|min:1|max:6',
            'grupo' => 'required|string|max:10',
        ]);

        Alumno::create($datos);

        return redirect()
            ->route('alumnos.index')
            ->with('success', 'Alumno registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno = Alumno::findOrFail($id);

        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumno::findOrFail($id);

        $datos = $request->validate([
            'idmatricula' => 'required|string|max:255|unique:alumnos,idmatricula,' . $id,
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'grado' => 'required|integer|min:1|max:6',
            'grupo' => 'required|string|max:10',
        ]);

        $alumno->update($datos);

        return redirect()
            ->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);

        $alumno->delete();

        return redirect()
            ->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente.');
    }
}
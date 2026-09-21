<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $docentes = Docente::all();

    return view('docentes.index', compact('docentes'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('docentes.create');
}

    /**
     * Store a newly created resource in storage.
     */
   
public function store(Request $request)
{
    $datos = $request->validate([
        'numero_empleado' => 'required|string|max:255|unique:docentes,numero_empleado',
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:docentes,email',
        'telefono' => 'nullable|string|max:20',
        'especialidad' => 'nullable|string|max:255',
    ]);

    Docente::create($datos);

    return redirect()
        ->route('docentes.index')
        ->with('success', 'Docente registrado correctamente.');
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
    $docente = Docente::findOrFail($id);

    return view('docentes.edit', compact('docente'));
}

    /**
     * Update the specified resource in storage.
     */
    
public function update(Request $request, string $id)
{
    $docente = Docente::findOrFail($id);

    $datos = $request->validate([
        'numero_empleado' => 'required|string|max:255|unique:docentes,numero_empleado,' . $id,
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:docentes,email,' . $id,
        'telefono' => 'nullable|string|max:20',
        'especialidad' => 'nullable|string|max:255',
        'activo' => 'required|boolean',
    ]);

    $docente->update($datos);

    return redirect()
        ->route('docentes.index')
        ->with('success', 'Docente actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
   
public function destroy(string $id)
{
    $docente = Docente::findOrFail($id);

    $docente->delete();

    return redirect()
        ->route('docentes.index')
        ->with('success', 'Docente eliminado correctamente.');
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\Grupo;
use App\Models\Salon;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Mostrar la lista de horarios.
     */
 /**
 * Mostrar la lista de horarios.
 */
public function index(Request $request)
{
    $docentes = Docente::where('activo', true)->get();

    $consulta = Horario::with([
        'docente',
        'materia',
        'grupo',
        'salon'
    ]);

    if ($request->filled('docente_id')) {
        $consulta->where('docente_id', $request->docente_id);
    }

    $horarios = $consulta->get();

    return view('horarios.index', compact(
        'horarios',
        'docentes'
    ));
}

    /**
     * Mostrar el formulario para registrar un horario.
     */
    public function create()
    {
        $docentes = Docente::where('activo', true)->get();
        $materias = Materia::where('activa', true)->get();
        $grupos = Grupo::all();
        $salones = Salon::all();

        return view('horarios.create', compact(
            'docentes',
            'materias',
            'grupos',
            'salones'
        ));
    }

    /**
     * Guardar un horario nuevo.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'materia_id' => 'required|exists:materias,id',
            'grupo_id' => 'required|exists:grupos,id',
            'salon_id' => 'required|exists:salons,id',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        /*
         * Verificar conflictos de horario.
         *
         * No se permite que se repita el mismo:
         * - Docente
         * - Grupo
         * - Salón
         *
         * En el mismo día y en horarios que se crucen.
         */
        $conflicto = Horario::where('dia_semana', $datos['dia_semana'])
            ->where(function ($query) use ($datos) {
                $query->where('docente_id', $datos['docente_id'])
                    ->orWhere('grupo_id', $datos['grupo_id'])
                    ->orWhere('salon_id', $datos['salon_id']);
            })
            ->where(function ($query) use ($datos) {
                $query->where('hora_inicio', '<', $datos['hora_fin'])
                    ->where('hora_fin', '>', $datos['hora_inicio']);
            })
            ->exists();

        if ($conflicto) {
            return back()
                ->withInput()
                ->withErrors([
                    'hora_inicio' => 'Existe un conflicto de horario con el docente, grupo o salón seleccionado.',
                ]);
        }

        Horario::create($datos);

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario registrado correctamente.');
    }

    /**
     * Mostrar un horario específico.
     */
    public function show(string $id)
    {
        $horario = Horario::with([
            'docente',
            'materia',
            'grupo',
            'salon'
        ])->findOrFail($id);

        return view('horarios.show', compact('horario'));
    }

    /**
     * Mostrar el formulario para editar un horario.
     */
    public function edit(string $id)
    {
        $horario = Horario::findOrFail($id);

        $docentes = Docente::where('activo', true)->get();
        $materias = Materia::where('activa', true)->get();
        $grupos = Grupo::all();
        $salones = Salon::all();

        return view('horarios.edit', compact(
            'horario',
            'docentes',
            'materias',
            'grupos',
            'salones'
        ));
    }

    /**
     * Actualizar un horario.
     */
    public function update(Request $request, string $id)
    {
        $horario = Horario::findOrFail($id);

        $datos = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'materia_id' => 'required|exists:materias,id',
            'grupo_id' => 'required|exists:grupos,id',
            'salon_id' => 'required|exists:salons,id',
            'dia_semana' => 'required|string|max:20',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        /*
         * Verificar conflictos de horario al editar.
         *
         * Se excluye el horario actual para que no
         * se detecte a sí mismo como un conflicto.
         */
        $conflicto = Horario::where('id', '!=', $horario->id)
            ->where('dia_semana', $datos['dia_semana'])
            ->where(function ($query) use ($datos) {
                $query->where('docente_id', $datos['docente_id'])
                    ->orWhere('grupo_id', $datos['grupo_id'])
                    ->orWhere('salon_id', $datos['salon_id']);
            })
            ->where(function ($query) use ($datos) {
                $query->where('hora_inicio', '<', $datos['hora_fin'])
                    ->where('hora_fin', '>', $datos['hora_inicio']);
            })
            ->exists();

        if ($conflicto) {
            return back()
                ->withInput()
                ->withErrors([
                    'hora_inicio' => 'Existe un conflicto de horario con el docente, grupo o salón seleccionado.',
                ]);
        }

        $horario->update($datos);

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    /**
     * Eliminar un horario.
     */
    public function destroy(string $id)
    {
        $horario = Horario::findOrFail($id);

        $horario->delete();

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}
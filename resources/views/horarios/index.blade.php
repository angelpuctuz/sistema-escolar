
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Horarios</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="max-width: 1400px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h1 style="color: #333;">
            Horarios y Asignación de Materias
        </h1>

        <a href="{{ route('horarios.create') }}"
           style="display: inline-block; background-color: #198754; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
            + Nuevo Horario
        </a>

        @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 5px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filtro por docente -->
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #ddd;">

            <h2 style="color: #333; margin-top: 0;">
                Consultar horario por docente
            </h2>

            <form action="{{ route('horarios.index') }}" method="GET">

                <label for="docente_id"
                       style="display: block; margin-bottom: 8px; font-weight: bold;">
                    Seleccionar docente:
                </label>

                <select name="docente_id"
                        id="docente_id"
                        style="width: 100%; max-width: 500px; padding: 10px; border: 1px solid #aaa; border-radius: 5px; margin-bottom: 12px;">

                    <option value="">
                        -- Mostrar todos los docentes --
                    </option>

                    @foreach($docentes as $docente)

                        <option value="{{ $docente->id }}"
                            {{ request('docente_id') == $docente->id ? 'selected' : '' }}>

                            {{ $docente->nombres }} {{ $docente->apellidos }}

                        </option>

                    @endforeach

                </select>

                <br>

                <button type="submit"
                        style="background-color: #0d6efd; color: white; padding: 10px 18px; border: none; border-radius: 5px; cursor: pointer;">
                    Consultar horario
                </button>

                <a href="{{ route('horarios.index') }}"
                   style="display: inline-block; background-color: #6c757d; color: white; padding: 10px 18px; text-decoration: none; border-radius: 5px; margin-left: 5px;">
                    Mostrar todos
                </a>

            </form>

        </div>

        <!-- Título de la tabla -->
        @if(request('docente_id'))

            @php
                $docenteSeleccionado = $docentes->firstWhere('id', request('docente_id'));
            @endphp

            @if($docenteSeleccionado)

                <h2 style="color: #333;">
                    Horario de:
                    {{ $docenteSeleccionado->nombres }}
                    {{ $docenteSeleccionado->apellidos }}
                </h2>

            @endif

        @else

            <h2 style="color: #333;">
                Todos los horarios registrados
            </h2>

        @endif

        <!-- Tabla de horarios -->
        <div style="overflow-x: auto;">

            <table style="width: 100%; border-collapse: collapse;">

                <thead>

                    <tr style="background-color: #343a40; color: white;">

                        <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Docente</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Materia</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Grupo</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Salón</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Día</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Hora de inicio</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Hora de fin</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($horarios as $horario)

                        <tr>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->id }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->docente->nombres ?? 'Sin docente' }}
                                {{ $horario->docente->apellidos ?? '' }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->materia->nombre ?? 'Sin materia' }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->grupo->nombre ?? 'Sin grupo' }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->salon->nombre ?? 'Sin salón' }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->dia_semana }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->hora_inicio }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">
                                {{ $horario->hora_fin }}
                            </td>

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                <a href="{{ route('horarios.edit', $horario->id) }}"
                                   style="background-color: #0d6efd; color: white; padding: 7px 10px; text-decoration: none; border-radius: 4px;">
                                    Editar
                                </a>

                                <form action="{{ route('horarios.destroy', $horario->id) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este horario?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            style="background-color: #dc3545; color: white; padding: 7px 10px; border: none; border-radius: 4px; cursor: pointer;">
                                        Eliminar
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                style="padding: 20px; text-align: center; color: #666;">

                                No hay horarios registrados para este docente.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>
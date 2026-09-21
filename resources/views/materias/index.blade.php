
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Materias</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="max-width: 1200px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h1 style="color: #333;">Gestión de Materias</h1>

        <a href="{{ route('materias.create') }}"
           style="display: inline-block; background-color: #198754; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
            + Nueva Materia
        </a>

        @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 5px; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <table style="width: 100%; border-collapse: collapse;">

            <thead>
                <tr style="background-color: #343a40; color: white;">
                    <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Clave</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Nombre</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Descripción</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Semestre</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Estado</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse($materias as $materia)

                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $materia->id }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $materia->clave }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $materia->nombre }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $materia->descripcion ?? 'Sin descripción' }}
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">
                            {{ $materia->semestre }}
                        </td>



                        <td style="padding: 10px; border: 1px solid #ddd;">
                            @if($materia->activa)
                                <span style="color: green; font-weight: bold;">Activa</span>
                            @else
                                <span style="color: red; font-weight: bold;">Inactiva</span>
                            @endif
                        </td>

                        <td style="padding: 10px; border: 1px solid #ddd;">

                            <a href="{{ route('materias.edit', $materia->id) }}"
                               style="background-color: #0d6efd; color: white; padding: 7px 10px; text-decoration: none; border-radius: 4px;">
                                Editar
                            </a>

                            <form action="{{ route('materias.destroy', $materia->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('¿Estás seguro de eliminar esta materia?');">

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
                        <td colspan="8" style="padding: 20px; text-align: center;">
                            No hay materias registradas.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</body>
</html>
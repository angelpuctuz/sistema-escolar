
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="max-width: 700px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h1 style="color: #333;">Editar Materia</h1>

        @if($errors->any())
            <div style="background-color: #f8d7da; color: #842029; padding: 12px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materias.update', $materia->id) }}" method="POST">

            @csrf
            @method('PUT')

            <label>Clave de la materia:</label>
            <input type="text" name="clave" value="{{ old('clave', $materia->clave) }}" required
                   style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

            <label>Nombre de la materia:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $materia->nombre) }}" required
                   style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

            <label>Descripción:</label>
            <textarea name="descripcion" rows="4"
                      style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">{{ old('descripcion', $materia->descripcion) }}</textarea>

            <label>Semestre:</label>
            <select name="semestre" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                @for($i = 1; $i <= 6; $i++)
                    <option value="{{ $i }}"
                        {{ old('semestre', $materia->semestre) == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor

            </select>

           

            <label>Estado:</label>
            <select name="activa" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="1" {{ old('activa', $materia->activa) == 1 ? 'selected' : '' }}>
                    Activa
                </option>

                <option value="0" {{ old('activa', $materia->activa) == 0 ? 'selected' : '' }}>
                    Inactiva
                </option>

            </select>

            <button type="submit"
                    style="background-color: #0d6efd; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Actualizar Materia
            </button>

            <a href="{{ route('materias.index') }}"
               style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 8px;">
                Cancelar
            </a>

        </form>

    </div>

</body>
</html>
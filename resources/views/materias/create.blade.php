
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Materia</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="max-width: 700px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h1 style="color: #333;">Registrar Nueva Materia</h1>

        @if($errors->any())
            <div style="background-color: #f8d7da; color: #842029; padding: 12px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materias.store') }}" method="POST">

            @csrf

            <label>Clave de la materia:</label>
            <input type="text" name="clave" value="{{ old('clave') }}" required
                   style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

            <label>Nombre de la materia:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required
                   style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

            <label>Descripción:</label>
            <textarea name="descripcion" rows="4"
                      style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">{{ old('descripcion') }}</textarea>

            <label>Semestre:</label>
            <select name="semestre" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="">Selecciona el semestre</option>

                @for($i = 1; $i <= 6; $i++)
                    <option value="{{ $i }}" {{ old('semestre') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor

            </select>

           
            <button type="submit"
                    style="background-color: #198754; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Guardar Materia
            </button>

            <a href="{{ route('materias.index') }}"
               style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 8px;">
                Cancelar
            </a>

        </form>

    </div>

</body>
</html>
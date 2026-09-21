
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Horario</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="max-width: 700px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h1 style="color: #333;">Editar Horario</h1>

        @if($errors->any())
            <div style="background-color: #f8d7da; color: #842029; padding: 12px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('horarios.update', $horario->id) }}" method="POST">

            @csrf
            @method('PUT')

            <label>Docente:</label>
            <select name="docente_id" required style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">
                <option value="">Selecciona un docente</option>

                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}"
                        {{ old('docente_id', $horario->docente_id) == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombres }} {{ $docente->apellidos }}
                    </option>
                @endforeach
            </select>

            <label>Materia:</label>
            <select name="materia_id" required style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">
                <option value="">Selecciona una materia</option>

                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}"
                        {{ old('materia_id', $horario->materia_id) == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Grupo:</label>
            <select name="grupo_id" required style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">
                <option value="">Selecciona un grupo</option>

                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->id }}"
                        {{ old('grupo_id', $horario->grupo_id) == $grupo->id ? 'selected' : '' }}>
                        {{ $grupo->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Salón:</label>
            <select name="salon_id" required style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">
                <option value="">Selecciona un salón</option>

                @foreach($salones as $salon)
                    <option value="{{ $salon->id }}"
                        {{ old('salon_id', $horario->salon_id) == $salon->id ? 'selected' : '' }}>
                        {{ $salon->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Día:</label>
            
<label>Día:</label>

<select name="dia_semana" required
        style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

    <option value="">Selecciona un día</option>

    <option value="Lunes"
        {{ old('dia_semana', $horario->dia_semana) == 'Lunes' ? 'selected' : '' }}>
        Lunes
    </option>

    <option value="Martes"
        {{ old('dia_semana', $horario->dia_semana) == 'Martes' ? 'selected' : '' }}>
        Martes
    </option>

    <option value="Miércoles"
        {{ old('dia_semana', $horario->dia_semana) == 'Miércoles' ? 'selected' : '' }}>
        Miércoles
    </option>

    <option value="Jueves"
        {{ old('dia_semana', $horario->dia_semana) == 'Jueves' ? 'selected' : '' }}>
        Jueves
    </option>

    <option value="Viernes"
        {{ old('dia_semana', $horario->dia_semana) == 'Viernes' ? 'selected' : '' }}>
        Viernes
    </option>

    </option>

</select>
            
<label>Hora de inicio (24 horas):</label>

<select name="hora_inicio" required
        style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

    <option value="">Selecciona la hora de inicio</option>

    @for($hora = 7; $hora <= 23; $hora++)
        @php
            $horaFormato = sprintf('%02d:00', $hora);
            $horaActual = \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i');
        @endphp

        <option value="{{ $horaFormato }}"
            {{ old('hora_inicio', $horaActual) == $horaFormato ? 'selected' : '' }}>

            {{ $horaFormato }}

        </option>
    @endfor

</select>
           

<label>Hora de fin (24 horas):</label>

<select name="hora_fin" required
        style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

    <option value="">Selecciona la hora de fin</option>

    @for($hora = 7; $hora <= 23; $hora++)
        @php
            $horaFormato = sprintf('%02d:00', $hora);
            $horaActual = \Carbon\Carbon::parse($horario->hora_fin)->format('H:i');
        @endphp

        <option value="{{ $horaFormato }}"
            {{ old('hora_fin', $horaActual) == $horaFormato ? 'selected' : '' }}>

            {{ $horaFormato }}

        </option>
    @endfor

</select>
            <button type="submit"
                    style="background-color: #0d6efd; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Actualizar Horario
            </button>

            <a href="{{ route('horarios.index') }}"
               style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 8px;">
                Cancelar
            </a>

        </form>

    </div>

</body>
</html>
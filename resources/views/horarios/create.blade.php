
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Horario</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="max-width: 700px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h1 style="color: #333;">Registrar Nuevo Horario</h1>

        @if($errors->any())
            <div style="background-color: #f8d7da; color: #842029; padding: 12px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('horarios.store') }}" method="POST">

            @csrf

            <!-- Docente -->
            <label>Docente:</label>

            <select name="docente_id" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="">Selecciona un docente</option>

                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}"
                        {{ old('docente_id') == $docente->id ? 'selected' : '' }}>

                        {{ $docente->nombres }} {{ $docente->apellidos }}

                    </option>
                @endforeach

            </select>


            <!-- Materia -->
            <label>Materia:</label>

            <select name="materia_id" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="">Selecciona una materia</option>

                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}"
                        {{ old('materia_id') == $materia->id ? 'selected' : '' }}>

                        {{ $materia->nombre }}

                    </option>
                @endforeach

            </select>


            <!-- Grupo -->
            <label>Grupo:</label>

            <select name="grupo_id" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="">Selecciona un grupo</option>

                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->id }}"
                        {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}>

                        {{ $grupo->nombre }}

                    </option>
                @endforeach

            </select>


            <!-- Salón -->
            <label>Salón:</label>

            <select name="salon_id" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="">Selecciona un salón</option>

                @foreach($salones as $salon)
                    <option value="{{ $salon->id }}"
                        {{ old('salon_id') == $salon->id ? 'selected' : '' }}>

                        {{ $salon->nombre }}

                    </option>
                @endforeach

            </select>


            <!-- Día de la semana -->
            <label>Día:</label>

            <select name="dia_semana" required
                    style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

                <option value="">Selecciona un día</option>

                <option value="Lunes"
                    {{ old('dia_semana') == 'Lunes' ? 'selected' : '' }}>
                    Lunes
                </option>

                <option value="Martes"
                    {{ old('dia_semana') == 'Martes' ? 'selected' : '' }}>
                    Martes
                </option>

                <option value="Miércoles"
                    {{ old('dia_semana') == 'Miércoles' ? 'selected' : '' }}>
                    Miércoles
                </option>

                <option value="Jueves"
                    {{ old('dia_semana') == 'Jueves' ? 'selected' : '' }}>
                    Jueves
                </option>

                <option value="Viernes"
                    {{ old('dia_semana') == 'Viernes' ? 'selected' : '' }}>
                    Viernes
                </option>

                <option value="Sábado"
                    {{ old('dia_semana') == 'Sábado' ? 'selected' : '' }}>
                    Sábado
                </option>

            </select>


            <!-- Hora de inicio -->
            
<label>Hora de inicio (24 horas):</label>

<select name="hora_inicio" required
        style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

    <option value="">Selecciona la hora de inicio</option>

    @for($hora = 7; $hora <= 23; $hora++)
        @php
            $horaFormato = sprintf('%02d:00', $hora);
        @endphp

        <option value="{{ $horaFormato }}"
            {{ old('hora_inicio') == $horaFormato ? 'selected' : '' }}>

            {{ $horaFormato }}

        </option>
    @endfor

</select>

            <!-- Hora de fin -->
         
<label>Hora de fin (24 horas):</label>

<select name="hora_fin" required
        style="width: 100%; padding: 10px; margin: 8px 0 15px; box-sizing: border-box;">

    <option value="">Selecciona la hora de fin</option>

    @for($hora = 7; $hora <= 23; $hora++)
        @php
            $horaFormato = sprintf('%02d:00', $hora);
        @endphp

        <option value="{{ $horaFormato }}"
            {{ old('hora_fin') == $horaFormato ? 'selected' : '' }}>

            {{ $horaFormato }}

        </option>
    @endfor

</select>


            <!-- Botón Guardar -->
            <button
                type="submit"
                style="background-color: #198754; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"
            >
                Guardar Horario
            </button>


            <!-- Botón Cancelar -->
            <a
                href="{{ route('horarios.index') }}"
                style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 8px;"
            >
                Cancelar
            </a>

        </form>

    </div>

</body>
</html>
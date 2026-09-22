<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestión de Horarios</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px;">

    <div style="
        max-width: 1400px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    ">

        <x-boton-inicio />

        <h1 style="color: #333;">
            Horarios y Asignación de Materias
        </h1>


        {{-- BOTÓN NUEVO HORARIO --}}

        <a href="{{ route('horarios.create') }}"
           style="
               display: inline-block;
               background-color: #198754;
               color: white;
               padding: 10px 15px;
               text-decoration: none;
               border-radius: 5px;
               margin-bottom: 20px;
           ">

            + Nuevo Horario

        </a>


        {{-- MENSAJE DE ÉXITO --}}

        @if(session('success'))

            <div style="
                background-color: #d1e7dd;
                color: #0f5132;
                padding: 12px;
                border-radius: 5px;
                margin-bottom: 15px;
            ">

                {{ session('success') }}

            </div>

        @endif


        {{-- FILTROS COMBINADOS --}}

        <div style="
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #ddd;
        ">

            <h2 style="color: #333; margin-top: 0;">
                Consultar horarios
            </h2>


            <form action="{{ route('horarios.index') }}" method="GET">


                {{-- FILTRO POR GRADO --}}

                <label for="grado"
                       style="
                           display: block;
                           margin-bottom: 8px;
                           font-weight: bold;
                       ">

                    Seleccionar grado:

                </label>


                <select name="grado"
                        id="grado"
                        style="
                            width: 100%;
                            max-width: 500px;
                            padding: 10px;
                            border: 1px solid #aaa;
                            border-radius: 5px;
                            margin-bottom: 15px;
                        ">

                    <option value="">
                        -- Mostrar todos los grados --
                    </option>


                    @foreach($grados as $grado)

                        <option value="{{ $grado }}"
                            {{ request('grado') == $grado ? 'selected' : '' }}>

                            {{ $grado }}

                        </option>

                    @endforeach

                </select>



                {{-- FILTRO POR GRUPO --}}

                <label for="grupo_id"
                       style="
                           display: block;
                           margin-bottom: 8px;
                           font-weight: bold;
                       ">

                    Seleccionar grupo:

                </label>


                <select name="grupo_id"
                        id="grupo_id"
                        style="
                            width: 100%;
                            max-width: 500px;
                            padding: 10px;
                            border: 1px solid #aaa;
                            border-radius: 5px;
                            margin-bottom: 15px;
                        ">

                    <option value="">
                        -- Mostrar todos los grupos --
                    </option>


                    @foreach($grupos as $grupo)

                        <option value="{{ $grupo->id }}"
                            {{ request('grupo_id') == $grupo->id ? 'selected' : '' }}>

                            {{ $grupo->grado }}° {{ $grupo->nombre }}

                        </option>

                    @endforeach

                </select>



                {{-- FILTRO POR DOCENTE --}}

                <label for="docente_id"
                       style="
                           display: block;
                           margin-bottom: 8px;
                           font-weight: bold;
                       ">

                    Seleccionar docente:

                </label>


                <select name="docente_id"
                        id="docente_id"
                        style="
                            width: 100%;
                            max-width: 500px;
                            padding: 10px;
                            border: 1px solid #aaa;
                            border-radius: 5px;
                            margin-bottom: 15px;
                        ">

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



                {{-- BOTÓN CONSULTAR --}}

                <button type="submit"
                        style="
                            background-color: #0d6efd;
                            color: white;
                            padding: 10px 18px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        ">

                    Consultar horarios

                </button>



                {{-- BOTÓN MOSTRAR TODOS --}}

                <a href="{{ route('horarios.index') }}"
                   style="
                       display: inline-block;
                       background-color: #6c757d;
                       color: white;
                       padding: 10px 18px;
                       text-decoration: none;
                       border-radius: 5px;
                       margin-left: 5px;
                   ">

                    Mostrar todos

                </a>

            </form>

        </div>



        {{-- TÍTULO SEGÚN LOS FILTROS --}}

        <h2 style="color: #333;">

            @if(request('grado') || request('grupo_id') || request('docente_id'))

                Horarios filtrados

            @else

                Todos los horarios registrados

            @endif

        </h2>



        {{-- TABLA DE HORARIOS --}}

        <div style="overflow-x: auto;">

            <table style="
                width: 100%;
                border-collapse: collapse;
            ">

                <thead>

                    <tr style="
                        background-color: #343a40;
                        color: white;
                    ">

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            ID
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Docente
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Materia
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Grupo
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Salón
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Día
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Hora de inicio
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Hora de fin
                        </th>

                        <th style="padding: 12px; border: 1px solid #ddd;">
                            Acciones
                        </th>

                    </tr>

                </thead>



                <tbody>

                    @forelse($horarios as $horario)

                        <tr>

                            {{-- ID --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ $horario->id }}

                            </td>



                            {{-- DOCENTE --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ $horario->docente->nombres ?? 'Sin docente' }}

                                {{ $horario->docente->apellidos ?? '' }}

                            </td>



                            {{-- MATERIA --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ $horario->materia->nombre ?? 'Sin materia' }}

                            </td>



                            {{-- GRUPO --}}

                            <td style="
                                padding: 10px;
                                border: 1px solid #ddd;
                                font-weight: bold;
                            ">

                                @if($horario->grupo)

                                    {{ $horario->grupo->grado }}° {{ $horario->grupo->nombre }}

                                @else

                                    Sin grupo

                                @endif

                            </td>



                            {{-- SALÓN --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ $horario->salon->nombre ?? 'Sin salón' }}

                            </td>



                            {{-- DÍA --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ $horario->dia_semana }}

                            </td>



                            {{-- HORA DE INICIO --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ date('h:i A', strtotime($horario->hora_inicio)) }}

                            </td>



                            {{-- HORA DE FIN --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                {{ date('h:i A', strtotime($horario->hora_fin)) }}

                            </td>



                            {{-- ACCIONES --}}

                            <td style="padding: 10px; border: 1px solid #ddd;">

                                <a href="{{ route('horarios.edit', $horario->id) }}"
                                   style="
                                       background-color: #0d6efd;
                                       color: white;
                                       padding: 7px 10px;
                                       text-decoration: none;
                                       border-radius: 4px;
                                   ">

                                    Editar

                                </a>



                                <form action="{{ route('horarios.destroy', $horario->id) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este horario?');">

                                    @csrf

                                    @method('DELETE')


                                    <button type="submit"
                                            style="
                                                background-color: #dc3545;
                                                color: white;
                                                padding: 7px 10px;
                                                border: none;
                                                border-radius: 4px;
                                                cursor: pointer;
                                            ">

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="9"
                                style="
                                    padding: 20px;
                                    text-align: center;
                                    color: #666;
                                ">

                                No hay horarios que coincidan con los filtros seleccionados.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>



        {{-- VISTA SEMANAL --}}

        <h2 style="
            color: #333;
            margin-top: 40px;
        ">

            Vista semanal de horarios

        </h2>



        @php

            $diasSemana = [
                'lunes',
                'martes',
                'miércoles',
                'jueves',
                'viernes'
            ];

            // Horas de 07:00 AM a 01:00 PM
            $horasSemana = range(7, 12);


            // COLORES DISPONIBLES PARA LAS MATERIAS

            $coloresMaterias = [

                [
                    'fondo' => '#DBEAFE',
                    'borde' => '#2563EB',
                    'texto' => '#1E3A8A'
                ],

                [
                    'fondo' => '#D1FAE5',
                    'borde' => '#10B981',
                    'texto' => '#065F46'
                ],

                [
                    'fondo' => '#F3E8FF',
                    'borde' => '#A855F7',
                    'texto' => '#6B21A8'
                ],

                [
                    'fondo' => '#FFEDD5',
                    'borde' => '#F97316',
                    'texto' => '#9A3412'
                ],

                [
                    'fondo' => '#FCE7F3',
                    'borde' => '#EC4899',
                    'texto' => '#9D174D'
                ],

                [
                    'fondo' => '#FEF9C3',
                    'borde' => '#EAB308',
                    'texto' => '#854D0E'
                ],

                [
                    'fondo' => '#CCFBF1',
                    'borde' => '#14B8A6',
                    'texto' => '#115E59'
                ]

            ];

        @endphp



        <p style="color: #666;">

            Horario escolar de 07:00 AM a 01:00 PM

        </p>



        <div style="overflow-x: auto;">

            <table style="
                width: 100%;
                border-collapse: collapse;
                min-width: 1000px;
            ">

                <thead>

                    <tr style="
                        background-color: #0d6efd;
                        color: white;
                    ">

                        <th style="padding: 12px; border: 1px solid #ddd;">

                            Hora

                        </th>


                        @foreach($diasSemana as $dia)

                            <th style="
                                padding: 12px;
                                border: 1px solid #ddd;
                                text-transform: capitalize;
                            ">

                                {{ $dia }}

                            </th>

                        @endforeach

                    </tr>

                </thead>



                <tbody>

                    @foreach($horasSemana as $hora)

                        @php

                            $horaInicio = sprintf('%02d:00:00', $hora);

                            $horaFin = sprintf('%02d:00:00', $hora + 1);

                        @endphp


                        <tr>


                            {{-- RANGO DE HORAS --}}

                            <td style="
                                background-color: #343a40;
                                color: white;
                                font-weight: bold;
                                text-align: center;
                                padding: 15px;
                                border: 1px solid #ddd;
                                white-space: nowrap;
                            ">

                                {{ date('h:i A', strtotime($horaInicio)) }}

                                -

                                {{ date('h:i A', strtotime($horaFin)) }}

                            </td>



                            @foreach($diasSemana as $dia)

                                <td style="
                                    vertical-align: top;
                                    padding: 10px;
                                    border: 1px solid #ddd;
                                    min-width: 170px;
                                    height: 90px;
                                ">


                                    @php

                                        $horaEncontrada = $horarios->first(
                                            function ($item) use ($dia, $hora) {

                                                $diaHorario = mb_strtolower(
                                                    trim($item->dia_semana),
                                                    'UTF-8'
                                                );

                                                $horaHorario = (int) date(
                                                    'H',
                                                    strtotime($item->hora_inicio)
                                                );

                                                return $diaHorario === $dia
                                                    && $horaHorario === $hora;

                                            }
                                        );

                                    @endphp



                                    @if($horaEncontrada)


                                        @php

                                            /*
                                             * OBTENER UN COLOR SEGÚN EL ID
                                             * DE LA MATERIA
                                             */

                                            $materiaId = (int) (
                                                $horaEncontrada->materia_id ?? 0
                                            );


                                            /*
                                             * El operador módulo permite
                                             * reutilizar los colores cuando
                                             * existen más materias que colores.
                                             */

                                            $indiceColor = (
                                                ($materiaId - 1)
                                                % count($coloresMaterias)
                                            );


                                            /*
                                             * Evitar índices negativos.
                                             */

                                            if ($indiceColor < 0) {

                                                $indiceColor = 0;

                                            }


                                            $colorMateria = $coloresMaterias[
                                                $indiceColor
                                            ];

                                        @endphp



                                        {{-- TARJETA DE LA MATERIA --}}

                                        <div style="
                                            background-color: {{ $colorMateria['fondo'] }};
                                            border-left: 5px solid {{ $colorMateria['borde'] }};
                                            color: {{ $colorMateria['texto'] }};
                                            padding: 8px;
                                            border-radius: 6px;
                                            font-size: 12px;
                                        ">


                                            {{-- NOMBRE DE LA MATERIA --}}

                                            <strong>

                                                {{ $horaEncontrada->materia->nombre ?? 'Sin materia' }}

                                            </strong>


                                            <br>



                                            {{-- DOCENTE --}}

                                            Docente:

                                            {{ $horaEncontrada->docente->nombres ?? 'Sin docente' }}

                                            {{ $horaEncontrada->docente->apellidos ?? '' }}


                                            <br>



                                            {{-- GRUPO --}}

                                            Grupo:

                                            @if($horaEncontrada->grupo)

                                                {{ $horaEncontrada->grupo->grado }}° {{ $horaEncontrada->grupo->nombre }}

                                            @else

                                                Sin grupo

                                            @endif


                                            <br>



                                            {{-- SALÓN --}}

                                            Salón:

                                            {{ $horaEncontrada->salon->nombre ?? 'Sin salón' }}


                                            <br>



                                            {{-- HORARIO --}}

                                            Horario:

                                            {{ date('h:i A', strtotime($horaEncontrada->hora_inicio)) }}

                                            -

                                            {{ date('h:i A', strtotime($horaEncontrada->hora_fin)) }}


                                        </div>


                                    @else


                                        <div style="
                                            text-align: center;
                                            color: #aaa;
                                        ">

                                            -

                                        </div>


                                    @endif

                                </td>

                            @endforeach

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>
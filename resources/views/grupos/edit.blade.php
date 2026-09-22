<x-app-layout>

    <div class="min-h-screen bg-gray-100">

        <!-- Encabezado -->
        <header class="bg-slate-800 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex justify-between items-center h-16">

                    <div>
                        <h1 class="text-xl font-bold text-white">
                            GESTIÓN DE GRUPOS
                        </h1>
                    </div>

                    <div class="text-sm text-gray-200">
                        Sistema Escolar
                    </div>

                </div>

            </div>
        </header>

        <!-- Contenido -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Botón regresar al inicio -->
            <x-boton-inicio />

            <!-- Encabezado -->
            <div class="mb-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    Editar grupo
                </h2>

                <p class="text-gray-600 mt-1">
                    Modifica la información del grupo seleccionado.
                </p>

            </div>

            <!-- Errores -->
            @if($errors->any())

                <div class="mb-6 p-4 bg-red-100 border border-red-300
                            text-red-800 rounded-lg">

                    <p class="font-bold mb-2">
                        Corrige los siguientes errores:
                    </p>

                    <ul class="list-disc list-inside">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- Formulario -->
            <div class="bg-white rounded-xl shadow p-6">

                <form action="{{ route('grupos.update', $grupo) }}" method="POST">

                    @csrf

                    @method('PUT')

                    <!-- Grupo -->
                    <div class="mb-6">

                        <label for="nombre"
                               class="block text-sm font-semibold
                                      text-gray-700 mb-2">

                            Grupo

                        </label>

                        <select
                            id="nombre"
                            name="nombre"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500">

                            <option value="">
                                Selecciona un grupo
                            </option>

                            <option value="A"
                                {{ old('nombre', $grupo->nombre) == 'A' ? 'selected' : '' }}>
                                A
                            </option>

                            <option value="B"
                                {{ old('nombre', $grupo->nombre) == 'B' ? 'selected' : '' }}>
                                B
                            </option>

                            <option value="C"
                                {{ old('nombre', $grupo->nombre) == 'C' ? 'selected' : '' }}>
                                C
                            </option>

                            <option value="D"
                                {{ old('nombre', $grupo->nombre) == 'D' ? 'selected' : '' }}>
                                D
                            </option>

                        </select>

                        <p class="text-sm text-gray-500 mt-1">
                            Selecciona la letra correspondiente al grupo.
                        </p>

                    </div>

                    <!-- Grado -->
                    <div class="mb-6">

                        <label for="grado"
                               class="block text-sm font-semibold
                                      text-gray-700 mb-2">

                            Grado

                        </label>

                        <select
                            id="grado"
                            name="grado"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500">

                            <option value="">
                                Selecciona un grado
                            </option>

                            @for($i = 1; $i <= 12; $i++)

                                <option value="{{ $i }}"
                                    {{ old('grado', $grupo->grado) == $i ? 'selected' : '' }}>

                                    {{ $i }}°

                                </option>

                            @endfor

                        </select>

                    </div>

                    <!-- Turno -->
                    <div class="mb-6">

                        <label for="turno"
                               class="block text-sm font-semibold
                                      text-gray-700 mb-2">

                            Turno

                        </label>

                        <select
                            id="turno"
                            name="turno"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500">

                            <option value="">
                                Selecciona un turno
                            </option>

                            <option value="matutino"
                                {{ old('turno', $grupo->turno) == 'matutino' ? 'selected' : '' }}>

                                Matutino

                            </option>

                            <option value="vespertino"
                                {{ old('turno', $grupo->turno) == 'vespertino' ? 'selected' : '' }}>

                                Vespertino

                            </option>

                        </select>

                    </div>

                    <!-- Ciclo escolar -->
                    <div class="mb-6">

                        <label for="ciclo_escolar"
                               class="block text-sm font-semibold
                                      text-gray-700 mb-2">

                            Ciclo escolar

                        </label>

                        <input
                            type="number"
                            id="ciclo_escolar"
                            name="ciclo_escolar"
                            value="{{ old('ciclo_escolar', $grupo->ciclo_escolar) }}"
                            min="2000"
                            max="2100"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-blue-500
                                   focus:ring-blue-500">

                        <p class="text-sm text-gray-500 mt-1">
                            Ejemplo: 2026.
                        </p>

                    </div>

                    <!-- Estado -->
                    <div class="mb-8">

                        <label class="inline-flex items-center">

                            <input
                                type="checkbox"
                                name="activo"
                                value="1"
                                {{ old('activo', $grupo->activo) ? 'checked' : '' }}
                                class="rounded border-gray-300
                                       text-blue-600
                                       shadow-sm
                                       focus:ring-blue-500">

                            <span class="ml-2 text-sm text-gray-700">
                                Grupo activo
                            </span>

                        </label>

                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col sm:flex-row gap-3">

                        <!-- Guardar cambios -->
                        <button
                            type="submit"
                            class="inline-flex justify-center items-center
                                   px-5 py-3
                                   bg-blue-600 hover:bg-blue-700
                                   text-white font-semibold
                                   rounded-lg shadow
                                   transition duration-200">

                            Guardar cambios

                        </button>

                        <!-- Cancelar -->
                        <a
                            href="{{ route('grupos.index') }}"
                            class="inline-flex justify-center items-center
                                   px-5 py-3
                                   bg-gray-500 hover:bg-gray-600
                                   text-white font-semibold
                                   rounded-lg shadow
                                   transition duration-200">

                            Cancelar

                        </a>

                    </div>

                </form>

            </div>

        </main>

    </div>

</x-app-layout>
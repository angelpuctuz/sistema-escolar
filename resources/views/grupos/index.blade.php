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
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Botón regresar al inicio -->
            <x-boton-inicio />

            <!-- Título -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Grupos escolares
                    </h2>

                    <p class="text-gray-600 mt-1">
                        Administra los grupos de la institución.
                    </p>
                </div>

                <!-- Nuevo grupo -->
                <a href="{{ route('grupos.create') }}"
                   class="mt-4 sm:mt-0 inline-flex items-center px-5 py-3
                          bg-blue-600 hover:bg-blue-700
                          text-white font-semibold rounded-lg
                          shadow transition duration-200">

                    <span class="mr-2 text-xl">
                        +
                    </span>

                    Nuevo grupo

                </a>

            </div>

            <!-- Mensaje de éxito -->
            @if(session('success'))

                <div class="mb-6 p-4 bg-green-100 border border-green-300
                            text-green-800 rounded-lg">

                    {{ session('success') }}

                </div>

            @endif

            <!-- Errores -->
            @if($errors->any())

                <div class="mb-6 p-4 bg-red-100 border border-red-300
                            text-red-800 rounded-lg">

                    <p class="font-bold mb-2">
                        Se encontraron los siguientes errores:
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

            <!-- Tabla -->
            <div class="bg-white rounded-xl shadow overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-slate-800 text-white">

                            <tr>

                                <th class="px-6 py-4 text-left text-sm font-semibold">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold">
                                    Grupo
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold">
                                    Grado
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold">
                                    Turno
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold">
                                    Ciclo escolar
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold">
                                    Estado
                                </th>

                                <th class="px-6 py-4 text-center text-sm font-semibold">
                                    Acciones
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            @forelse($grupos as $grupo)

                                <tr class="hover:bg-gray-50">

                                    <!-- ID -->
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $grupo->id }}
                                    </td>

                                    <!-- Grupo -->
                                    <td class="px-6 py-4">

                                        <span class="font-semibold text-gray-800">
                                            {{ $grupo->nombre }}
                                        </span>

                                    </td>

                                    <!-- Grado -->
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $grupo->grado }}°
                                    </td>

                                    <!-- Turno -->
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ ucfirst($grupo->turno) }}
                                    </td>

                                    <!-- Ciclo escolar -->
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $grupo->ciclo_escolar }}
                                    </td>

                                    <!-- Estado -->
                                    <td class="px-6 py-4">

                                        @if($grupo->activo)

                                            <span class="inline-flex px-3 py-1
                                                         rounded-full text-xs
                                                         font-semibold
                                                         bg-green-100 text-green-800">

                                                Activo

                                            </span>

                                        @else

                                            <span class="inline-flex px-3 py-1
                                                         rounded-full text-xs
                                                         font-semibold
                                                         bg-red-100 text-red-800">

                                                Inactivo

                                            </span>

                                        @endif

                                    </td>

                                    <!-- Acciones -->
                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <!-- Ver -->
                                            <a href="{{ route('grupos.show', $grupo) }}"
                                               class="px-3 py-2 bg-blue-600
                                                      hover:bg-blue-700
                                                      text-white rounded-lg
                                                      text-sm">

                                                Ver

                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ route('grupos.edit', $grupo) }}"
                                               class="px-3 py-2 bg-yellow-500
                                                      hover:bg-yellow-600
                                                      text-white rounded-lg
                                                      text-sm">

                                                Editar

                                            </a>

                                            <!-- Eliminar -->
                                            <form action="{{ route('grupos.destroy', $grupo) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar este grupo?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-3 py-2 bg-red-600
                                                               hover:bg-red-700
                                                               text-white rounded-lg
                                                               text-sm">

                                                    Eliminar

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="px-6 py-12 text-center">

                                        <div class="text-gray-500">

                                            <p class="text-lg font-semibold">
                                                No hay grupos registrados
                                            </p>

                                            <p class="text-sm mt-2">
                                                Comienza creando el primer grupo.
                                            </p>

                                            <a href="{{ route('grupos.create') }}"
                                               class="inline-block mt-4 px-5 py-2
                                                      bg-blue-600 hover:bg-blue-700
                                                      text-white rounded-lg">

                                                Crear primer grupo

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>
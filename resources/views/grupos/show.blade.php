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
                    Información del grupo
                </h2>

                <p class="text-gray-600 mt-1">
                    Consulta la información del grupo seleccionado.
                </p>

            </div>

            <!-- Información -->
            <div class="bg-white rounded-xl shadow overflow-hidden">

                <!-- Título de la tarjeta -->
                <div class="bg-slate-800 px-6 py-5">

                    <h3 class="text-xl font-bold text-white">
                        Grupo {{ $grupo->nombre }}
                    </h3>

                    <p class="text-gray-300 mt-1">
                        {{ $grupo->grado }}° grado
                    </p>

                </div>

                <!-- Datos -->
                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- ID -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                ID del grupo
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ $grupo->id }}
                            </p>
                        </div>

                        <!-- Nombre -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Nombre del grupo
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ $grupo->nombre }}
                            </p>
                        </div>

                        <!-- Grado -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Grado
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ $grupo->grado }}°
                            </p>
                        </div>

                        <!-- Turno -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Turno
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ ucfirst($grupo->turno) }}
                            </p>
                        </div>

                        <!-- Ciclo escolar -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Ciclo escolar
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ $grupo->ciclo_escolar }}
                            </p>
                        </div>

                        <!-- Estado -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Estado
                            </p>

                            <div class="mt-2">

                                @if($grupo->activo)

                                    <span class="inline-flex px-3 py-1
                                                 rounded-full text-sm
                                                 font-semibold
                                                 bg-green-100 text-green-800">

                                        Activo

                                    </span>

                                @else

                                    <span class="inline-flex px-3 py-1
                                                 rounded-full text-sm
                                                 font-semibold
                                                 bg-red-100 text-red-800">

                                        Inactivo

                                    </span>

                                @endif

                            </div>

                        </div>

                        <!-- Fecha de creación -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Fecha de creación
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ $grupo->created_at?->format('d/m/Y H:i') }}
                            </p>
                        </div>

                        <!-- Última actualización -->
                        <div>
                            <p class="text-sm font-semibold text-gray-500">
                                Última actualización
                            </p>

                            <p class="text-lg text-gray-800 mt-1">
                                {{ $grupo->updated_at?->format('d/m/Y H:i') }}
                            </p>
                        </div>

                    </div>

                </div>

                <!-- Acciones -->
                <div class="px-6 py-5 bg-gray-50 border-t">

                    <div class="flex flex-col sm:flex-row gap-3">

                        <!-- Editar -->
                        <a
                            href="{{ route('grupos.edit', $grupo) }}"
                            class="inline-flex justify-center items-center
                                   px-5 py-3
                                   bg-yellow-500 hover:bg-yellow-600
                                   text-white font-semibold
                                   rounded-lg shadow
                                   transition duration-200">

                            Editar grupo

                        </a>

                        <!-- Regresar a grupos -->
                        <a
                            href="{{ route('grupos.index') }}"
                            class="inline-flex justify-center items-center
                                   px-5 py-3
                                   bg-gray-500 hover:bg-gray-600
                                   text-white font-semibold
                                   rounded-lg shadow
                                   transition duration-200">

                            Volver a grupos

                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sistema Integral de Gestión Escolar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Mensaje de bienvenida -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">
                        ¡Bienvenido al sistema escolar!
                    </h3>

                    <p class="text-gray-600">
                        Desde este panel podrás acceder a los diferentes
                        módulos de gestión escolar.
                    </p>
                </div>
            </div>

            <!-- Módulos del sistema -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Gestión de Alumnos
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Administra la información de los alumnos.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Gestión de Docentes
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Administra la información de los docentes.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Horarios y Materias
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Organiza horarios, materias y grupos.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Incidencias y Tutorías
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Registra incidencias y seguimiento de alumnos.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Usuarios y Roles
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Administra usuarios y permisos del sistema.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Eventos Escolares
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Organiza eventos y actividades escolares.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Préstamo de Equipo
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Controla el préstamo de equipos tecnológicos.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Calificaciones y Boletas
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Registra calificaciones y genera boletas.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Centro de Cómputo
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Administra los préstamos del centro de cómputo.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-bold text-gray-800">
                        Generación de Documentos
                    </h3>
                    <p class="text-gray-600 mt-2">
                        Genera documentos escolares automáticamente.
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>